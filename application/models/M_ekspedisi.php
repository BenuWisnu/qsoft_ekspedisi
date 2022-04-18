<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ekspedisi extends CI_Model {

    public $id = "NoNota";
    public $table = "ekspedisi";
    public $table_detail = "ekspedisidetail";
    public $view = "view_ekspedisi";
    public $view_detail = "view_ekspedisi_detail";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        $this->db->order_by($this->id, "DESC");
        return $this->db->get($this->view)->result();
    }

    public function get_all_detail($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table_detail)->result(); 
    }

    public function get_all_tagihan_ekspedisi($kode_vendor) {
        $query = "SELECT *FROM ekspedisi WHERE KodeVendor = '$kode_vendor' AND NoNota NOT IN (SELECT NoNota FROM invoicedtl)";
        return $this->db->query($query)->result();
    } 

    public function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }



    public function insert($data) {
        $this->db->insert($this->table, $data);
    }

    public function insert_detail($data) {
        $this->db->insert($this->table_detail, $data);
    }

    public function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function delete_item($id) {
        $this->db->where("id", $id);
        $this->db->delete($this->table_detail);
    }


}

?>
