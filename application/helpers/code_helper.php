<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_login(){
    $ci = get_instance(); 
    if(!$ci->session->userdata('KodePemakai')){
        $ci->session->set_flashdata('failed', '<div class="alert alert-danger alert">Login Terlebih Dahulu.</div>');
        redirect('auth');
    }
}


function PdfGenerator($html, $filename, $paper, $orientation) {
    require 'vendor/autoload.php';
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    $dompdf->stream($filename, array('Attachment' => 0));

}

function get_total_data_table($table)
{
    $ci = get_instance();
    $query = "SELECT *FROM $table";
    $data = $ci->db->query($query)->num_rows();
    if (isset($data)) {
        return $data;
    } else {
        return "";
    }
}

function get_total_nominal_data_table($table, $field)
{
    $ci = get_instance();
    $query = "SELECT sum($field) as total FROM $table";
    $data = $ci->db->query($query)->row_array();
    if (isset($data['total'])) {
        return $data['total'];
    } else {
        return "";
    }
}



if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

        return $result;
    }
}

function no_urut_otomatis($table, $field)
{
    $ci = get_instance();
    $today = date('Y-m-d');

    $kodeBaru = 0;
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max($field) as kode FROM $table";
    $data = $ci->db->query($query)->row_array();
    $kode = (int) $data['kode'];

    $kode++;

    if ($kode >= 1 && $kode <= 8) {
        $kode++;
        $kodeBaru = "000000000".$kode;
    } elseif ($kode >= 9 && $kode <= 99) {
        $kode++;
        $kodeBaru = "00000000".$kode;
    } elseif ($kode >= 100 && $kode <= 999) {
        $kode++;
        $kodeBaru = "0000000".$kode;
    } elseif (strlen($kode) == 4) {
        $kode++;
        $kodeBaru = "000000".$kode;
    } elseif ($kode >= 1000) {
        $kode++;
        $kodeBaru = "00000".$kode;
    }
    
    return $kodeBaru;
}

function no_otomatis($table, $field, $where, $value)
{
    $ci = get_instance();

    $query = "SELECT max($field) as kode FROM $table where $where = '$value'";
    $data = $ci->db->query($query)->row_array();
    $kode =  $data['kode'] + 1;

    return $kode; 
}

function no_otomatis_bayar($table, $field)
{
    $ci = get_instance();

    $query = "SELECT max($field) as kode FROM $table";
    $data = $ci->db->query($query)->row_array();
    $kode =  $data['kode'];

    if ($kode == 1) {
        $kode++;
        $kodeBaru = "00000".$kode;
    } elseif ($kode > 1 && $kode <= 8) {
        $kode++;
        $kodeBaru = "0000".$kode;
    } elseif ($kode >= 9 && $kode <= 99) {
        $kode++;
        $kodeBaru = "000".$kode;
    } elseif ($kode >= 100 && $kode <= 999) {
        $kode++;
        $kodeBaru = "000".$kode;
    } 
    else {
        $kode++;
        $kodeBaru = "000".$kode;
    }

    return $kodeBaru; 
}




function kode_otomatis($table, $field, $prefix)
{
    $ci = get_instance();
    $today = date('Y-m-d'); 


    $kodeBaru = 0;
    // mencari kode  dengan nilai paling besar
    $query = "SELECT max($field) as kode FROM $table where substr(TanggalTambah, 1, 10) = '$today'";
    $data = $ci->db->query($query)->row_array();
    $kode =  substr($data['kode'], 11, 4);

    if ($kode == 1) {
        $kode++;
        $kodeBaru = "000".$kode;
    } elseif ($kode > 1 && $kode <= 8) {
        $kode++;
        $kodeBaru = "000".$kode;
    } elseif ($kode >= 9 && $kode <= 99) {
        $kode++;
        $kodeBaru = "00".$kode;
    } elseif ($kode >= 100 && $kode <= 999) {
        $kode++;
        $kodeBaru = "0".$kode;
    } 
    else {
        $kode++;
        $kodeBaru = "000".$kode;
    }
    

    return $prefix."-".substr($today, 2, 2).str_replace("-","",substr($today, 5, 6))."-".$kodeBaru;
}

function kode_invoice_otomatis($table, $field, $prefix, $cabang)
{
    $ci = get_instance();
    $today = date('Y-m-d');


    $kodeBaru = 0;
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max(RIGHT($field, 6)) as kode FROM $table where Cabang = '$cabang'";
    $data = $ci->db->query($query)->row_array();
    $kode = (int) $data['kode'];

    if (strlen($kode) == 1) {
        $kode++;
        $kodeBaru = "00000".$kode;
    } elseif (strlen($kode) == 2) {
        $kode++;
        $kodeBaru = "0000".$kode;
    } elseif (strlen($kode) == 3) {
        $kode++;
        $kodeBaru = "000".$kode;
    } elseif (strlen($kode) == 4) {
        $kode++;
        $kodeBaru = "00".$kode;
    } elseif (strlen($kode) == 5) {
        $kode++;
        $kodeBaru = "0".$kode;
    } 
    else {
        $kode++;
        $kodeBaru = "".$kode;
    }
    

    return $prefix."-".$kodeBaru;
}

//GET SPECIFIC DATA FROM FIELD TABLE
function get_kode_table($table, $field, $where_field,  $value)
{
    $ci = get_instance();
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT $field FROM $table where $where_field = '".urldecode($value)."'";
    $data = $ci->db->query($query)->row_array();
    if (isset($data[$field])) {
        return $data[$field];
    }
    else {
        $data = "";
    }
}

