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


    public function create()
    {
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota');

        $data = array(

                    "NoNota" => $no_nota,
                    "Tanggal" => $this->input->post('tanggal'),
                    "KodeVendor" => $this->input->post('kode_vendor'),
                    "NoSJ" => $this->input->post('no_manifest'),
                    "TanggalSJ" => $this->input->post('tanggal_manifest'),
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
    }

    public function update($no_nota)
    {

        $data = array(

                    "Tanggal" => $this->input->post('tanggal'),
                    "KodeVendor" => $this->input->post('kode_vendor'),
                    "NoSJ" => $this->input->post('no_manifest'),
                    "TanggalSJ" => $this->input->post('tanggal_manifest'),
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



    public function delete($id) {
        $this->m_ekspedisi->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('ekspedisi');
    } 

    public function delete_item_nota($id) {
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




}
