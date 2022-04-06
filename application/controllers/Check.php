<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller { 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

     public function __construct() {
         parent::__construct();
         $this->load->model('m_check_resi');
     }


	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('front/v_result_check');
	}

    public function search() {
        $id = $this->input->post('id');

        $check = $this->m_check_resi->get_by_id($id);
        if ($check) {
            $data['flag'] = 1;
        }
        else {

            $data['flag'] = 0;
        }

        $data['data'] = $this->m_check_resi->get_by_id($id);
		$this->load->view('front/v_result_check', $data);

    }

    public function detail()
	{
		//$this->load->helper('url');
		$this->load->view('front/v_detail_article');
	}
}
