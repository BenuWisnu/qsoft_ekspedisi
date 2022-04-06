<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_account extends CI_Model {

    public $id = "KodePemakai";
    public $username = "KodePemakai";
    public $password = "KataSandi";
    public $table = "pemakai";

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

    public function check_login($username, $password) {
        $this->db->where($this->username, $username);
        $this->db->where($this->password, $password);
        return $this->db->get($this->table)->result();
    }


}

?>