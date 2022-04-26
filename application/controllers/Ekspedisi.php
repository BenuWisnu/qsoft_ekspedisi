<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekspedisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_ekspedisi');
        $this->load->model('m_bank');
        $this->load->model('m_pengaturan');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['data_ekspedisi'] = $this->m_ekspedisi->get_all();
        $this->template->load('template', 'v_daftar_ekspedisi', $data);
    }
    

    public function add()
    {
        $this->template->load('template', 'v_tambah_ekspedisi');
    }
 
    public function edit($id)
    {
        $data['data'] = $this->m_ekspedisi->get_by_id($id);
        $data['data_bayar_tujuan'] = get_sum_by_field("ekspedisidetail", "BayarTujuan", "NoNota", $id);
        $data['data_biaya_handling'] = get_sum_by_field("ekspedisidetail", "BiayaHandling", "NoNota", $id);
        $data['data_total_tagihan'] = get_sum_by_field("ekspedisidetail", "Tagihan", "NoNota", $id);

        $data['data_ekspedisi_detail'] = $this->m_ekspedisi->get_all_detail($id);
        $this->template->load('template', 'v_edit_ekspedisi', $data);
    }

    public function test() {
        $this->template->load('template', 'v_test');
    }

    public function create()
    {
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota');
        
        //CEK DUPLICATE
        $no_manifest = $this->input->post('no_manifest');
        $res = check_data_table("ekspedisi", "NoSJ", $no_manifest);

        if ($res) {
            $data = array(

                "NoNota" => $no_nota,
                "Tanggal" => tgl_default_3($this->input->post('tanggal')),
                "KodeVendor" => $this->input->post('kode_vendor'),
                "NoSJ" => $no_manifest,
                "TanggalSJ" => tgl_default_3($this->input->post('tanggal_manifest')),
                "NoKendaraan" => $this->input->post('no_kendaraan'),
                "Sopir" => $this->input->post('sopir'),
                "NoTelponSopir" => $this->input->post('telp_sopir'),
                "Kapal" => $this->input->post('kapal'),
                "Asal" => $this->input->post('dari'),
                "DaerahTujuan" => $this->input->post('daerah_tujuan'),
                "TotalBayarTujuan" => $this->input->post('total_bayar_tujuan'),
                "TotalBiayaHandling" => $this->input->post('total_biaya_handling'),
                "TagihanTotal" => $this->input->post('total_tagihan'),
                "Cabang" => $this->session->userdata('Cabang'),
                "UserTambah" => $this->session->userdata('KodePemakai')
            );
            $this->m_ekspedisi->insert($data);
            $this->session->set_flashdata('success', "Berhasil");
            redirect('ekspedisi/edit/'.$no_nota);
        } else {
            $this->session->set_flashdata('failed', "Gagal");
            redirect('ekspedisi/add');
        }
    }

    public function update($no_nota)
    {
        $data = array(

                    "Tanggal" => tgl_default_3($this->input->post('tanggal')),
                    "KodeVendor" => $this->input->post('kode_vendor'),
                    "NoSJ" => $this->input->post('no_manifest'),
                    "TanggalSJ" => tgl_default_3($this->input->post('tanggal_manifest')),
                    "NoKendaraan" => $this->input->post('no_kendaraan'),
                    "Sopir" => $this->input->post('sopir'),
                    "NoTelponSopir" => $this->input->post('telp_sopir'),
                    "Kapal" => $this->input->post('kapal'),
                    "Asal" => $this->input->post('dari'),
                    "DaerahTujuan" => $this->input->post('daerah_tujuan'),
                    "TotalBayarTujuan" => $this->input->post('total_bayar_tujuan'),
                    "TotalBiayaHandling" => $this->input->post('total_biaya_handling'),
                    "TagihanTotal" => $this->input->post('total_tagihan'),
                    "Cabang" => $this->session->userdata('Cabang'),
                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
                 
        $this->m_ekspedisi->update($no_nota, $data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('ekspedisi/edit/'.$no_nota);
    }

    public function create_nota()
    {
        //GET KODE PELANGGAN
        $pelanggan = $this->input->post('pelanggan');
        $kode_pelanggan =  get_kode_table("pelanggan", "KodePelanggan", "NamaPelanggan", $pelanggan);
        
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota_ekspedisi');

        $data = array(

                    "NoNota" => $no_nota,
                    "TTB" => $this->input->post('ttb'),
                    "KodePelanggan" => $kode_pelanggan,
                    "Tujuan" => $this->input->post('tujuan_modal'),
                    "AlamatTujuan" => $this->input->post('alamat_tujuan_modal'),
                    "JenisBarang" => $this->input->post('jenis_barang'),
                    "KeteranganBarang" => $this->input->post('keterangan_barang'),
                    "Colly" => $this->input->post('colly'),
                    "Berat" => $this->input->post('berat'),
                    "Banyak" => $this->input->post('banyak'),
                    "JenisHarga" => $this->input->post('jenis_harga'),
                    "HargaSatuan" => $this->input->post('harga_satuan'),
                    "HargaVendor" => $this->input->post('total_biaya_kirim_modal'),
                    "Status" => "Open",
                    "BayarTujuan" => $this->input->post('total_bayar_tujuan_modal'),
                    "BiayaHandling" => $this->input->post('total_biaya_handling_modal'),
                    "Tagihan" => $this->input->post('total_tagihan_modal'),
                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_ekspedisi->insert_detail($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('ekspedisi/edit/'.$no_nota);
    }



    public function delete($id)
    {
        $this->m_ekspedisi->delete($id);
        $this->session->set_flashdata('success', "Berhasil");

        redirect('ekspedisi');
    }

    public function delete_item_nota($id)
    {
        $no_nota = get_kode_table("ekspedisidetail", "NoNota", "id", $id);

        $this->m_ekspedisi->delete_item($id);
        $this->session->set_flashdata('success', "Berhasil");

        redirect('ekspedisi/edit/'.$no_nota);
    }


    //GET DATA CABANG
    public function get_cabang()
    {
        $this->db->like('Cabang', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('ekspedisi')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->Cabang;
        }

        echo json_encode($return_arr);
    }

    //CETAK LAPORAN
    public function cetak_ekspedisi($id)
    {
 
        $data_ekspedisi = $this->m_ekspedisi->get_by_id($id);
        $data_ekspedisi_detail = $this->m_ekspedisi->get_all_detail($id);

        //DATA PERUSAHAAN
        $data_nama_perusahaan = $this->m_pengaturan->get_by_id(1);
        $data_alamat_perusahaan = $this->m_pengaturan->get_by_id(2);
        $data_telpon_perusahaan = $this->m_pengaturan->get_by_id(11);

        $data_bayar_tujuan = get_sum_by_field("ekspedisidetail", "BayarTujuan", "NoNota", $id);
        $data_biaya_handling = get_sum_by_field("ekspedisidetail", "BiayaHandling", "NoNota", $id);
        $data_total_tagihan = get_sum_by_field("ekspedisidetail", "Tagihan", "NoNota", $id);

        $no = 1;

     

        $this->load->library('pdf');
        $pdf = new FPDF('P', 'mm', array(295,295));
        // membuat nama file

        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTitle('Data Manifest');

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
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(268, 7, 'DATA MANIFEST', 0, 1, 'C');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(268, 7, 'Customer', 0, 1, 'L');
        $pdf->Cell(268, 7, get_kode_table("vendor", "NamaVendor", "KodeVendor", $data_ekspedisi['KodeVendor']), 0, 1, 'L');
        $pdf->Cell(268, 7, get_kode_table("vendor", "Kota", "KodeVendor", $data_ekspedisi['KodeVendor']), 0, 1, 'L');
        $pdf->Line(10, 35, 293-10, 35);
        $pdf->Line(10, 35.5, 293-10, 35.5);
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 16);



        $pdf->SetFont('Arial', '', 9);

        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Tgl. Manifest', 0, 0, 'L');
        $pdf->Cell(80, 7, ': '.$data_ekspedisi['TanggalSJ'], 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh

        $pdf->Cell(20, 7, 'Sopir', 0, 0, 'L');
        $pdf->Cell(80, 7, ': '.$data_ekspedisi['Sopir'], 0, 0, 'L');

        $pdf->Cell(25, 7, 'No. Manifest', 0, 0, 'L');
        $pdf->Cell(20, 7, ': '.$data_ekspedisi['NoNota'], 0, 1, 'L'); 
 

        
        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'Kapal', 0, 0, 'L');
        $pdf->Cell(80, 7, ': '.$data_ekspedisi['Kapal'], 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh

        $pdf->Cell(20, 7, 'HP Sopir', 0, 0, 'L');
        $pdf->Cell(80, 7, ': '.$data_ekspedisi['NoTelponSopir'], 0, 0, 'L');


        $pdf->Cell(25, 7, 'Asal', 0, 0, 'L');
        $pdf->Cell(30, 7, ': '.$data_ekspedisi['Asal'], 0, 1, 'L');

        


        $pdf->Cell(1, 7, '', 0, 0, 'L');
        $pdf->Cell(30, 7, 'No. Kendaraan', 0, 0, 'L');
        $pdf->Cell(80, 7, ': '.$data_ekspedisi['NoKendaraan']." tahun", 0, 0, 'L');
        

        $pdf->Cell(20, 7, '', 0, 0, 'L');
        $pdf->Cell(80, 7, '', 0, 0, 'L');

        $pdf->Cell(25, 7, 'Daerah Tujuan', 0, 0, 'L');
        $pdf->Cell(20, 7, ': '.$data_ekspedisi['DaerahTujuan'], 0, 0, 'L');
        $pdf->Cell(10, 7, '', 0, 1);

        


        //tabel data pasien
        $pdf->Cell(10, 10, 'Daftar Manifest', 0, 1);

        
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(45, 7, 'TTB', 1, 0, 'C');
        $pdf->Cell(70, 7, 'Penerima', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Colly', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Berat', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Keterangan', 1, 1, 'C');

        
        foreach ($data_ekspedisi_detail as $data) {

            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(10, 7, $no, 1, 0, 'C');
            $pdf->Cell(45, 7, $data->TTB, 1, 0, 'L');
            $pdf->Cell(70, 7, get_kode_table("pelanggan", "NamaPelanggan", "KodePelanggan", $data->KodePelanggan), 1, 0, 'L');
            $pdf->Cell(50, 7, $data->JenisBarang, 1, 0, 'L');
            $pdf->Cell(30, 7, $data->Colly, 1, 0, 'L');
            $pdf->Cell(30, 7, $data->Berat, 1, 0, 'L');
            $pdf->Cell(40, 7, $data->Keterangan, 1, 1, 'L');
            $no++;
        }


       

      

        $pdf->Output('ekspedisi-file.pdf', 'I');
    }
}
