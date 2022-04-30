<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('m_admin');
        $this->load->model('m_laporan');
        $this->load->model('m_pembayaran');
        $this->load->model('m_retur_kiriman');
    }


    public function index() 
    {
 
        $id_admin = $this->session->userdata('id');

        echo $this->session->userdata('users');

        //echo $this->session->userdata('nama_lengkap');

        $data = $this->m_admin->get_by_id($id_admin);
        $this->session->set_userdata($data);

        $data['data_pembayaran'] = $this->m_pembayaran->get_all_limit(10); 
        $data['data_retur_kiriman'] = $this->m_retur_kiriman->get_all_limit(10);

        $data['total_pelanggan'] = get_total_data_table("pelanggan");
        $data['total_vendor'] = get_total_data_table("vendor");
        $data['total_armada'] = get_total_data_table("kendaraan");
        $data['total_sopir'] = get_total_data_table("sopir");
        $data['total_karyawan'] = get_total_data_table("karyawan");
        $data['total_akun'] = get_total_data_table("akun");

    

        $this->template->load('template', 'v_home', $data); 

    }
}
