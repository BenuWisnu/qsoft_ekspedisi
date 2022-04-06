
<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">
				<?php if ($this->session->flashdata('success') != "") { ?>
				<div class="alert alert-success" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled"></i>
					</button>
					<strong>Success!</strong> <?= $this->session->flashdata('success'); ?></code>
				</div>
				<?php } ?>


				<!-- Page-body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-block bg-gray">
									<!-- button Rounded -->
									<!-- <span>Daftar siswa yang sudah melakukan registrasi pembuatan kartu.</span> -->
									<a href="<?= base_url('pembayaran/add'); ?>" class="btn btn-success btn-round text-right"><i class="feather icon-plus"></i> Tambah Pembayaran</a>
								</div>
							</div>
							<!-- HTML5 Export Buttons table start -->
							<div class="card">
								<div class="card-header table-card-header">
									<h5>Daftar Pembayaran</h5> <br>
								</div>
								<div class="card-block">
									<div class="dt-responsive table-responsive">
                                        <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>No.</th>
													<th>Tanggal</th>
													<th>Akun Bayar</th>
													<th>Tgl. Tambah</th>
													<th>User Tambah</th>
													<th>Keterangan</th>
													<th>Bayar</th>
													<th>No. Invoice</th>
													<th>No. Nota</th>
													<th>No. Bayar</th>
													<th>Vendor Code</th>
													<th>Nama Vendor</th>
													<th>Aksi</th>
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
													<td><?= $hari.", ".tgl_default(substr($data->Tanggal, 0, 11)); ?></td>
													<td><?= $data->AkunBayar; ?></td>
													<td><?= $hari_tt.", ".tgl_default(substr($data->TanggalTambah, 0, 11)); ?></td>
													<td><?= $data->UserTambah; ?></td>
													<td><?= $data->Keterangan; ?></td>
													<td><?= rupiah($data->Bayar); ?></td>
													<td><?= $data->NoInvoice; ?></td>
													<td><?= $data->NoNota; ?></td>
													<td><?= $data->NoBayar; ?></td>
													<td><?= $data->VendorCode; ?></td>
													<td><?= $data->NamaVendor; ?></td>
													<td>
															<a class="btn btn-success btn-round text-white f-12"
															href="<?= base_url('pembayaran/edit/'.$data->NoNota); ?>"><i class="feather icon-edit-2"></i> Edit</a>
														<button class="btn btn-danger btn-round text-white f-12" onclick="ConfirmDialog(<?= $data->NoNota; ?>)">
														<i class="feather icon-trash"></i> Hapus</button>
													</td>
												</tr>
												<?php
                                                                    }

                                                                    ?>
											</tbody>
											<tfoot>
												<tr>
													<th>No.</th>
													<th>Tanggal</th>
													<th>Akun Bayar</th>
													<th>Tgl. Tambah</th>
													<th>User Tambah</th>
													<th>Keterangan</th>
													<th>Bayar</th>
													<th>No. Invoice</th>
													<th>No. Nota</th>
													<th>No. Bayar</th>
													<th>Vendor Code</th>
													<th>Nama Vendor</th>
													<th>Aksi</th>
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
				<!-- Page-body end -->
			</div>
		</div>
	</div>
	<!-- Main-body end -->

</div>

<script type="text/javascript">
	var url="<?php echo base_url();?>";
    function ConfirmDialog(id) {
		var x=confirm("Are you sure to delete record?")
		if (x) {
          	window.location = url + "invoice/delete/" + id;
		} else {
			return false;
		}
	}


</script>

<script>
$(document).ready(function() {
  $("#success-alert").hide();
  $("#myWish").click(function showAlert() {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
  });
});
</script>

<script src="text/javascript">
  $(document).ready(function() {
    $('#cbtn-selectors').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
       
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            },
            'colvis'
        ]
    } );
} );
</script>