<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pendaftarancepat extends CI_Controller
{
    public function index()
    {
        $this->load->view('pendaftarancepat');
    }

    public function viewajax()
	{
        $data=$this->Crud_model->display_records();
        $i=1;
        foreach($data as $row)
        {
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row->name."</td>";
                echo "<td>".$row->email."</td>";
                echo "<td>".$row->phone."</td>";
                echo "<td>".$row->city."</td>";
                echo "</tr>";
                $i++;
        }
	}
}
