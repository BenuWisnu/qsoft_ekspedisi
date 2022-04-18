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
        $data['data_sub_total'] = get_sum_by_field("invoicebayardtl", "Bayar", "NoNota", $id);

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

    public function create_nota()
    {
        
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota');
        $no_invoice = $this->input->post('no_invoice');

        $data = array(

                    "NoBayar" => $this->input->post('no_bayar'),
                    "NoNota" => $this->input->post('no_nota'),
                    "NoInvoice" => $no_invoice,
                    "JumlahSisa" => $this->input->post('total_sisa_tagihan'),
                    "Bayar" => $this->input->post('total_bayar'),
                    "UserTambah" => $this->session->userdata('KodePemakai')

                );
        $this->m_pembayaran->insert_detail($data);
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

    public function delete_item_nota($id)
    {
        $no_nota = get_kode_table("invoicebayardtl", "NoNota", "NoBayar", $id);

        $this->m_pembayaran->delete_item($id);
        $this->session->set_flashdata('success', "Berhasil");

        redirect('pembayaran/edit/'.$no_nota);
    }
}
