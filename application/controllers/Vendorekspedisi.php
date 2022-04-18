<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendorekspedisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_vendor');
    }

    public function index()
    {
        $data['data_vendor'] = $this->m_vendor->get_all();
        $this->template->load('template', 'v_daftar_vendor', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_vendor->json();  
    } 


    public function add()
    {
        $this->template->load('template', 'v_tambah_vendor');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_vendor->get_by_id($id); 

        $this->template->load('template', 'v_edit_vendor', $data);
    }

    public function create()
    {

        $data = array(
                    "KodeVendor" => $this->input->post('kode_vendor'),
                    "NamaVendor" => $this->input->post('nama_vendor'),
                    "Kota" => $this->input->post('kota'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "JenisBarang" => $this->input->post('jenis_barang'),

                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_vendor->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('vendorekspedisi');
    }

    public function update($id)
    {

        $data = array(
                    "NamaVendor" => $this->input->post('nama_vendor'),
                    "Kota" => $this->input->post('kota'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "JenisBarang" => $this->input->post('jenis_barang'),

                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_vendor->update($id, $data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('vendorekspedisi');
    }

    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_vendor = $this->db->get('vendor')->result();
        foreach ($data_vendor as $vendor) {
            $return_arr[] = $vendor->kode;
        }

        echo json_encode($return_arr);
    }

    public function delete($id) {
        $this->m_vendor->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('vendorekspedisi');
    }


    //GET DATA VENFOR


    public function get_kode_vendor() 
    {
        $this->db->like('KodeVendor', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('vendor')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->KodeVendor;
        }

        echo json_encode($return_arr);
    }


    public function get_nama_vendor() 
    {
        $this->db->like('NamaVendor', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('vendor')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaVendor;
        }

        echo json_encode($return_arr);
    }

    public function get_vendor() 
    {
        $this->db->like('NamaVendor', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('vendor')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaVendor;
        }

        echo json_encode($return_arr);
    }

    public function get_no_kendaraan() 
    {
        $this->db->like('NoKendaraan', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('kendaraan')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NoKendaraan;
        }

        echo json_encode($return_arr);
    }

    public function get_sopir() 
    {
        $this->db->like('NamaSopir', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('sopir')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaSopir;
        }

        echo json_encode($return_arr);
    }

        //GET NO NOTA EKSPEDISI
        public function get_no_nota() 
        {
            $this->db->like('NoNota', $_GET['term']);
            $this->db->limit(10);
            $data = $this->db->get('ekspedisi')->result();
            foreach ($data as $data) {
                $return_arr[] = $data->NoNota;
            }
    
            echo json_encode($return_arr);
        }

    public function get_kapal() 
    {
        $this->db->like('NamaSopir', $_GET['term']);
        $this->db->limit(10);
        $data = $this->db->get('sopir')->result();
        foreach ($data as $data) {
            $return_arr[] = $data->NamaSopir;
        }

        echo json_encode($return_arr);
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->m_vendor->search_vendor($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->blog_title;
                echo json_encode($arr_result);
            }
        }
    }

    public function get_detail_vendor()
    {
        $vendor = $_GET['kode'];
        $this->db->where('KodeVendor', $vendor);
        $res = $this->db->get('vendor')->row_array();
        $data = array(
                'KodeVendor' => $res['KodeVendor'],
                'NamaVendor' => $res['NamaVendor'],
                'Alamat' => $res['Alamat']
        );

        echo json_encode($data);
    }

    public function get_detail_vendor_berd_nama()
    {
        $vendor = $_GET['kode'];
        $this->db->where('NamaVendor', $vendor);
        $res = $this->db->get('vendor')->row_array();
        $data = array(
                'KodeVendor' => $res['KodeVendor'],
                'NamaVendor' => $res['NamaVendor'],
                'Alamat' => $res['Alamat']
        );
 
        echo json_encode($data);
    }

    public function get_detail_ekspedisi()
    {
        $vendor = $_GET['kode'];
        $this->db->where('NoNota', $vendor);
        $res = $this->db->get('ekspedisi')->row_array();
        $data = array(
                'NoNota' => $res['NoNota'],
                'Tanggal' => $res['Tanggal'],
                'KodeVendor' => $res['KodeVendor'],
                'NoKendaraan' => $res['NoKendaraan'],
                'Asal' => $res['Asal'],
                'Sopir' => $res['Sopir'],
                'Kapal' => $res['Kapal'],
                'NoTelponSopir' => $res['NoTelponSopir'],
                'TagihanTotal' => $res['TagihanTotal']
                
        );

        echo json_encode($data);
    }

}
