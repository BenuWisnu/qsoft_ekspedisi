

<!DOCTYPE html>
<html lang="en">

<?php
// Load header_view
    $this->load->view('partials/v_header.php');
?>

            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                <?php
                ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-yellow f-w-600"><?= number_format($total_pelanggan); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Pelanggan</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/pelanggan.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-yellow">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% Total Pelanggan</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-green f-w-600"><?= number_format($total_vendor); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Vendor</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/vendor.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-green">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% change</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-pink f-w-600"><?= number_format($total_sopir); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Sopir</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/sopir.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-pink">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% Total Sopir</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-blue f-w-600"><?= number_format($total_armada); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Armada</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/sopir.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-blue">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% Total Armada</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-orenge f-w-600"><?= number_format($total_karyawan); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Karyawan</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/karyawan.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-orenge">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% change</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-xl-4 col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center">
                                                                <div class="col-8">
                                                                    <h4 class="text-c-yellow f-w-600"><?= number_format($total_akun); ?></h4>
                                                                    <h6 class="text-muted m-b-0">Total Akun</h6>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <img class="img" src="<?php echo base_url('assets/images/png/akun.png'); ?>" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-c-yellow">
                                                            <div class="row align-items-center">
                                                                <div class="col-9">
                                                                    <p class="text-white m-b-0">% change</p>
                                                                </div>
                                                                <div class="col-3 text-right">
                                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- task, page, download counter  end -->

                                            

                     

                                        </div>

                                        <!-- Page-body Riwayat Bayar -->
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- HTML5 Export Buttons table start -->
                                                    <div class="card">
                                                        <div class="card-header table-card-header">
                                                            <h5>Riwayat Pembayaran</h5> <br>
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="dt-responsive table-responsive">
                                                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Tanggal</th>
                                                                            <th>Tgl. Tambah</th>
                                                                            <th>User Tambah</th>
                                                                            <th>Sub Total</th>
                                                                            <th>No. Nota</th>
                                                                            <th>Vendor Code</th>
                                                                            <th>Nama Vendor</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($data_pembayaran as $data) {
                                                                            $hari = tgl_dan_hari(substr($data->Tanggal, 0, 11));
                                                                            $hari_tt = tgl_dan_hari(substr($data->TanggalTambah, 0, 11));
                                                                    
                                                                            ?>
                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <td><?= $hari.tgl_default(substr($data->Tanggal, 0, 11)); ?></td>
                                                                            <td><?= $hari_tt.tgl_default(substr($data->TanggalTambah, 0, 11)); ?></td>
                                                                            <td><?= $data->UserTambah; ?></td>
                                                                            <td><?= rupiah($data->Subtotal); ?></td>
                                                                            <td><?= $data->NoNota; ?></td>
                                                                            <td><?= $data->VendorCode; ?></td>
                                                                            <td><?= $data->NamaVendor; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                                            }

                                                                                            ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- HTML5 Export Buttons end -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page-body Riwayat Bayar -->


                                        <!-- Page-body Riwayat Retur Kiriman -->
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- HTML5 Export Buttons table start -->
                                                    <div class="card">
                                                        <div class="card-header table-card-header">
                                                            <h5>Daftar Retur Kiriman</h5> <br>
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="dt-responsive table-responsive">
                                                                <table id="dtHorizontalExample1" class="table table-striped table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>NoReturn</th>
                                                                            <th>NoNota</th>
                                                                            <th>Tanggal</th>
                                                                            <th>AlamatPengirim</th>
                                                                            <th>AlamatPenerima</th>
                                                                            <th>UserTambah</th>
                                                                            <th>TanggalTambah</th>
                                                                            <th>NamaPengirim</th>
                                                                            <th>NamaPenerima</th>
                                                                            <th>Cabang</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($data_retur_kiriman as $data) {
                                                                            $hari = tgl_dan_hari(substr($data->Tanggal, 0, 11));
                                                                            $hari_tt = tgl_dan_hari(substr($data->TanggalTambah, 0, 11));
                                                                    
                                                                            ?>
                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <td><?= $data->NoReturn; ?></td>
                                                                            <td><?= $data->NoNota; ?></td>
                                                                            <td><?= $hari.tgl_default(substr($data->Tanggal, 0, 11)); ?></td>
                                                                            <td><?= $data->AlamatPengirim; ?></td>
                                                                            <td><?= $data->AlamatPenerima; ?></td>
                                                                            <td><?= $data->UserTambah; ?></td>
                                                                            <td><?= $hari_tt.tgl_default(substr($data->TanggalTambah, 0, 11)); ?></td>
                                                                            <td><?= $data->NamaPengirim; ?></td>
                                                                            <td><?= $data->NamaPenerima; ?></td>
                                                                            <td><?= $data->Cabang; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                                            }

                                                                                            ?>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>NoReturn</th>
                                                                            <th>NoNota</th>
                                                                            <th>Tanggal</th>
                                                                            <th>AlamatPengirim</th>
                                                                            <th>AlamatPenerima</th>
                                                                            <th>UserTambah</th>
                                                                            <th>TanggalTambah</th>
                                                                            <th>NamaPengirim</th>
                                                                            <th>NamaPenerima</th>
                                                                            <th>Cabang</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- HTML5 Export Buttons end -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page-body Riwayat Retur Kiriman -->


                                    </div>
                                    <!-- <div>
                                        <img src="<?= base_url('assets/images/bg.jpg'); ?>" alt="img" width="100%">
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    $this->load->view('partials/v_footer.php');
?>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function () {
    $('#dtHorizontalExample tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#dtHorizontalExample').DataTable({
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11],
                    
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Pembayaran'+' <?= urldecode(""); ?>' + '_' + today;
              },

            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ],
                },
                filename: function(){
                  
                  var today = new Date();
                  var dd = today.getDate();
  
                  var mm = today.getMonth()+1; 
                  var yyyy = today.getFullYear();
                  if(dd<10) 
                  {
                      dd='0'+dd;
                  } 
  
                  if(mm<10) 
                  {
                      mm='0'+mm;
                  } 
                  today = dd+'-'+mm+'-'+yyyy;
  
                  return 'Daftar_Pembayaran'+' <?= urldecode(""); ?>' + '_' + today;
                },

            },
            'colvis'
        ],
  "scrollX": true,
  "deferRender": true,
  "responsive": true,
   
  
  });
  
  
  $('.dataTables_length').addClass('bs-select');
  });
</script>


<script type="text/javascript">
  $(document).ready(function () {
    $('#dtHorizontalExample tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="'+title+' Search" />' );
	} );

  $('#dtHorizontalExample1').DataTable({
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                  columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11],
                    
                },
                filename: function(){
                  
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 

                if(mm<10) 
                {
                    mm='0'+mm;
                } 
                today = dd+'-'+mm+'-'+yyyy;

                return 'Daftar_Invoice'+' <?= urldecode(""); ?>' + '_' + today;
              },

            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ],
                },
                filename: function(){
                  
                  var today = new Date();
                  var dd = today.getDate();
  
                  var mm = today.getMonth()+1; 
                  var yyyy = today.getFullYear();
                  if(dd<10) 
                  {
                      dd='0'+dd;
                  } 
  
                  if(mm<10) 
                  {
                      mm='0'+mm;
                  } 
                  today = dd+'-'+mm+'-'+yyyy;
  
                  return 'Daftar_Invoice'+' <?= urldecode(""); ?>' + '_' + today;
                },

            },
            'colvis'
        ],
  "scrollX": true,
  "deferRender": true,
  "responsive": true,
   
  
  });
  
  
  $('.dataTables_length').addClass('bs-select');
  });
</script>