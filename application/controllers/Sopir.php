<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sopir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_sopir');
    }

    public function index()
    {
        $data['data_sopir'] = $this->m_sopir->get_all();
        $this->template->load('template', 'v_daftar_sopir', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_sopir->json();  
    } 

 

    public function add()
    {
        $this->template->load('template', 'v_tambah_sopir');
    }

    public function edit($id)
    {
        $data['data'] = $this->m_sopir->get_by_id($id); 

        $this->template->load('template', 'v_edit_sopir', $data);
    }

    public function create()
    {
        $data = array(
                    "KodeSopir" => $this->input->post('kode_sopir'),
                    "NamaSopir" => $this->input->post('nama_sopir'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "Pickup" => $this->input->post('pickup')
                );
        $this->m_sopir->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('sopir');
    }

    public function update($id)
    {
        $data = array(
                    "NamaSopir" => $this->input->post('nama_sopir'),
                    "Alamat" => $this->input->post('alamat'),
                    "NoTelpon" => $this->input->post('no_telpon'),
                    "Pickup" => $this->input->post('pickup')
                );
        $this->m_sopir->update($id, $data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('sopir');
    }

    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_sopir = $this->db->get('sopir')->result();
        foreach ($data_sopir as $sopir) {
            $return_arr[] = $sopir->kode;
        }

        echo json_encode($return_arr);
    }



    public function delete($id) {
        $this->m_sopir->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('sopir');
    }

    public function get_detail_sopir()
    {
        $kode = $_GET['kode'];
        $this->db->where('NamaSopir', $kode);
        $res = $this->db->get('sopir')->row_array();
        $data = array(
                'NamaSopir' => $res['NamaSopir'],
                'NoTelpon' => $res['NoTelpon']
        );

        echo json_encode($data);
    }
}
