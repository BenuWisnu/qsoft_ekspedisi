<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_topup extends CI_Model {

    public $table = 'riwayat_top_up';
    public $view = 'view_riwayat_top_up';
    public $view_riwayat_bulanan = 'view_riwayat_topup_bulanan';
    public $id = 'id';
    public $kode = 'kode';
    public $order = 'DESC';

    
    
    public function __construct()
    {
        parent::__construct();
    }

    function json() {
        $this->datatables->select('*');
        $this->datatables->from('view_riwayat_top_up');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_obat.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('topup/update/$1'),'<i class="fa fa-plus" aria-hidden="true"> Update</i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('topup/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_all_riwayat()
    {
        return $this->db->get($this->view)->result();
    }

    public function get_all_group_by_bulan()
    {
        return $this->db->get($this->view_riwayat_bulanan)->result();
    }

    public function get_all_group_by_petugas()
    {
        $this->db->group_by("nama_admin");
        $this->db->order_by("nama_admin", "ASC");
        $this->db->select('*, COUNT(*) as total');
        return $this->db->get($this->view)->result();
    }

    public function get_all_group_by_siswa()
    {
        $this->db->group_by("nama_siswa");
        $this->db->order_by("nama_siswa", "ASC");
        $this->db->select('*, COUNT(*) as total');
        return $this->db->get($this->view)->result();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    public function get_detail_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->view)->row_array();
    }

    // get data by kode
    public function get_by_kode($kode)
    {
        $this->db->where($this->kode, $kode);
        return $this->db->get($this->view)->row_array();
    }
    
    public function insert($data) {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        
    }

}

?>