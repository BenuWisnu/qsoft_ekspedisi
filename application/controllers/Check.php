<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller { 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

     public function __construct() {
         parent::__construct();
         $this->load->model('m_check_resi');
		 $this->load->model('m_ekspedisi');
		 $this->load->model('m_bank');
		 $this->load->model('m_pengaturan');
     }


	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('front/v_result_check');
	}

    public function search() {
        $id = $this->input->post('id');

        $check = $this->m_check_resi->get_by_id($id);
        if ($check) {
            $data['flag'] = 1;
        }
        else {

            $data['flag'] = 0;
        }

        $data['data'] = $this->m_check_resi->get_by_id($id);
		$this->load->view('front/v_result_check', $data);

    }

    public function detail()
	{
		//$this->load->helper('url');
		$this->load->view('front/v_detail_article');
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
			$pdf->Cell(80, 7, ': '.tgl_dan_hari(substr($data_ekspedisi['TanggalSJ'], 0, 2))."".tgl_default($data_ekspedisi['TanggalSJ']), 0, 0, 'L'); //90 merupakan jarak antara no_rekamedis dengan isian ditangani oleh
	
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
	
			
	
	
			$pdf->SetFont('Arial', 'B', 8);
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
