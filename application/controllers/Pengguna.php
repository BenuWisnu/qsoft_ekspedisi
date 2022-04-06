<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_pengguna');
        $this->load->library('upload'); 
        
    }

    public function index()
    {
        $data['data_pengguna'] = $this->m_pengguna->get_all();
        $this->template->load('template', 'v_daftar_pengguna', $data);
    }

    public function add()
    {
        no_kartu_otomatis();
        $this->template->load('template', 'v_tambah_pengguna');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_pengguna->get_by_id($id);
        $this->template->load('template', 'v_edit_pengguna', $data);
    }


   function barcode_print($id) {
        require 'vendor/autoload.php';
       $data['row'] = $this->m_pengguna->get_by_id($id);
       $row = $this->m_pengguna->get_by_id($id);
       $data['id'] = $id;
       $html = $this->load->view('kartu', $data, true);
       PdfGenerator($html, $row['nama_lengkap'], array(0, 0, 87.87, 124.72), 'landscape');
   }


    public function delete($id) {
        $data = $this->m_pengguna->get_by_id($id);

        $photo = $data['photo'];
        $this->m_pengguna->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        unlink("uploads/".$photo);
        redirect('pengguna');
    }
}
