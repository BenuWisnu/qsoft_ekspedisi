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
				<?php if ($this->session->flashdata('failed') != "") { ?>
				<div class="alert alert-danger" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="icofont icofont-close-line-circled"></i>
					</button>
					<strong>Gagal!</strong> <?= $this->session->flashdata('failed'); ?></code> 
				</div>
				<?php } ?>

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
										TTB</button>
									<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Tambah Nota</h4>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="card-block">
														<!-- Row start -->
														<div class="row">
															<div class="col-lg-12 col-xl-12">
																<!-- Nav tabs -->
																<ul class="nav nav-tabs  tabs" role="tablist">
																	<li class="nav-item">
																		<a class="nav-link active" data-toggle="tab"
																			href="#home1" role="tab">Daftar Nota</a>
																	</li>
																	<li class="nav-item">
																		<a class="nav-link" data-toggle="tab"
																			href="#profile1" role="tab">Tambah Nota</a>
																	</li>

																</ul>
																<!-- Tab panes -->
															
															</div>
														</div>
														<!-- Row end -->
													</div>

												</div>
											</div>
										</div>

									</div>



									<div class="card-header">
										<h5>Tambah Data Manifest</h5>
									</div>

									<div class="card-block">



										<form action="<?php echo base_url('ekspedisi/create'); ?>" method="post">



											<div class="form-group row">
												<label class="col-sm-2 col-form-label">No. Nota</label>
												<div class="col-sm-10">
													<input type="text" name="no_nota" id="no_nota" required
														class="form-control form-control-round"
														placeholder="Auto Generate.." onkeyup="get_no_nota()"
														value="<?= kode_otomatis("ekspedisi", "NoNota", "EKS"); ?>">
												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Tgl. Manifest</label>
												<div class="col-sm-10">
													<input type="text" name="tanggal" id="tanggal"
														class="form-control form-control-round date"
														data-mask="99/99/9999" placeholder="Invoice Date"
														value="<?= date("d/m/Y"); ?>">
												</div>
											</div> 



											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Vendor</label>
												<div class="col-sm-3">
													<input type="text" name="vendor" id="vendor"
														class="form-control form-control-round" required
														placeholder="Nama Vendor" onkeyup="get_nama_vendor()" onmouseup="get_nama_vendor()">
												</div>
												<div class="col-sm-3">
													<input type="text" name="kode_vendor" id="kode_vendor"
														class="form-control form-control-round" readonly
														placeholder="Kode Vendor" onkeyup="get_kode_vendor()">
												</div>

												<div class="col-sm-4">
													<input type="text" name="alamat" id="alamat"
														class="form-control form-control-round" readonly
														placeholder="Alamat Vendor">
												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">No. Manifest</label>
												<div class="col-sm-4">
													<input type="text" name="no_manifest" required
														class="form-control form-control-round"
														placeholder="No. Manifest/SJ" onmouseup="get_nama_vendor()">
												</div>
												<label class="col-sm-2 col-form-label">Tanggal
													Manifest</label>
												<div class="col-sm-4">

													<input type="text" name="tanggal_manifest" id="tanggal_manifest"
														class="form-control form-control-round date"
														data-mask="99/99/9999" placeholder="Tanggal Manifest"
														value="<?= date("d/m/Y"); ?>">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Armada</label>
												<div class="col-sm-2">
													<input type="text" name="no_kendaraan" id="no_kendaraan"
														class="form-control form-control-round"
														placeholder="No. Kendaraan" onkeyup="get_no_kendaraan()">
												</div>
												<div class="col-sm-2">
													<input type="text" name="sopir" id="sopir"
														class="form-control form-control-round" placeholder="Sopir"
														onkeyup="get_sopir()">
												</div>
												<div class="col-sm-3">
													<input type="text" name="telp_sopir" id="telp_sopir"
														class="form-control form-control-round"
														placeholder="Telp. Sopir" readonly>
												</div>
												<div class="col-sm-3">
													<input type="text" name="kapal" id="kapal"
														class="form-control form-control-round" placeholder="Kapal"
														onkeyup="get_kapal()">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Dari - Daerah
													Tujuan</label>
												<div class="col-sm-4">
													<input type="text" name="dari" id="dari"
														class="form-control form-control-round" placeholder="Dari">
												</div>
												<div class="col-sm-6">
													<input type="text" name="daerah_tujuan" id="daerah_tujuan"
														class="form-control form-control-round"
														placeholder="Daerah Tujuan">
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Total Pembiayaan
												</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<div class="input-group input-group-secondary input-group">
														<input type="number" class="form-control form-control-round"
															name="total_bayar_tujuan" id="total_bayar_tujuan"
															onkeyup="hitung()" placeholder="Total Bayar Tujuan"
															maxlength="30"
															oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														<span class="input-group-addon bg-black" style="width: 220px"
															id="span_total_bayar_tujuan" min="0"></span>
													</div>
												</div>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="input-group input-group-secondary input-group">
														<input type="number" class="form-control form-control-round"
															name="total_biaya_handling" id="total_biaya_handling"
															onkeyup="hitung_handling()"
															placeholder="Total Biaya Handling" maxlength="30"
															oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														<span class="input-group-addon bg-black" style="width: 220px"
															id="span_total_biaya_handling" min="0"></span>
													</div>
												</div>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="input-group input-group-secondary input-group">
														<input type="number" class="form-control form-control-round"
															name="total_tagihan" id="total_tagihan"
															onkeyup="hitung_total()" placeholder="Total Tagihan"
															maxlength="30"
															oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														<span class="input-group-addon bg-black" style="width: 220px"
															id="span_total_tagihan" min="0"></span>
													</div>
												</div>
											</div>


											<div class="j-footer">
												<button type="submit" id="btn_simpan" class="btn btn-success btn-round"><i
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script type="text/javascript">


			const vendor_mouse = document.getElementById('vendor');

			vendor_mouse.addEventListener('mousemove', e => {
				get_detail_vendor();
			});

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

			function get_nama_vendor() {
				//autocomplete
				$("#vendor").autocomplete({
					// select: function(event, ui) {
					// 	var origEvent = event;
					// 	while (origEvent.originalEvent !== undefined)
					// 		origEvent = origEvent.originalEvent;
					// 	if (origEvent.type == 'keydown')
					// 		$("#vendor").click();
					// },
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_nama_vendor",
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
					$('#kode_vendor').val("");
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
