<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_invoice');
        $this->load->model('m_ekspedisi');
        $this->load->model('m_bank');
    }

    public function index()
    {
        $data['data_invoice'] = $this->m_invoice->get_all();
        $this->template->load('template', 'v_daftar_invoice', $data);
    }

        
    public function json() { 
        header('Content-Type: application/json');
        echo $this->m_invoice->json();  
    } 

    
    public function add()
    {
        //echo kode_invoice_otomatis("invoice", "NoInvoice", "INV", "BJM");
        $data['data_bank'] = $this->m_bank->get_all();
        $this->template->load('template', 'v_tambah_invoice', $data);
    }

    public function edit($id)
    {

        $kode_vendor = $this->m_invoice->get_by_id($id);
        $kode_vendor = $kode_vendor['VendorCode']; 


        $data['data'] = $this->m_invoice->get_by_id($id);
        $data['data_nota'] = $this->m_ekspedisi->get_all_tagihan_ekspedisi($id, $kode_vendor);
        $data['data_bank'] = $this->m_bank->get_all();
        $data['data_invoice_detail'] = $this->m_invoice->get_all_detail($id);

        $this->template->load('template', 'v_edit_invoice', $data);
    }



    public function get_kode()
    {
        $this->db->like('kode', $_GET['term']);
        $this->db->select('kode');
        $data_invoice = $this->db->get('invoice')->result();
        foreach ($data_invoice as $invoice) {
            $return_arr[] = $invoice->kode;
        }

        echo json_encode($return_arr);
    }



    public function delete($id) {
        $this->m_invoice->delete($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('invoice');
    }

    public function create()
    {
        //GET NO. NOTA
        $no_invoice = $this->input->post('no_invoice');

        $data = array(

                    "NoInvoice" => $no_invoice,
                    "Tanggal" => tgl_default_3($this->input->post('invoice_date')),
                    "VendorCode" => $this->input->post('kode_vendor'),
                    "TOP" => $this->input->post('top'),
                    "TanggalTempo" => tgl_default_3($this->input->post('due_date')),
                    "BankTransfer" => $this->input->post('transfer_ke'),
                    "DibuatOleh" => $this->input->post('dibuat_oleh'),
                    "DisetujuiOleh" => $this->input->post('disetujui_oleh'),
                    "Perihal" => $this->input->post('keterangan'),
                    "Cabang" => $this->input->post('cabang'),
                    "Status" => "Open"
                );
        $this->m_invoice->insert($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('invoice/edit/'.$no_invoice);
    }

    public function create_nota()
    {
        
        //GET NO. NOTA
        $no_nota = $this->input->post('no_nota_invoice');

        $data = array(

                    "ItemNo" => $this->input->post('no_item'),
                    "NoInvoice" => $no_nota,
                    "Amount" => $this->input->post('amount'),
                    "NoNota" => $this->input->post('no_nota')
                );
        $this->m_invoice->insert_detail($data);
        $this->session->set_flashdata('success', "Berhasil");
        redirect('invoice/edit/'.$no_nota);
    }

    public function delete_item_nota($id) {
        $no_nota = get_kode_table("invoicedtl", "NoInvoice", "id", $id);

        $this->m_invoice->delete_item($id);
        $this->session->set_flashdata('success', "Berhasil"); 

        redirect('invoice/edit/'.$no_nota);
    } 
}
