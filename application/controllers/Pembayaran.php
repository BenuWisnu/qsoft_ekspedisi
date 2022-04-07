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

    public function edit($id)
    {
        $data['data'] = $this->m_pembayaran->get_by_id($id);
        $data['data_sub_total'] = get_sum_by_field("invoicebayar", "Subtotal", "NoNota", $id);

        $data['data_pembayaran_detail'] = $this->m_pembayaran->get_all_detail($id);
        $this->template->load('template', 'v_edit_pembayaran', $data);
    }

    public function create()
    {
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota');

        $data = array(

                    "NoNota" => $no_nota,
                    "Tanggal" => tgl_default_3($this->input->post('tanggal')),
                    "VendorCode" => $this->input->post('kode_vendor'),
                    "SubTotal" => 0,
                    "Cabang" => $this->session->userdata('Cabang'),
                    "UserTambah" => $this->session->userdata('KodePemakai')
                );
        $this->m_pembayaran->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('pembayaran/edit/'.$no_nota);
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
