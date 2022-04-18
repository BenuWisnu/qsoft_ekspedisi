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


							<!-- Input Alignment card start -->
							<div class="card">

								<div class="card-header">

									<h5>Tambah Data Invoice</h5>


								</div>



								<div class="card-block">

									<form action="<?php echo base_url('invoice/create'); ?>" method="post"
										enctype="multipart/form-data">


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Invoice</label>
											<div class="col-sm-10">
												<input type="text" name="no_invoice" id="no_invoice" required
													class="form-control form-control-round"
													placeholder="Auto Generate.."
													value="<?= kode_invoice_otomatis("invoice", "NoInvoice", "INV".$this->session->userdata('Cabang'), $this->session->userdata('Cabang')); ?>"
													onkeyup="get_cabang()">
											</div>
										</div>


										<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Vendor</label>
												<div class="col-sm-3">
													<input type="text" name="vendor" id="vendor"
														class="form-control form-control-round"
														placeholder="Nama Vendor" onkeyup="get_nama_vendor()">
												</div>
												<div class="col-sm-3">
													<input type="text" name="kode_vendor" id="kode_vendor"
														class="form-control form-control-round"
														placeholder="Kode Vendor" onkeyup="get_kode_vendor()">
												</div>

												<div class="col-sm-4">
													<input type="text" name="alamat" id="alamat"
														class="form-control form-control-round" readonly
														placeholder="Alamat Vendor">
												</div>
											</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Invoice Date</label>
											<div class="col-sm-10">
												<input type="text" name="invoice_date" id="invoice_date"
													class="form-control form-control-round date" data-mask="99/99/9999"
													placeholder="Invoice Date" value="<?= date("d/m/Y"); ?>">
													
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Due Date</label>

											<div class="col-sm-4">
												<div class="input-group input-group-secondary input-group">
													<span class="input-group-addon bg-black" style="width: 100px"
														min="0">Top</span>

													<input type="number" class="form-control form-control-round" min="0" max="31" value="0"
														name="top" id="top" onkeyup="hitung_due_date()" required 
														placeholder="Term Of Payment" maxlength="30"
														oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
													<span class="input-group-addon bg-black" style="width: 100px" id=""
														min="0">Days</span>
												</div>
											</div>
											<div class="col-sm-6">
												<input type="text" name="due_date" id="due_date"
													class="form-control form-control-round date" data-mask="99/99/9999"
													placeholder="Tanggal Jatuh Tempo (Due Date)" readonly
													value="<?= date("d/m/Y"); ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Keterangan</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" id="keterangan"
													class="form-control form-control-round"
													placeholder="Keterangan">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Transfer Ke</label>
											<div class="col-sm-10">
												<select name="transfer_ke" id="transfer_ke"
													class="form-control form-control-round">
													<?php foreach ($data_bank as $data) { ?>
														<option value="<?= $data->NoRekening; ?>"><?= $data->NoRekening." (".$data->Bank.") - ".$data->AtasNama;?></option>
													<?php } ?>
												</select>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Dibuat Oleh</label>
											<div class="col-sm-4">
												<input type="text" name="dibuat_oleh" readonly
													class="form-control form-control-round" placeholder="Dibuat Oleh"
													value="administrator">
											</div>
											<label class="col-sm-1 col-form-label">Disetujui Oleh</label>
											<div class="col-sm-5">
												<input type="text" name="disetujui_oleh" required
													class="form-control form-control-round"
													placeholder="Disetujui Oleh" value="TEST">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Cabang</label>
											<div class="col-sm-10">
												<input type="text" name="cabang" readonly
													class="form-control form-control-round" placeholder="Cabang"
													value="<?= $this->session->userdata('Cabang'); ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Total Tagihan</label>
											<div class="col-sm-10">
												<div class="input-group input-group-secondary input-group">
													<input type="number" class="form-control form-control-round"
														name="total_bayar_tujuan" id="total_bayar_tujuan"
														placeholder="Total Bayar Tujuan"
														maxlength="30"
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

	var due_date = $("#invoice_date").val();

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
			source: "<?php echo base_url('index.php/pelanggan/get_nama_pelanggan_berd_vendor/') ?>" + kode_vendor,
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

	function hitung_due_date() {

		var top = parseInt($("#top").val());
		var res = 0;

		var day = (top + parseInt(due_date.substr(0, 2)));
		var month = due_date.substr(3, 2);
		var year = parseInt(due_date.substr(6, 4));


		
		if (day >= 0 && day <=9) { 
			day = "0" + day;
		}

	
		if (day > 31) {
			month++;
			month = "0" + month;
			day = day - 31;
			if (day >= 0 && day <=9) { 
				day = "0" + day;
			}
		}

		if (top == "") {
			res = due_date;
		}
		else {
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
