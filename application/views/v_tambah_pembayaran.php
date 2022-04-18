<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">


				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">

							<div class="card">
								<div class="card-block">

									<div class="card-block">



										<form action="<?php echo base_url('pembayaran/create'); ?>" method="post">



											<div class="form-group row">
												<label class="col-sm-2 col-form-label">No. Nota</label>
												<div class="col-sm-10">
													<input type="text" name="no_nota" id="no_nota" required
														class="form-control form-control-round"
														placeholder="Auto Generate.."
														value="<?= kode_otomatis("invoicebayar", "NoNota", "INB"); ?>">
												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Tanggal</label>
												<div class="col-sm-10">
													<input type="text" name="tanggal" id="tanggal"
														class="form-control form-control-round date"
														data-mask="99/99/9999" placeholder="Invoice Date"
														value="<?= date("d/m/Y"); ?>">

												</div>
											</div>

											<!-- <input type="text" name="tanggal" id="tanggal"
														class="form-control form-control-round date"
														data-mask="99/99/9999" placeholder="Invoice Date" 
														value="<?= ((int) substr(date("d/m/Y"), 0, 2) + 10).substr(date("d/m/Y"), 3, 8); ?>"> -->


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Vendor</label>
												<div class="col-sm-3">
													<input type="text" name="vendor" id="vendor"
														class="form-control form-control-round"
														placeholder="Nama Vendor" onkeyup="get_nama_vendor()"
														value="">
												</div>
												<div class="col-sm-3">
													<input type="text" name="kode_vendor" id="kode_vendor"
														class="form-control form-control-round" readonly
														placeholder="Kode Vendor" onkeyup="get_kode_vendor()"
														value="">
												</div>

												<div class="col-sm-4">
													<input type="text" name="alamat" id="alamat"
														class="form-control form-control-round" readonly
														placeholder="Alamat Vendor"
														value="">
												</div>
											</div>





											<div class="j-footer">
												<button type="submit" class="btn btn-success btn-round"><i
														class="feather icon-plus"></i>Simpan Data</button>
												<a href="<?= base_url('manifest'); ?>"
													class="btn btn-danger btn-round"><i
														class="feather icon-x"></i>Batalkan</a>
											</div>

										</form>
									</div>


								</div>
							</div>

						</div>
						<!-- Page body end -->
					</div>
				</div>
				<!-- Main-body end -->

			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function () {
				$("#from-datepicker").datepicker({
					format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
				});
			});


			function get_no_nota() {
				//autocomplete
				$("#no_nota").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_no_nota",
					minLength: 1
				});

				get_detail_ekspedisi();
			}

			function get_no_nota_pencarian() {
				//autocomplete
				$("#pencarian").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_no_nota",
					minLength: 1
				});

				//get_detail_ekspedisi();
			}

			function get_kode_vendor() {
				//autocomplete
				$("#kode_vendor").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_kode_vendor",
					minLength: 1
				});

				get_detail_vendor();
			}


			function get_nama_vendor() {
				//autocomplete
				$("#vendor").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_nama_vendor",
					minLength: 1
				});

				get_detail_vendor();
			}

			function get_detail_vendor() {
				var kode = $("#vendor").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/vendorekspedisi/get_detail_vendor_berd_nama",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#kode_vendor').val(obj.KodeVendor);
							$('#vendor').val(obj.NamaVendor);
							$('#alamat').val(obj.Alamat);


						}
					});
				} else {
					$('#vendor').val("");
					$('#alamat').val("");

				}

			}


		

		</script>
