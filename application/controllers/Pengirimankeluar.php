<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengirimankeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_pengiriman_keluar');
    }

    public function index()
    {
        $data['data_pengiriman_keluar'] = $this->m_pengiriman_keluar->get_all();
        $this->template->load('template', 'v_daftar_pengiriman_keluar', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_pengiriman_keluar->json();  
    } 



    public function add()
    {
        $this->template->load('template', 'v_tambah_pengiriman_keluar');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_pengiriman_keluar->get_by_id($id);

        $this->template->load('template', 'v_edit_pengiriman_keluar', $data);
    }



    public function delete($id) {
        $this->m_pengiriman_keluar->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('pengiriman_keluar');
    }
}
