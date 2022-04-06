<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_laporan extends CI_Model
{
    public $table = 'riwayat_top_up';
    public $view_top_up = 'view_riwayat_top_up';
    public $view_belanja = 'view_riwayat_belanja';

    public $view_laporan_top_up = 'view_laporan_topup';
    public $view_laporan_belanja = 'view_laporan_belanja';

    public $id = 'id';
    public $kode = 'kode';
    public $order = 'DESC';

    
    
    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all_belanja()
    {
        return $this->db->get($this->view_belanja)->result();
    }

    public function get_all_topup()
    {
        return $this->db->get($this->view_top_up)->result();
    }


    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_all_topup_berd_tanggal($tanggal1, $tanggal2) 
    {
        $query = "select *, sum(nominal_top_up) over() as total from view_riwayat_top_up where 
        (substr(tgl_top_up, 1, 10) between '$tanggal1' AND '$tanggal2')";
 
        return $this->db->query($query)->result();
    }

    public function get_all_topup_semua() 
    {
        $query = "select *, sum(nominal_top_up) over() as total from view_riwayat_top_up";
 
        return $this->db->query($query)->result();
    }

    public function get_all_belanja_berd_tanggal($tanggal1, $tanggal2) 
    {
        $query = "select *, sum(total_belanja) over() as total from view_riwayat_belanja where 
        (substr(tgl_belanja, 1, 10) between '$tanggal1' AND '$tanggal2')";
 
        return $this->db->query($query)->result();
    }

    public function get_all_belanja_semua() 
    {
        $query = "select *, sum(total_belanja) over() as total from view_riwayat_belanja";
        return $this->db->query($query)->result();
    }

    public function get_all_bertingkat_topup($bulan_tahun, $admin, $siswa)
    {
        if ($bulan_tahun != "" && $siswa != "" && $admin != "") {
            $this->db->where("nama_siswa", urldecode($siswa));
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } elseif ($bulan_tahun == "" && $admin == "") {
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($admin == "" && $siswa == "") {
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } elseif ($siswa == "" && $bulan_tahun == "") {
            $this->db->where("nama_admin", urldecode($admin));
        } elseif ($bulan_tahun == "") {
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($admin == "") {
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($siswa == "") {
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } 
 
        $this->db->order_by("tgl_top_up", $this->order);
        return $this->db->get($this->view_laporan_top_up)->result();
    }

    public function get_all_bertingkat_belanja($bulan_tahun, $admin, $siswa) 
    {

        if ($bulan_tahun != "" && $siswa != "" && $admin != "") {
            $this->db->where("nama_siswa", urldecode($siswa));
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } elseif ($bulan_tahun == "" && $admin == "") {
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($admin == "" && $siswa == "") {
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } elseif ($siswa == "" && $bulan_tahun == "") {
            $this->db->where("nama_admin", urldecode($admin));
        } elseif ($bulan_tahun == "") {
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($admin == "") {
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
            $this->db->where("nama_siswa", urldecode($siswa));
        } elseif ($siswa == "") {
            $this->db->where("nama_admin", urldecode($admin));
            $this->db->where("bulan_tahun", urldecode($bulan_tahun));
        } 
 
        $this->db->order_by("tgl_belanja", $this->order);
        return $this->db->get($this->view_laporan_belanja)->result();
    }

}
