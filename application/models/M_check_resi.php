<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_check_resi extends CI_Model {

    public $id = "NoNota";
    public $table = "ekspedisi";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }
}

?>