<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_pelanggan');
        $this->load->model('m_vendor');
    }

    public function index()
    {
        $data['data_pelanggan'] = $this->m_pelanggan->get_all();
        $this->template->load('template', 'v_daftar_pelanggan', $data);


    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_pelanggan->json();  
    } 

    

    public function add()
    {
        $this->template->load('template', 'v_tambah_pelanggan');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_pelanggan->get_by_id($id);

        $this->template->load('template', 'v_edit_pelanggan', $data);
    }

    public function create()
    {
        //GET KODE VENDOR
        $vendor = $this->input->post('vendor');
        $kode_vendor =  get_kode_table("vendor", "KodeVendor", "NamaVendor", $vendor);

        $data = array(
                    "KodeVendor" => $kode_vendor,

                    "KodePelanggan" => $this->input->post('kode_pelanggan'),
                    "NamaPelanggan" => $this->input->post('nama_pelanggan'),
                    "Kota" => $this->input->post('kota'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "JenisBarang" => $this->input->post('jenis_barang'),

                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_pelanggan->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('pelanggan');
    }

    public function update($id)
    {
        //GET KODE VENDOR
        $vendor = $this->input->post('vendor');
        $kode_vendor =  get_kode_table("vendor", "KodeVendor", "NamaVendor", $vendor);

        $data = array(
                    "KodeVendor" => $kode_vendor,

                    "NamaPelanggan" => $this->input->post('nama_pelanggan'),
                    "Kota" => $this->input->post('kota'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "JenisBarang" => $this->input->post('jenis_barang'),

                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_pelanggan->update($id, $data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('pelanggan');
    }

    public function get_nama_pelanggan()
    {
        $this->db->like('NamaPelanggan', $_GET['term']);
        $this->db->select('NamaPelanggan');
        $data = $this->db->get('pelanggan')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaPelanggan;
        }

        echo json_encode($return_arr);
    }


    public function get_nama_pelanggan_berd_vendor($vendor)
    {
        $kode = $_GET['term']; 
        $data = $this->db->query("SELECT NamaPelanggan FROM pelanggan where NamaPelanggan like '%$kode%' AND KodeVendor = '$vendor' limit 10")->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaPelanggan;
        }

        echo json_encode($return_arr);
    }

    public function get_detail_pelanggan() 
    {
        $kode = $_GET['kode'];
        $this->db->where('NamaPelanggan', $kode);
        $data = $this->db->get('pelanggan')->row_array();
        $data = array(
                'KodePelanggan' => $data['KodePelanggan'],
                'KodeVendor' => $data['KodeVendor'],
                'NamaPelanggan' => $data['NamaPelanggan'],
                'Kota' => $data['Kota'],
                'Alamat' => $data['Alamat'],
                'NoTelpon' => $data['NoTelpon'],
                'JenisBarang' => $data['JenisBarang']
        );
  
        echo json_encode($data);
    }

    public function get_detail_tujuan_by_kode_vendor()
    {
        $kode = $_GET['kode'];
        $this->db->where('KodeVendor', $kode);
        $data = $this->db->get('tujuan')->row_array();
        $data = array(
                'Kode' => $data['Kode'],
                'Tujuan' => $data['Tujuan'],
                'HargaPerKg' => $data['HargaPerKg'],
                'CarterPickup' => $data['CarterPickup'],
                'CarterTS' => $data['CarterTS'],
                'CarterFuso' => $data['CarterFuso']
        );
  
        echo json_encode($data);
    }


    public function delete($id) {
        $this->m_pelanggan->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('pelanggan');
    }
}
