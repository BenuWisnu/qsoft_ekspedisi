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
									<button type="button" class="btn btn-success btn-round waves-effect"
										data-toggle="modal" data-target="#default-Modal"><i
											class="feather icon-plus"></i> Tambahkan
										Invoice</button>



									<div class="card-header">
										<h5>Tambah Data Ekspedisi</h5>
									</div>

									<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Tambah Invoice</h4>
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
																			href="#home1" role="tab">Tambah
																			Pembayaran</a>
																	</li>

																</ul>
																<!-- Tab panes -->
																<div class="tab-content tabs card-block">

																	<div class="tab-pane active" id="home1"
																		role="tabpanel">

																		<form
																			action="<?php echo base_url('pembayaran/create_nota'); ?>"
																			method="post">


																			<input type="hidden" name="no_nota"
																				id="no_nota" readonly
																				class="form-control form-control-round"
																				value="<?= $data['NoNota']; ?>">



																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">No.
																					Bayar</label>
																				<div class="col-sm-9">
																					<input type="text" name="no_bayar"
																						id="no_bayar" required
																						class="form-control form-control-round"
																						placeholder="Auto Generate.."
																						readonly
																						value="<?= no_otomatis_bayar("invoicebayardtl", "NoBayar"); ?>">
																				</div>

																			</div>


																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">No.
																					Invoice
																				</label>
																				<div class="col-sm-9">
																					<input type="text" id="no_invoice"
																						name="no_invoice" required
																						onkeyup="get_no_invoice()"
																						class="form-control form-control-round"
																						placeholder="No. Invoice"
																						value="">
																				</div>
																			</div>


																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">Jumlah
																					Tagihan

																				</label>
																				<div
																					class="col-md-9 col-sm-10 col-xs-12">
																					<div
																						class="input-group input-group-secondary input-group">
																						<input type="number"
																							class="form-control form-control-round"
																							name="total_jumlah_tagihan"
																							id="total_jumlah_tagihan"
																							readonly
																							placeholder="Jumlah Tagihan"
																							maxlength="30"
																							oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																						<span
																							class="input-group-addon bg-black"
																							style="width: 220px"
																							id="span_total_jumlah_tagihan"
																							min="0"></span>
																					</div>
																				</div>

																			</div>



																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">Sisa
																					Tagihan

																				</label>
																				<div
																					class="col-md-9 col-sm-10 col-xs-12">
																					<div
																						class="input-group input-group-secondary input-group">
																						<input type="number"
																							class="form-control form-control-round"
																							name="total_sisa_tagihan"
																							id="total_sisa_tagihan"
																							placeholder="Total Sisa Tagihan"
																							readonly maxlength="30"
																							oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																						<span
																							class="input-group-addon bg-black"
																							style="width: 220px"
																							id="span_total_sisa_tagihan"
																							min="0"></span>
																					</div>
																				</div>

																			</div>

																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">Bayar


																				</label>
																				<div
																					class="col-md-9 col-sm-10 col-xs-12">
																					<div
																						class="input-group input-group-secondary input-group">
																						<input type="number"
																							class="form-control form-control-round"
																							name="total_bayar"
																							id="total_bayar"
																							onkeyup="hitung_bayar()"
																							required
																							placeholder="Total Bayar"
																							maxlength="30"
																							oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																						<span
																							class="input-group-addon bg-black"
																							style="width: 220px"
																							id="span_total_bayar"
																							min="0"></span>
																					</div>
																				</div>

																			</div>


																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">Sisa Bayar


																				</label>
																				<div
																					class="col-md-9 col-sm-10 col-xs-12">
																					<div
																						class="input-group input-group-secondary input-group">
																						<input type="number"
																							class="form-control form-control-round"
																							name="sisa_bayar"
																							id="sisa_bayar"
																							placeholder="Sisa Bayar"
																							maxlength="30"
																							oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																						<span
																							class="input-group-addon bg-black"
																							style="width: 220px"
																							id="span_sisa_bayar"
																							min="0"></span>
																					</div>
																				</div>

																			</div>


																			<div class="form-group row">
																				<label
																					class="col-sm-3 col-form-label">Keterangan
																				</label>
																				<div class="col-sm-9">
																					<input type="text" id="keterangan"
																						name="keterangan"
																						class="form-control form-control-round"
																						placeholder="Keterangan"
																						value="">
																				</div>
																			</div>

																			<div class="modal-footer">
																				<button type="button"
																					class="btn btn-default btn-round waves-effect "
																					data-dismiss="modal">Close</button>
																				<button type="submit"
																					class="btn btn-success btn-round waves-effect waves-light "><i
																						class="feather icon-plus"></i>Simpan
																					Perubahan</button>
																			</div>
																		</form>
																	</div>

																</div>
															</div>
														</div>
														<!-- Row end -->
													</div>

												</div>
											</div>
										</div>
									</div>

									<div class="card-block">



										<form action="<?php echo base_url('pembayaran/update/'.$data[NoNota]); ?>" method="post">



											<div class="form-group row">
												<label class="col-sm-2 col-form-label">No. Nota</label>
												<div class="col-sm-10">
													<input type="text" name="no_nota" id="no_nota" required
														class="form-control form-control-round"
														placeholder="Auto Generate.." value="<?= $data['NoNota']; ?>">
												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Tanggal</label>
												<div class="col-sm-10">
													<input type="text" name="tanggal" id="tanggal"
														class="form-control form-control-round date"
														data-mask="99/99/9999" placeholder="Invoice Date"
														value="<?= $data['Tanggal']; ?>">

												</div>
											</div>


											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Vendor</label>
												<div class="col-sm-3">
													<input type="text" name="vendor" id="vendor"
														class="form-control form-control-round"
														placeholder="Nama Vendor" onkeyup="get_nama_vendor()"
														value="<?= get_kode_table("vendor", "NamaVendor", "KodeVendor", $data['VendorCode']); ?>">
												</div>
												<div class="col-sm-3">
													<input type="text" name="kode_vendor" id="kode_vendor"
														class="form-control form-control-round"
														readonly
														placeholder="Kode Vendor" onkeyup="get_kode_vendor()"
														value="<?= $data['VendorCode']; ?>">
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
													<td><?= rupiah($data_detail->Bayar); ?>
													</td>
													<td>
														<a class="btn btn-danger btn-round text-white f-12"
															href="<?= base_url('pembayaran/delete_item_nota/'.$data_detail->NoBayar); ?>">
															<i class="feather icon-trash"></i>
															Hapus</a>
													</td>
												</tr>

												<?php 
																												}

																												?>

												<tr>
													<td></td>
													<td>
													</td>
													<td>
													</td>
													<td>
														<strong><?= rupiah($data_sub_total); ?></strong>
													</td>
													<td>

													</td>
												</tr>
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script type="text/javascript">
			var url = "<?php echo base_url();?>";

			function delete_item_nota(id) {
				var x = confirm("Are you sure to delete record?" + id);
				if (x) {
					window.location = url + "pembayaran/delete_item_nota/" + id.toString();
				} else {
					return false;
				}
			}

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

			function get_no_invoice() {
				//autocomplete
				var kode_vendor = $("#kode_vendor").val();
				//console.log(kode_vendor);
				$("#no_invoice").autocomplete({
					source: "<?php echo base_url('index.php/invoice/get_invoice_berd_vendor/') ?>" +
						kode_vendor,
					minLength: 1
				});

				get_detail_invoice();

			}



			function get_detail_invoice() {
				var kode = $("#no_invoice").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/invoice/get_detail_invoice",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#total_jumlah_tagihan').val(obj.JumlahTagihan);
							$('#total_sisa_tagihan').val(obj.JumlahSisa);
							$('#total_bayar').val(obj.JumlahTagihan);

							document.getElementById('span_total_jumlah_tagihan').innerHTML = get_rupiah(obj
								.JumlahTagihan);
							document.getElementById('span_total_sisa_tagihan').innerHTML = get_rupiah(obj
							.JumlahSisa);
							document.getElementById('span_total_bayar').innerHTML = get_rupiah(obj.JumlahTagihan);

						}
					});
				}

			}


			function hitung_bayar() {

				var jumlah_tagihan = parseInt($("#total_jumlah_tagihan").val());
				var jumlah_sisa = parseInt($("#sisa_bayar").val());
				var total_bayar = parseInt($("#total_bayar").val());


				var hasil = jumlah_tagihan - total_bayar;

				$("#sisa_bayar").val(hasil);

				document.getElementById('span_total_bayar').innerHTML = get_rupiah(jumlah_tagihan);
				document.getElementById('span_sisa_bayar').innerHTML = get_rupiah(hasil);
				document.getElementById('span_total_bayar').innerHTML = get_rupiah(total_bayar);
			}

			function get_rupiah(val) {
				var numb = val;
				const format = numb.toString().split('').reverse().join('');
				const convert = format.match(/\d{1,3}/g);
				const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
				return rupiah;
			}

		</script>
