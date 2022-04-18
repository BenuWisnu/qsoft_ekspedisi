<style>
	.ui-autocomplete {
		top: 10px;
		right: 10px;
		z-index: 2147483647;
		float: right;
		min-width: 100px;
		padding: 4px 0;
		margin: 0 0 10px 25px;
		list-style: none;
		background-color: #ffffff;
		border-color: #ccc;
		border-color: rgba(0, 0, 0, 0.2);
		border-style: solid;
		border-width: 1px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		-webkit-background-clip: padding-box;
		-moz-background-clip: padding;
		background-clip: padding-box;
		*border-right-width: 2px;
		*border-bottom-width: 2px;
	}

	.ui-menu-item>a.ui-corner-all {
		display: block;
		padding: 3px 15px;
		clear: both;
		font-weight: normal;
		line-height: 18px;
		color: #555555;
		white-space: nowrap;
		text-decoration: none;
	}

	.ui-state-hover,
	.ui-state-active {
		color: #ffffff;
		text-decoration: none;
		background-color: #0088cc;
		border-radius: 0px;
		-webkit-border-radius: 0px;
		-moz-border-radius: 0px;
		background-image: none;
	}

</style>
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
								<div class="card-block bg-gray">
									<!-- button Rounded -->
									<!-- <span>Daftar siswa yang sudah melakukan registrasi pembuatan kartu.</span> -->
									<p>Silahkan simpan data <code> data </code> terlebih dahulu sebelum menambah nota.
									</p>
									<button type="button" class="btn btn-success btn-round waves-effect"
										data-toggle="modal" data-target="#default-Modal"><i
											class="feather icon-plus"></i> Tambahkan Manifest</button>
								</div>
							</div>
							<!-- Input Alignment card start -->
							<div class="card">

								<div class="card-header">

									<h5>Tambah Data Invoice</h5>


								</div>

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
															<div class="tab-content tabs card-block">
																<div class="tab-pane active" id="home1" role="tabpanel">

																	<div class="dt-responsive table-responsive">
																		<table id="cbtn-selectors"
																			class="table table-striped table-bordered nowrap">
																			<thead>
																				<tr>
																					<th>No. Item</th>
																					<th>No. Invoice</th>
																					<th>Amount</th>
																					<th>No. Nota</th>
																					<th>Aksi</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php
																							$no = 1;
																							foreach ($data_invoice_detail as $data_detail) {
																						
																								?>
																				<tr>
																					<td><?= $data_detail->ItemNo; ?>
																					</td>
																					<td><?= $data_detail->NoInvoice; ?>
																					</td>
																					<td><?= $data_detail->Amount; ?>
																					</td>
																					<td><?= $data_detail->NoNota; ?>
																					</td>
																					<td>
																						<button
																							class="btn btn-danger btn-round text-white f-12"
																							onclick="delete_item_nota(<?= $data_detail->ID; ?>)">
																							<i
																								class="feather icon-trash"></i>
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
																<div class="tab-pane" id="profile1" role="tabpanel">

																	<form
																		action="<?php echo base_url('invoice/create_nota'); ?>"
																		method="post">


																		<input type="hidden" name="no_nota_invoice"
																			id="no_nota_invoice" readonly
																			class="form-control form-control-round"
																			value="<?= $data['NoInvoice']; ?>">


																		<div class="form-group row">
																			<label class="col-sm-4 col-form-label">Item
																				No.</label>
																			<div class="col-sm-8">
																				<input type="text" name="no_item"
																					id="no_item" required
																					class="form-control form-control-round"
																					placeholder="Item No."
																					value="<?= no_otomatis("invoicedtl", "ItemNo", "NoInvoice", $data['NoInvoice']); ?>">
																			</div>
																		</div>


																		<div class="form-group row">
																			<label class="col-sm-4 col-form-label">No.
																				Nota</label>
																			<div class="col-sm-8">
																				<select name="no_nota" id="no_nota"
																					onchange="get_ekspedisi()"
																					class="form-control form-control-round">


																					<?php foreach ($data_nota as $data_nota) { ?>
																					<option
																						value="<?= $data_nota->NoNota; ?>">
																						<?= $data_nota->NoNota." | ".$data_nota->NoKendaraan." | ".$data_nota->TagihanTotal;?>
																					</option>
																					<?php } ?>

																				</select>
																			</div>
																		</div>


																		<div class="form-group row">
																			<label
																				class="col-sm-4 col-form-label">Nopol</label>
																			<div class="col-sm-8">
																				<input type="text" name="nopol"
																					id="nopol" required
																					class="form-control form-control-round"
																					placeholder="Nopol">
																			</div>
																		</div>



																		<div class="form-group row">
																			<label class="col-sm-4 col-form-label">
																				Amount</label>
																			<div class="col-sm-8">
																				<div
																					class="input-group input-group-secondary input-group">
																					<input type="number"
																						class="form-control form-control-round"
																						name="amount" id="amount"
																						onkeyup="" required
																						placeholder="Total Tagihan"
																						maxlength="30"
																						oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																					<span
																						class="input-group-addon bg-black"
																						style="width: 220px"
																						id="span_amount" min="0"></span>
																				</div>
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


									<form action="<?php echo base_url('invoice/create'); ?>" method="post">


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Invoice</label>
											<div class="col-sm-10">
												<input type="text" name="no_invoice" id="no_invoice" readonly
													class="form-control form-control-round"
													placeholder="Auto Generate.." value="<?= $data['NoInvoice']; ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Vendor</label>
											<div class="col-sm-3">
												<input type="text" name="vendor" id="vendor"
													class="form-control form-control-round" placeholder="Nama Vendor"
													onkeyup="get_nama_vendor()"
													value="<?= get_kode_table("vendor", "NamaVendor", "KodeVendor", $data['VendorCode']); ?>">
											</div>
											<div class="col-sm-3">
												<input type="text" name="kode_vendor" id="kode_vendor"
													class="form-control form-control-round" placeholder="Kode Vendor"
													onkeyup="get_kode_vendor()" value="<?= $data['VendorCode']; ?>">
											</div>

											<div class="col-sm-4">
												<input type="text" name="alamat" id="alamat"
													class="form-control form-control-round" readonly
													placeholder="Alamat Vendor"
													value="<?= get_kode_table("vendor", "Alamat", "KodeVendor", $data['VendorCode']); ?>">
											</div>
										</div>




										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Invoice Date</label>
											<div class="col-sm-10">
												<input type="text" name="invoice_date" id="invoice_date"
													class="form-control form-control-round date" data-mask="99/99/9999"
													placeholder="Invoice Date"
													value="<?= tgl_default_4($data['Tanggal']); ?>">

											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Due Date</label>

											<div class="col-sm-4">
												<div class="input-group input-group-secondary input-group">
													<span class="input-group-addon bg-black" style="width: 100px"
														min="0">Top</span>

													<input type="number" class="form-control form-control-round" min="0"
														max="31" name="top" id="top"
														onkeyup="hitung_due_date()" required 
														placeholder="Term Of Payment" maxlength="30"
														value="<?= (int) $data['TOP']; ?>"
														oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
													<span class="input-group-addon bg-black" style="width: 100px" id=""
														min="0">Days</span>
												</div>
											</div>
											<div class="col-sm-6">
												<input type="text" name="due_date" id="due_date" readonly
													class="form-control form-control-round date" data-mask="99/99/9999"
													placeholder="Tanggal Jatuh Tempo (Due Date)"
													value="<?= tgl_default_4($data['TanggalTempo']); ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Keterangan</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" id="keterangan"
													class="form-control form-control-round" placeholder="Keterangan"
													value="<?= $data['Perihal']; ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Transfer Ke</label>
											<div class="col-sm-10">
												<select name="transfer_ke" id="transfer_ke"
													class="form-control form-control-round">

													<option value="<?= $data['BankTransfer']; ?>" selected="selected">
														<?= $data['BankTransfer']." (".get_kode_table("bank", "Bank", "NoRekening", $data['BankTransfer']).") - ".get_kode_table("bank", "AtasNama", "NoRekening", $data['BankTransfer']); ?>
													</option>
													<?php foreach ($data_bank as $data_bank) { ?>
													<option value="<?= $data_bank->NoRekening; ?>">
														<?= $data_bank->NoRekening." (".$data_bank->Bank.") - ".$data_bank->AtasNama;?>
													</option>
													<?php } ?>

												</select>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Dibuat Oleh</label>
											<div class="col-sm-4">
												<input type="text" name="dibuat_oleh" readonly
													class="form-control form-control-round" placeholder="Dibuat Oleh"
													value="<?= $data['DibuatOleh']; ?>">
											</div>
											<label class="col-sm-1 col-form-label">Disetujui Oleh</label>
											<div class="col-sm-5">
												<input type="text" name="disetujui_oleh" required
													class="form-control form-control-round" placeholder="Disetujui Oleh"
													value="<?= $data['DisetujuiOleh']; ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Cabang</label>
											<div class="col-sm-10">
												<input type="text" name="cabang" readonly
													class="form-control form-control-round" placeholder="Cabang"
													value="<?= $data['Cabang']; ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Total Tagihan</label>
											<div class="col-sm-10">
												<div class="input-group input-group-secondary input-group">
													<input type="number" class="form-control form-control-round"
														name="total_bayar_tujuan" id="total_bayar_tujuan"
														placeholder="Total Bayar Tujuan" maxlength="30"
														value="<?= $data['TotalTagihan']; ?>"
														oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
													<span class="input-group-addon bg-black" style="width: 220px"
														id="span_total_bayar_tujuan" min="0"></span>
												</div>
											</div>
										</div>





										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i
													class="feather icon-plus"></i>Simpan Data</button>
											<a href="<?= base_url('manifest'); ?>" class="btn btn-danger btn-round"><i
													class="feather icon-x"></i>Batalkan</a>
										</div>

									</form>

								</div>
							</div>
							<!-- Input Alignment card end -->
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

	
	var due_date = $("#invoice_date").val();

	function delete_item_nota(id) {
		var x = confirm("Are you sure to delete record?")
		if (x) {
			window.location = url + "invoice/delete_item_nota/" + id;
		} else {
			return false;
		}
	}


	function get_ekspedisi() {
		var no_nota = $("#no_nota").val();
		get_detail_ekspedisi();
	}

	function get_detail_ekspedisi() {
		var kode = $("#no_nota").val();
		console.log(kode);
		if (kode != "") {
			$.ajax({ 
				url: "<?php echo base_url()?>index.php/vendorekspedisi/get_detail_ekspedisi",
				data: "kode=" + kode,
				success: function (data) {
					var json = data,
						obj = JSON.parse(json);
					$('#nopol').val(obj.NoKendaraan);
					$('#amount').val(obj.TagihanTotal);
					document.getElementById('span_amount').innerHTML = get_rupiah(obj.TagihanTotal);

				}
			});
		}

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

	function get_rupiah(val) {
		var numb = val;
		const format = numb.toString().split('').reverse().join('');
		const convert = format.match(/\d{1,3}/g);
		const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
		return rupiah;
	}


	function hitung_due_date() {

		var top = parseInt($("#top").val());
		var res = 0;

		var day = (top + parseInt(due_date.substr(0, 2)));
		var month = due_date.substr(3, 2);
		var year = parseInt(due_date.substr(6, 4));



		if (day >= 0 && day <= 9) {
			day = "0" + day;
		}


		if (day > 31) {
			month++;
			month = "0" + month;
			day = day - 31;
			if (day >= 0 && day <= 9) {
				day = "0" + day;
			}
		}

		if (top == "") {
			res = "02/02/2022";
		} else {
			res = day + "/" + month + "/" + year;
		}
		console.log(res);


		$('#due_date').val(res);

	}

	function numberOnly(id) {
		// Get element by id which passed as parameter within HTML element event
		var element = document.getElementById(id);
		// This removes any other character but numbers as entered by user
		element.value = element.value.replace(/[^0-9]/gi, "");
	}

</script>