function check_data_table($table, $where_field,  $value)
{
    $ci = get_instance();
    // mencari cek data
    $query = "SELECT *FROM $table where $where_field = '".urldecode($value)."'";
    $data = $ci->db->query($query)->num_rows();


    if ($data <= 0) {
        return true;
    }
    else {
        return false;
    }
}

function get_sum_by_field($table, $field, $where_field,  $value)
{
    $ci = get_instance();
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT SUM($field) as total FROM $table where $where_field = '".urldecode($value)."'";
    $data = $ci->db->query($query)->row_array();
    if (isset($data['total'])) {
        return $data['total'];  
    }
    else {
        $data = "";
    }
}

function get_data_for_spinner($table) 
    {
        $ci = get_instance();

        $data = $ci->db->get($table)->result();
        foreach ($data as $data) {
            $return_arr[] = $data->$field_res;
        }

        echo json_encode($return_arr);
}



function tgl_indo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}

function get_bulan($no)
{
    $no = (INT) $no;
    
    $BulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
 
    $result = $BulanIndo[$no];
    return($result);
}

if (!function_exists('jam_indo')) {
    function jam_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');

        $waktu = substr($date, 11, 5);
        $result = $waktu;
  
        return $result;
    }
}

  if (!function_exists('tgl_default')) {
      function tgl_default($date)
      {
          if ($date == "") {
              return "";
          }
          else {
            $newdate = date("d-m-Y", strtotime($date)); 

          }
    
          return $newdate;
      }
  }

  if (!function_exists('tgl_default_2')) {
    function tgl_default_2($date)
    {
        if ($date == "") {
            return "";
        }
        else {
          $newdate = date("m-d-Y", strtotime($date)); 

        }
  
        return $newdate;
    }
}

if (!function_exists('tgl_default_3')) {
    function tgl_default_3($date)
    {
        if ($date == "") {
            return "";
        }
        else { //02/02/2022
          $newdate = substr($date, 6,4)."/".substr($date, 3,2)."/".substr($date, 0,2); 

        }
  
        return $newdate;
    }
}

if (!function_exists('tgl_default_4')) {
    function tgl_default_4($date)
    {
        if ($date == "") {
            return "";
        }
        else { //02/02/2022
          $newdate = substr($date, 8,2)."/".substr($date, 5,2)."/".substr($date, 0,4); 

        }
  
        return $newdate;
    }
}

function tgl_dan_hari($tgl)
{
    if ($tgl == "" || is_null($tgl)) {
        return "";
    }
    else {

        $hari = array( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
           );
 
        // Misal hari ini adalah sabtu
        // echo date('N'); // Hasil 6
        // echo $hari[ date('N') ]; // Sama seperti echo $hari[6], hasil: Sabtu
 
        // Contoh tanggal 20 Maret 2016 adalah hari Minggu
        $num = date('N', strtotime($tgl));
        //echo $num; // Hasil 7
    }
     return $hari[$num].", "; // Hasil: Minggu
}

 function jam_sekarang()
 {
     date_default_timezone_set("Asia/Jakarta");
     return date("G:i:s");
 }
 
 function format_tgl($date)
 {
     $hasil = date("Y-m-d", strtotime($date));
     return $hasil;
 }

function last_updated_backup($view)
{
    error_reporting(0);
    $ci =& get_instance();
    $data = $ci->db->query("select *FROM time_last_updated_pendaftaran limit 1")->row_array();
    $date = $data['terakhir_update'];
    $second = str_replace("-", "", $date['second']);
    $minute = str_replace("-", "", $date['minute']);
    $hour = str_replace("-", "", $date['hour']);
    $day = str_replace("-", "", $date['day']);

    if (!is_null($second) || !is_null($minute) || !is_null($hour) || !is_null($day)) {
        $second = ((int) $second) % 60;
        $minute = ((int) $minute) % 60;
        $hour = ((int) $hour)  % 24;

        if ($day != 0) {
            return $day." hari, ".$hour." jam yang lalu";
        } elseif ($hour != 0) {
            return $hour." jam, ".$minute." menit yang lalu";
        } elseif ($minute != 0) {
            return $minute." menit, ".$second." detik yang lalu";
        }
    }
    return null;
}

function last_updated($view)
{
    $ci =& get_instance();
    $data = $ci->db->query("select *FROM ".$view)->row_array();
    $awal = $data['terakhir_update'];

    $awal  = new DateTime($awal);
    $akhir = new DateTime(); // Waktu sekarang
    $diff  = $awal->diff($akhir);

    $second = $diff->d;
    $minute = $diff->i;
    $hour = $diff->h;
    $day = $diff->d;

    if (!is_null($second) || !is_null($minute) || !is_null($hour) || !is_null($day)) {
        $second = ((int) $second) % 60;
        $minute = ((int) $minute) % 60;
        $hour = ((int) $hour)  % 24;

        if ($day != 0) {
            return $day." hari, ".$hour." jam lalu";
        } elseif ($hour != 0) {
            return $hour.":".$minute." menit lalu";
        } elseif ($minute != 0) {
            return $minute.":".$second." detik lalu";
        }
    }
    return null;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format(floatval($angka), 2, ',', '.');
    return $hasil_rupiah;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return ucwords($hasil);
}