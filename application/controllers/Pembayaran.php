<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_pembayaran');
    }

    public function index()
    {
        $data['data_pembayaran'] = $this->m_pembayaran->get_all();
        $this->template->load('template', 'v_daftar_pembayaran', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json'); 
        echo $this->m_pembayaran->json();  
    } 





    public function add()
    {
        $this->template->load('template', 'v_tambah_pembayaran');
    }


    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_pembayaran = $this->db->get('pembayaran')->result();
        foreach ($data_pembayaran as $pembayaran) {
            $return_arr[] = $pembayaran->kode;
        }

        echo json_encode($return_arr);
    }


    public function delete($id) {
        $this->m_pembayaran->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('pembayaran');
    }
}
