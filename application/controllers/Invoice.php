<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_invoice');
        $this->load->model('m_ekspedisi');
        $this->load->model('m_bank');
        $this->load->model('m_pengaturan');
    }

    public function index()
    {
        $data['data_invoice'] = $this->m_invoice->get_all();
        $this->template->load('template', 'v_daftar_invoice', $data);
    }

        
    public function json()
    {
        header('Content-Type: application/json');
        echo $this->m_invoice->json();
    }

    
    public function add()
    {
        //echo kode_invoice_otomatis("invoice", "NoInvoice", "INV", "BJM");
        $data['data_bank'] = $this->m_bank->get_all();
        $this->template->load('template', 'v_tambah_invoice', $data);
    }

    public function edit($id)
    {
        $kode_vendor = $this->m_invoice->get_by_id($id);
        $kode_vendor = $kode_vendor['VendorCode'];

        $data['data'] = $this->m_invoice->get_by_id($id);
        $data['data_nota'] = $this->m_ekspedisi->get_all_tagihan_ekspedisi($kode_vendor);
        $data['data_bank'] = $this->m_bank->get_all();
        $data['data_invoice_detail'] = $this->m_invoice->get_all_detail($id);

        $this->template->load('template', 'v_edit_invoice', $data);
    }



    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_invoice = $this->db->get('invoice')->result();
        foreach ($data_invoice as $invoice) {
            $return_arr[] = $invoice->kode;
        }

        echo json_encode($return_arr);
    }



    public function delete($id)
    {
        $this->m_invoice->delete($id);
        $this->session->set_flashdata('success', "Berhasil");

        redirect('invoice');
    }

    public function create()
    {
        //GET NO. NOTA
        $no_invoice = $this->input->post('no_invoice');

        $data = array(

                    "NoInvoice" => $no_invoice,
                    "Tanggal" => tgl_default_3($this->input->post('invoice_date')),
                    "VendorCode" => $this->input->post('kode_vendor'),
                    "TOP" => $this->input->post('top'),
                    "TanggalTempo" => tgl_default_3($this->input->post('due_date')),
                    "BankTransfer" => $this->input->post('transfer_ke'),
                    "DibuatOleh" => $this->input->post('dibuat_oleh'),
                    "DisetujuiOleh" => $this->input->post('disetujui_oleh'),
                    "Perihal" => $this->input->post('keterangan'),
                    "Cabang" => $this->input->post('cabang'),
                    "Status" => "Open"
                );
        $this->m_invoice->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('invoice/edit/'.$no_invoice);
    }

    public function update($id)
    {
        //GET NO. NOTA
        $data = array(

                    "Tanggal" => tgl_default_3($this->input->post('invoice_date')),
                    "VendorCode" => $this->input->post('kode_vendor'),
                    "TOP" => $this->input->post('top'),
                    "TanggalTempo" => tgl_default_3($this->input->post('due_date')),
                    "BankTransfer" => $this->input->post('transfer_ke'),
                    "DibuatOleh" => $this->input->post('dibuat_oleh'),
                    "DisetujuiOleh" => $this->input->post('disetujui_oleh'),
                    "Perihal" => $this->input->post('keterangan'),
                    "Cabang" => $this->input->post('cabang'),
                    "Status" => "Open"
                );
        $this->m_invoice->update($id, $data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('invoice/edit/'.$id);
    }

    public function create_nota()
    {
        
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota_invoice');

        $data = array(

                    "ItemNo" => $this->input->post('no_item'),
                    "NoInvoice" => $no_nota,
                    "Amount" => $this->input->post('amount'),
                    "NoNota" => $this->input->post('no_nota')
                );
        $this->m_invoice->insert_detail($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('invoice/edit/'.$no_nota);
    }

    public function get_invoice_berd_vendor($vendor)
    {
        $kode = $_GET['term'];
        $data = $this->m_invoice->get_all_invoices_blm_terbayar($vendor);
        foreach ($data as $data) {
            $return_arr[] = $data->NoInvoice;
        }

        echo json_encode($return_arr);
    }

    public function get_detail_invoice()
    {
        $kode = $_GET['kode'];
        $this->db->where('NoInvoice', $kode);
        $this->db->limit(5);
        $data = $this->db->get('invoice')->row_array();
        $data = array(
                'JumlahTagihan' => $data['JumlahTagihan'],
                'JumlahSisa' => $data['JumlahSisa']
        );
  
        echo json_encode($data);
    }

    public function delete_item_nota($id)
    {
        $no_nota = get_kode_table("invoicedtl", "NoInvoice", "id", $id);

        $this->m_invoice->delete_item($id);
        $this->session->set_flashdata('success', "Berhasil");

        redirect('invoice/edit/'.$no_nota);
    }

    

    //CETAK INVOICE 1
    public function cetak_invoice_1($id)
    {

        require 'vendor/autoload.php'; // load folder vendor/autoload
        $data_invoice = $this->m_invoice->get_by_id($id);
        $data_invoice_detail = $this->m_invoice->get_all_detail($id);
    
        //DATA PERUSAHAAN
        $data_nama_perusahaan = $this->m_pengaturan->get_by_id(1);
        $data_alamat_perusahaan = $this->m_pengaturan->get_by_id(2);
        $data_telpon_perusahaan = $this->m_pengaturan->get_by_id(11);
    
    
        $no = 1;
    
         
    
        $this->load->library('pdf');
        $pdf = new FPDF('P', 'mm', array(295,295));
        // membuat nama file
    
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTitle('Data Invoice');
    
        $pdf->Image('http://localhost/qsoft/assets/images/png/logo_web.png', 22, 5, 30);
        //$pdf->Image('', a)
        // mencetak string
        $pdf->Cell(268, 7, $data_nama_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(268, 7, $data_alamat_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Cell(268, 7, $data_telpon_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Line(10, 35, 293-10, 35);
        $pdf->Line(10, 35.5, 293-10, 35.5);
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->Cell(268, 7, '', 0, 1, 'C');

    
    
        $pdf->SetFont('Arial', '', 12);
    
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
    

        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(20, 7, 'INVOICE', 0, 0, 'L');

            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(80, 7, '', 0, 1, 'L');
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2))."".tgl_default($data_invoice['Tanggal']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
            

        //LINE INVOICE
        $pdf->Line(122, 55, 293-10, 55);
            
    
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'No. Invoice', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, 'Tagihan Kepada: ', 0, 1, 'L');



            
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, $data_invoice['NoInvoice'], 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "NamaVendor", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');
            
            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal Jatuh Tempo', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "Alamat", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2))."".tgl_default($data_invoice['TanggalTempo']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L');

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "NoTelpon", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');

        //LINE INVOICE
        $pdf->Line(122, 94, 293-10, 94);

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, "Untuk: ".$data_invoice['Perihal'], 0, 1, 'L');
    
            

        $pdf->Cell(10, 10, 'Dengan Perincian:', 0, 1);
    
            
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(45, 7, 'No. Manifest', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Nopol', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Bayar Tunai', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Handling', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Tagihan', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Sopir', 1, 1, 'C');
    
            
        foreach ($data_invoice_detail as $data) {
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(10, 7, $no, 1, 0, 'C');
            $pdf->Cell(45, 7, get_kode_table("ekspedisi", "NoSJ", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(40, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2)).", ".tgl_default($data_invoice['Tanggal']), 1, 0, 'L');
            $pdf->Cell(50, 7, get_kode_table("ekspedisi", "NoKendaraan", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, rupiah($data->Amount), 1, 0, 'L');
            $pdf->Cell(30, 7, rupiah(get_kode_table("ekspedisi", "TotalBiayaHandling", "NoNota", trim($data->NoNota))), 1, 0, 'L');
            $pdf->Cell(30, 7, rupiah($data_invoice['JumlahTagihan']), 1, 0, 'L');
            $pdf->Cell(40, 7, get_kode_table("ekspedisi", "Sopir", "NoNota", trim($data->NoNota)), 1, 1, 'L');
            $no++;
        }
    

        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(95, 15, "Total Tagihan:".rupiah($data_invoice['JumlahTagihan']), 0, 1, 'R');


        $pdf->Cell(180, 2, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(95, 0, "Terbilang:", 0, 1, 'R');


        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(95, 7, terbilang($data_invoice['JumlahTagihan']), 0, 1, 'R');

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Pembayaran ditujukan ke no. rekening dibawah ini,', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L');

        $pdf->MultiCell( 100, 7, "Transfer Bank : ". get_kode_table("bank", "Bank", "NoRekening", $data_invoice['BankTransfer']). " \nNo. Rekening  : ".$data_invoice['BankTransfer']. " \nAtas Nama      : ".get_kode_table("bank", "AtasNama", "NoRekening", $data_invoice['BankTransfer'])." \n", 1, "L");
        
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(120, 60, 'Dibuat oleh,', 0, 0, 'L');
        $pdf->Cell(120, 60, 'Disetujui oleh,', 0, 0, 'L');
        $pdf->Cell(30, 60, 'Diterima oleh,', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(120, 7, 'Administrator', 0, 0, 'L');
        $pdf->Cell(120, 7, 'Administrator', 0, 0, 'L');
        $pdf->Cell(30, 7, '', 0, 1, 'L');
        
        // $qrCode = new Endroid\QrCode\QrCode(123); // mengambil data kode siswa sebagai data  QR code
        // $this->$qrCode->writeFile('./QRcode/.png'); // direktori untuk menyimpan gambar QR code
        

        //LINE INVOICE
        $pdf->Line(240, 230, 293-10, 230);
    
        $pdf->Output('invoice-file.pdf', 'I');
    }


    //CETAK INVOICE 2
    public function cetak_invoice_2($id)
    {
        $data_invoice = $this->m_invoice->get_by_id($id);
        $data_invoice_detail = $this->m_invoice->get_all_detail($id);
    
        //DATA PERUSAHAAN
        $data_nama_perusahaan = $this->m_pengaturan->get_by_id(1);
        $data_alamat_perusahaan = $this->m_pengaturan->get_by_id(2);
        $data_telpon_perusahaan = $this->m_pengaturan->get_by_id(11);
    
    
        $no = 1;
    
         
    
        $this->load->library('pdf');
        $pdf = new FPDF('P', 'mm', array(295,295));
        // membuat nama file
    
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTitle('Data Invoice');
    
        $pdf->Image('http://localhost/qsoft/assets/images/png/logo_web.png', 22, 5, 30);
        //$pdf->Image('', a)
        // mencetak string
        $pdf->Cell(268, 7, $data_nama_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(268, 7, $data_alamat_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Cell(268, 7, $data_telpon_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Line(10, 35, 293-10, 35);
        $pdf->Line(10, 35.5, 293-10, 35.5);
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->Cell(268, 7, '', 0, 1, 'C');

    
    
        $pdf->SetFont('Arial', '', 12);
    
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
    

        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(20, 7, 'INVOICE', 0, 0, 'L');

            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(80, 7, '', 0, 1, 'L');
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2))."".tgl_default($data_invoice['Tanggal']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
            

        //LINE INVOICE
        $pdf->Line(122, 55, 293-10, 55);
            
    
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'No. Invoice', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, 'Tagihan Kepada: ', 0, 1, 'L');



            
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, $data_invoice['NoInvoice'], 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "NamaVendor", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');
            
            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal Jatuh Tempo', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "Alamat", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2))."".tgl_default($data_invoice['TanggalTempo']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L');

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "NoTelpon", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');

        //LINE INVOICE
        $pdf->Line(122, 94, 293-10, 94);

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, "Untuk: ".$data_invoice['Perihal'], 0, 1, 'L');
    
            

        $pdf->Cell(10, 10, 'Dengan Perincian:', 0, 1);
    
            
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(20, 7, 'No. Manifest', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Nopol', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Sopir', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Asal', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Tujuan', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Colly', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Harga Satuan', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Biaya', 1, 1, 'C');
    
            
        foreach ($data_invoice_detail as $data) {
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(10, 7, $no, 1, 0, 'C');
            $pdf->Cell(20, 7, get_kode_table("ekspedisi", "NoSJ", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, tgl_dan_hari(substr($data_invoice['Tanggal'], 0, 2)).", ".tgl_default($data_invoice['Tanggal']), 1, 0, 'L');
            $pdf->Cell(30, 7, get_kode_table("ekspedisi", "NoKendaraan", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, get_kode_table("ekspedisi", "Sopir", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, get_kode_table("ekspedisi", "Asal", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, get_kode_table("ekspedisidetail", "Tujuan", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(20, 7, get_kode_table("ekspedisidetail", "Colly", "NoNota", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(35, 7, rupiah(get_kode_table("ekspedisidetail", "HargaSatuan", "NoNota", trim($data->NoNota))), 1, 0, 'L');
            $pdf->Cell(35, 7, rupiah($data_invoice['JumlahTagihan']), 1, 1, 'L');
            $no++;
        }
    

        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(95, 15, "Total Tagihan:".rupiah($data_invoice['JumlahTagihan']), 0, 1, 'R');


        $pdf->Cell(1, 2, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(95, 0, "Terbilang:", 0, 1, 'L');


        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(95, 7, terbilang($data_invoice['JumlahTagihan']), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Pembayaran ditujukan ke no. rekening dibawah ini,', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L');

        $pdf->MultiCell( 100, 7, "Transfer Bank : ". get_kode_table("bank", "Bank", "NoRekening", $data_invoice['BankTransfer']). " \nNo. Rekening  : ".$data_invoice['BankTransfer']. " \nAtas Nama      : ".get_kode_table("bank", "AtasNama", "NoRekening", $data_invoice['BankTransfer'])." \n", 1, "L");
        
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(120, 60, 'Dibuat oleh,', 0, 0, 'L');
        $pdf->Cell(120, 60, 'Disetujui oleh,', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(120, 7, 'Administrator', 0, 0, 'L');
        $pdf->Cell(120, 7, 'Administrator', 0, 0, 'L');
        $pdf->Cell(30, 7, '', 0, 1, 'L');


    
        $pdf->Output('invoice-file.pdf', 'I');
    }


    //CETAK INVOICE 3
    public function cetak_invoice_3($id)
    {
        $data_invoice = $this->m_invoice->get_by_id($id);
        $data_invoice_detail = $this->m_invoice->get_all_detail($id);
    
        //DATA PERUSAHAAN
        $data_nama_perusahaan = $this->m_pengaturan->get_by_id(1);
        $data_alamat_perusahaan = $this->m_pengaturan->get_by_id(2);
        $data_telpon_perusahaan = $this->m_pengaturan->get_by_id(11);
    
    
        $no = 1;
    
         
    
        $this->load->library('pdf');
        $pdf = new FPDF('P', 'mm', array(295,295));
        // membuat nama file
    
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTitle('Data Invoice');
    
        $pdf->Image('http://localhost/qsoft/assets/images/png/logo_web.png', 22, 5, 30);
        //$pdf->Image('', a)
        // mencetak string
        $pdf->Cell(268, 7, $data_nama_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(268, 7, $data_alamat_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Cell(268, 7, $data_telpon_perusahaan['Nilai'], 0, 1, 'C');
        $pdf->Line(10, 35, 293-10, 35);
        $pdf->Line(10, 35.5, 293-10, 35.5);
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->Cell(268, 7, '', 0, 1, 'C');

    
    
        $pdf->SetFont('Arial', '', 12);
    
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
    

        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(20, 7, 'INVOICE', 0, 0, 'L');

            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(80, 7, '', 0, 1, 'L');
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 7, tgl_default($data_invoice['Tanggal']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
            

        //LINE INVOICE
        $pdf->Line(122, 55, 293-10, 55);
            
    
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'No. Invoice', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, 'Tagihan Kepada: ', 0, 1, 'L');



            
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, $data_invoice['NoInvoice'], 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "NamaVendor", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');
            
            

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tanggal Jatuh Tempo', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, get_kode_table("vendor", "Alamat", "KodeVendor", $data_invoice['VendorCode']), 0, 1, 'L');


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, tgl_default($data_invoice['TanggalTempo']), 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 1, 'L');

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, '087121212', 0, 1, 'L');

        //LINE INVOICE
        $pdf->Line(122, 94, 293-10, 94);

        $pdf->Cell(111, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 7, "Untuk: ".$data_invoice['Perihal'], 0, 1, 'L');
    
            

        $pdf->Cell(10, 10, 'Dengan Perincian:', 0, 1);
    
            
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(45, 7, 'No. Manifest', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Nopol', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Bayar Tunai', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Handling', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Tagihan', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Sopir', 1, 1, 'C');
    
            
        foreach ($data_invoice_detail as $data) {
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(10, 7, $no, 1, 0, 'C');
            $pdf->Cell(45, 7, $data_invoice['NoSJ'], 1, 0, 'L');
            $pdf->Cell(40, 7, tgl_default($data_invoice['Tanggal']), 1, 0, 'L');
            $pdf->Cell(50, 7, get_kode_table("ekspedisi", "NoKendaraan", "KodeVendor", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, rupiah($data->Amount), 1, 0, 'L');
            $pdf->Cell(30, 7, get_kode_table("ekspedisi", "TotalBiayaHandling", "KodeVendor", trim($data->NoNota)), 1, 0, 'L');
            $pdf->Cell(30, 7, rupiah($data_invoice['JumlahTagihan']), 1, 0, 'L');
            $pdf->Cell(40, 7, get_kode_table("ekspedisi", "Sopir", "KodeVendor", trim($data->NoNota)), 1, 1, 'L');
            $no++;
        }
    

        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(45, 7, "Total Tagihan:", 0, 0, 'L');
        $pdf->Cell(50, 7, rupiah($data_invoice['JumlahTagihan']), 0, 1, 'R');


        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(45, 7, "Total Terbayar:", 0, 0, 'L');
        $pdf->Cell(50, 7, rupiah($data_invoice['JumlahTerbayar']), 0, 1, 'R');


        $pdf->Cell(180, 7, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(95, 7, "Sisa Tagihan:", 0, 0, 'L');
        $pdf->Cell(50, 7, rupiah($data_invoice['JumlahSisa']), 0, 1, 'R');


    
        $pdf->Output('invoice-file.pdf', 'I');
    }

 
}
