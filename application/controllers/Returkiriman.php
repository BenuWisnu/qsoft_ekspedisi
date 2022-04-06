<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Returkiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_retur_kiriman');
    }

    public function index()
    {
        $data['data_retur_kiriman'] = $this->m_retur_kiriman->get_all();
        $this->template->load('template', 'v_daftar_retur_kiriman', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_retur_kiriman->json();  
    } 



    public function add()
    {
        $this->template->load('template', 'v_tambah_retur_kiriman');
    }

    public function edit($id)
    {
        $data['data_retur_kiriman'] = $this->m_retur_kiriman->get_by_id($id);

        $this->template->load('template', 'v_edit_retur_kiriman', $data);
    }

    public function delete($id) {
        $this->m_retur_kiriman->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('retur_kiriman');
    }
}
