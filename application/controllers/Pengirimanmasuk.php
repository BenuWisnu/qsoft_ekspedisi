<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengirimanmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_pengiriman_masuk');
    }

    public function index()
    {
        $data['data_pengiriman_masuk'] = $this->m_pengiriman_masuk->get_all();
        $this->template->load('template', 'v_daftar_pengiriman_masuk', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_pengiriman_masuk->json();  
    } 



    public function add()
    {
        $this->template->load('template', 'v_tambah_pengiriman_masuk');
    }

    public function edit($id)
    {
        $get_id_pengiriman_masuk = $this->m_belanja->get_detail_by_id($id);

        $data['data'] = $this->m_pengiriman_masuk->get_by_id($id);

        $this->template->load('template', 'v_edit_pengiriman_masuk', $data);
    }


    public function delete($id) {
        $this->m_pengiriman_masuk->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('pengiriman_masuk');
    }
}
