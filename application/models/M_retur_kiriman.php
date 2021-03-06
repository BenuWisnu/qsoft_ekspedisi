<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_retur_kiriman extends CI_Model {

    public $id = "NoReturn";
    public $table = "ekspedisireturn";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        $this->db->order_by($this->id, "DESC");
        return $this->db->get($this->table)->result();
    }

    public function get_all_limit($limit) {
        $this->db->order_by($this->id, "DESC");
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
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
<!-- 
NAMA FIELD
Nomor,
NoReturn,
NoNota,
Tanggal,
AlamatPengirim,
AlamatPenerima,
UserTambah,
TanggalTambah,
NamaPengirim,
NamaPenerima,
Cabang -->