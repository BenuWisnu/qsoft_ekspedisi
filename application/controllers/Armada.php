<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Armada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_armada');
    }

    public function index()
    {
        $data['data_armada'] = $this->m_armada->get_all();
        $this->template->load('template', 'v_daftar_armada', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_armada->json();  
    } 




    public function add()
    {
        $this->template->load('template', 'v_tambah_armada');
    }


  

    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_armada = $this->db->get('armada')->result();
        foreach ($data_armada as $armada) {
            $return_arr[] = $armada->kode;
        }

        echo json_encode($return_arr);
    }


    public function delete($id) {
        $this->m_armada->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('armada');
    }
}
