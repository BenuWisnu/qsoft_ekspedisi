<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manifest extends CI_Model {

    public $id = "NoNota";
    public $table = "ekspedisi";
    public $view = "view_ekspedisi";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        $this->db->order_by($this->id, "DESC");
        return $this->db->get($this->view)->result();
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
