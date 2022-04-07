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
									<p>Silahkan simpan data <code> data </code> terlebih dahulu sebelum menambah nota.
									</p>
									<!-- Modal static-->
									<button type="button" class="btn btn-success btn-round waves-effect disabled"
										data-toggle="modal" data-target="#"><i class="feather icon-plus"></i> Tambahkan
										Nota</button>



									<div class="card-header">
										<h5>Tambah Data Ekspedisi</h5>
									</div>

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



											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Kode Vendor</label>
												<div class="col-sm-3">
													<input type="text" name="kode_vendor" id="kode_vendor"
														class="form-control form-control-round"
														placeholder="Kode Vendor" value="<?= $data['VendorCode']; ?>"
														onkeyup="get_kode_vendor()">
												</div>
												<div class="col-sm-3">
													<input type="text" name="vendor" id="vendor"
														class="form-control form-control-round" readonly
														placeholder="Nama Vendor"
														value="<?= get_kode_table("vendor", "NamaVendor", "KodeVendor", $data['VendorCode']); ?>">
												</div>
												<div class="col-sm-4">
													<input type="text" name="alamat" id="alamat"
														class="form-control form-control-round" readonly
														placeholder="Alamat Vendor"
														value="<?= get_kode_table("vendor", "Alamat", "KodeVendor", $data['VendorCode']); ?>">
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

							<div class="card">
								<div class="card-block">
									<div class="dt-responsive table-responsive">
										<table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>No.</th>
													<th>No. Bayar</th>
													<th>No. Invoice</th>
													<th>Bayar</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
																							$no = 1;
																							foreach ($data_pembayaran_detail as $data_detail) {
																						
																								?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $data_detail->NoBayar; ?>
													</td>
													<td><?= $data_detail->NoInvoice; ?>
													</td>
													<td><?= $data_detail->Bayar; ?>
													</td>
													<td>
														<button class="btn btn-danger btn-round text-white f-12"
															onclick="delete_item_nota(<?= $data_detail->NoBayar; ?>)">
															<i class="feather icon-trash"></i>
															Hapus</button>
													</td>
												</tr>

												<?php
																												}

																												?>
											</tbody>
										</table>
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


			function get_cabang() {
				//autocomplete
				$("#cabang").autocomplete({
					source: "<?php echo base_url() ?>index.php/manifest/get_cabang",
					minLength: 1
				});

				//get_detail_autofill();
			}

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


			function get_vendor() {
				//autocomplete
				$("#vendor").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_vendor",
					minLength: 1
				});

				//get_detail_autofill();
			}

			function get_no_kendaraan() {
				//autocomplete
				$("#no_kendaraan").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_no_kendaraan",
					minLength: 1
				});

			}

			function get_sopir() {
				//autocomplete
				$("#sopir").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_sopir",
					minLength: 1
				});

				get_detail_sopir();
			}

			function get_nama_pelanggan() {
				//autocomplete
				var kode_vendor = $("#kode_vendor").val();
				//console.log(kode_vendor);
				$("#pelanggan").autocomplete({
					source: "<?php echo base_url('index.php/pelanggan/get_nama_pelanggan_berd_vendor/') ?>" +
						kode_vendor,
					minLength: 1
				});

				get_detail_pelanggan();

			}

			function get_detail_sopir() {
				var kode = $("#sopir").val();
				console.log(kode);
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/sopir/get_detail_sopir",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#telp_sopir').val(obj.NoTelpon);

						}
					});
				} else {
					$('#telp_sopir').val("");
				}

			}

			function get_detail_vendor() {
				var kode = $("#kode_vendor").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/vendorekspedisi/get_detail_vendor",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#vendor').val(obj.NamaVendor);
							$('#alamat').val(obj.Alamat);


						}
					});
				} else {
					$('#vendor').val("");
					$('#alamat').val("");

				}

			}

			function get_detail_pelanggan() {
				var kode = $("#pelanggan").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/pelanggan/get_detail_pelanggan",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#tujuan').val(obj.Kota);
							$('#alamat_tujuan').val(obj.Alamat);

						}
					});
				}

			}


			function get_detail_ekspedisi() {
				var kode = $("#no_nota").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/vendorekspedisi/get_detail_ekspedisi",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#kode_vendor').val(obj.KodeVendor);
							$('#tanggal').val(obj.Tanggal);
							console.log(formatDate(obj.Tanggal));
							$('#no_kendaraan').val(obj.NoKendaraan);
							$('#sopir').val(obj.Sopir);
							$('#kapal').val(obj.Kapal);
							$('#dari').val(obj.Asal);
							$('#tujuan').val(obj.Tujuan);


						}
					});
				}

			}

		</script>
