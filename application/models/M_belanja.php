<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_belanja extends CI_Model {

    public $table = 'riwayat_belanja';
    public $view = 'view_riwayat_belanja';
    public $view_riwayat_bulanan = 'view_riwayat_belanja_bulanan';
    public $id = 'id';
    public $kode = 'kode';
    public $tgl = 'tgl_belanja';
    public $order = 'DESC';

    
    
    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all()
    {
        $this->db->order_by("tgl_belanja", $this->order);
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
        $today = date("Y-m-d");
        return $this->db->query("SELECT *, sum(total_belanja) as total FROM view_riwayat_belanja where tgl_belanja = '$today' AND kode = '$kode'")->row_array();
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