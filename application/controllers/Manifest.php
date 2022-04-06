<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manifest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_manifest');
        $this->load->library('upload'); 
        
    }




    function soal_14($x) {
        return function ($y) use ($x) {
            return str_repeat($y, $x);
        };
        
    }

    function soal_22($x1 = 0, $x2 = 1) {
        $res = $x1 + $x2;
        $x1 = $x2;
        $x2 = $res;
        return $res;
    }

    public function get($v) {
        return $this->v[$v];
         
   }

    public function index()
    {

        $data['data_manifest'] = $this->m_manifest->get_all();
        $this->template->load('template', 'v_daftar_manifest', $data);
    }
    

    public function add()
    {
        $this->template->load('template', 'v_tambah_manifest');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_manifest->get_by_id($id);
        $this->template->load('template', 'v_edit_manifest', $data);
    }



    public function delete($id) {
        $this->m_manifest->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('manifest');
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
