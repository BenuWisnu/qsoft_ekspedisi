<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_karyawan');
    }

    public function index()
    {
        $data['data_karyawan'] = $this->m_karyawan->get_all();
        $this->template->load('template', 'v_daftar_karyawan', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_karyawan->json();  
    } 



    public function add()
    {
        $this->template->load('template', 'v_tambah_karyawan');
    }

    public function edit($id)
    {
        $data['data_karyawan'] = $this->m_karyawan->get_by_id($id);

        $this->template->load('template', 'v_edit_karyawan', $data);
    }


    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_karyawan = $this->db->get('karyawan')->result();
        foreach ($data_karyawan as $karyawan) {
            $return_arr[] = $karyawan->kode;
        }

        echo json_encode($return_arr);
    }



    public function delete($id) {
        $this->m_karyawan->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('karyawan');
    }
}
