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


				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">


							<div class="card">
								<div class="card-block bg-gray">
									<!-- button Rounded -->
									<!-- <span>Daftar siswa yang sudah melakukan registrasi pembuatan kartu.</span> -->
									<p>Silahkan simpan data <code> data </code> terlebih dahulu sebelum menambah nota.</p>
									<button type="button" class="btn btn-success btn-round waves-effect"
										data-toggle="modal" data-target="#default-Modal"><i
											class="feather icon-plus"></i> Tambahkan Nota</button>
								</div>
							</div>
							<div class="card">
								<div class="card-block">
									<!-- Modal static-->
									
								r



										<div class="card-header">
											<h5>Tambah Data Ekspedisi</h5>
										</div>

										<div class="card-block">



												<form action="<?php echo base_url('ekspedisi/update/'.$data['NoNota']); ?>" method="post" >



													<div class="form-group row">
														<label class="col-sm-2 col-form-label">No. Nota</label>
														<div class="col-sm-10">
															<input type="text" name="no_nota" id="no_nota" required
																class="form-control form-control-round"
																placeholder="Auto Generate.." readonly
																value="<?= $data['NoNota']; ?>">
														</div>
													</div>


													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Manifest</label>
														<div class="col-sm-10">
															<input type="text" id="from-datepicker" name="tanggal" required
																class="form-control form-control-round"
																placeholder="Tanggal" value="<?= tgl_default($data['Tanggal']); ?>">
																
														</div>
													</div>



													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Kode Vendor</label>
														<div class="col-sm-3">
															<input type="text" name="kode_vendor" id="kode_vendor"
																class="form-control form-control-round"
																placeholder="Kode Vendor" value="<?= $data['KodeVendor']; ?>" onkeyup="get_kode_vendor()">
														</div>
														<div class="col-sm-3">
															<input type="text" name="vendor" id="vendor"
																class="form-control form-control-round" readonly
																placeholder="Nama Vendor" value="<?= get_kode_table("vendor", "NamaVendor", "KodeVendor", $data['KodeVendor']); ?>" >
														</div>
														<div class="col-sm-4">
															<input type="text" name="alamat" id="alamat"
																class="form-control form-control-round" readonly
																placeholder="Alamat Vendor" value="<?= get_kode_table("vendor", "Alamat", "KodeVendor", $data['KodeVendor']); ?>">
														</div>
													</div>


													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Manifest</label>
														<div class="col-sm-4">
															<input type="text" name="no_manifest" required
																class="form-control form-control-round"
																placeholder="No. Manifest/SJ" value="<?= $data['NoSJ']; ?>">
														</div>

														<label class="col-sm-2 col-form-label">Tanggal
															Manifest</label>
														<div class="col-sm-4">
															<input type="text" name="tanggal_manifest" required
																class="form-control form-control-round"
																placeholder="Tanggal Manifest" value="<?= tgl_default($data['TanggalSJ']); ?>">
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Armada</label>
														<div class="col-sm-2">
															<input type="text" name="no_kendaraan" id="no_kendaraan"
																class="form-control form-control-round"
																placeholder="No. Kendaraan"
																onkeyup="get_no_kendaraan()" value="<?= $data['NoKendaraan']; ?>">
														</div>
														<div class="col-sm-2">
															<input type="text" name="sopir" id="sopir"
																class="form-control form-control-round"
																placeholder="Sopir" onkeyup="get_sopir()" value="<?= $data['Sopir']; ?>">
														</div>
														<div class="col-sm-3">
															<input type="text" name="telp_sopir" id="telp_sopir"
																class="form-control form-control-round"
																placeholder="Telp. Sopir" readonly value="<?= get_kode_table("sopir", "NoTelpon", "NamaSopir", $data['Sopir']); ?>">
														</div>
														<div class="col-sm-3">
															<input type="text" name="kapal" id="kapal"
																class="form-control form-control-round"
																placeholder="Kapal" onkeyup="get_kapal()" value="<?= $data['Kapal']; ?>">
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Dari - Daerah
															Tujuan</label>
														<div class="col-sm-4">
															<input type="text" name="dari" id="dari"
																class="form-control form-control-round"
																placeholder="Dari" value="<?= $data['Asal']; ?>">
														</div>
														<div class="col-sm-6">
															<input type="text" name="daerah_tujuan" id="daerah_tujuan"
																class="form-control form-control-round"
																placeholder="Daerah Tujuan" value="<?= $data['DaerahTujuan']; ?>">
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Total Pembiayaan
														</label>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<div class="input-group input-group-secondary input-group">
																<input type="number"
																	class="form-control form-control-round"
																	name="total_bayar_tujuan" id="total_bayar_tujuan"
																	onkeyup="hitung()" required
																	placeholder="Total Bayar Tujuan" maxlength="30"
																	value="<?php echo $data_bayar_tujuan; ?>"
																	oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																<span class="input-group-addon bg-black"
																	style="width: 220px" id="span_total_bayar_tujuan"
																	min="0"></span>
															</div>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="input-group input-group-secondary input-group">
																<input type="number"
																	class="form-control form-control-round"
																	name="total_biaya_handling"
																	id="total_biaya_handling"
																	onkeyup="hitung_handling()" required
																	placeholder="Total Biaya Handling" maxlength="30" 
																	value="<?php echo $data_biaya_handling; ?>"
																	oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																<span class="input-group-addon bg-black"
																	style="width: 220px" id="span_total_biaya_handling"
																	min="0"></span>
															</div>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="input-group input-group-secondary input-group">
																<input type="number"
																	class="form-control form-control-round"
																	name="total_tagihan" id="total_tagihan"
																	onkeyup="hitung_total()" required
																	placeholder="Total Tagihan" maxlength="30"
																	value="<?php echo $data_total_tagihan; ?>"
																	oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																<span class="input-group-addon bg-black"
																	style="width: 220px" id="span_total_tagihan"
																	min="0"></span>
															</div>
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

			var harga_kg = 0;
			var harga_pickup = 0;
			var harga_ts = 0;
			var harga_fuso = 0;
			var harga_satuan = 0;

			var data_bayar_tujuan = "<?php echo $data_bayar_tujuan; ?>";
			var data_biaya_handling = "<?php echo $data_biaya_handling; ?>";
			var data_total_tagihan = "<?php echo $data_total_tagihan; ?>";

			document.getElementById('span_total_bayar_tujuan').innerHTML = get_rupiah(data_bayar_tujuan);
			document.getElementById('span_total_biaya_handling').innerHTML = get_rupiah(data_biaya_handling);
			document.getElementById('span_total_tagihan').innerHTML = get_rupiah(data_total_tagihan);

			var url="<?php echo base_url();?>";
			
			function delete_item_nota(id) {
				var x=confirm("Are you sure to delete record?")
				if (x) {
					window.location = url + "ekspedisi/delete_item_nota/" + id;
				} else {
					return false;
				}
			}


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
				console.log(kode_vendor);
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
				}
				else {
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
				}
				else {
					$('#vendor').val("");
					$('#alamat').val("");

				}

			}
			
			function get_detail_pelanggan() {
				var kode = $("#kode_vendor").val();
				if (kode != "") {
					$.ajax({
						url: "<?php echo base_url()?>index.php/pelanggan/get_detail_tujuan_by_kode_vendor",
						data: "kode=" + kode,
						success: function (data) {
							var json = data,
								obj = JSON.parse(json);
							$('#tujuan_modal').val(obj.Kode); 
							$('#alamat_tujuan_modal').val(obj.Tujuan);
							harga_satuan = obj.HargaSatuan;
							harga_kg = obj.HargaPerKg;
							harga_pickup = obj.CarterPickup;
							harga_ts = obj.CarterTS;
							harga_fuso = obj.CarterFuso;

							

							document.getElementById('harga_satuan').selectedIndex = 0;


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

	
			function get_jenis_harga(a) {
				var val = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
				if (val == 'Kg') { 
					document.getElementById('banyak').disabled = true;
					document.getElementById('berat').disabled = false;
					$('#harga_satuan').val(parseInt(harga_kg));
				}
				else if (val == 'Pickup') {
					document.getElementById('banyak').disabled = false;
					document.getElementById('berat').disabled = true;
					$('#harga_satuan').val(parseInt(harga_pickup));
				}
				else if (val == 'TS') {
					document.getElementById('banyak').disabled = false;
					document.getElementById('berat').disabled = true;
					$('#harga_satuan').val(parseInt(harga_ts));
				}
				else if (val == 'Fuso') {
					document.getElementById('banyak').disabled = false;
					document.getElementById('berat').disabled = true;
					$('#harga_satuan').val(parseInt(harga_fuso));
				}
				
				console.log(parseInt(harga_kg));
				console.log(parseInt(harga_pickup));
				console.log(harga_ts);
				console.log(harga_fuso);
			}

			function hitung_berat() {

				var berat = parseInt($("#berat").val());
				var harga_satuan = parseInt($("#harga_satuan").val());

				var hasil = berat * harga_satuan;

				$("#total_biaya_handling_modal").val(hasil);	
				$("#total_tagihan_modal").val(hasil);
				
				document.getElementById('span_total_biaya_handling_modal').innerHTML = get_rupiah(hasil);	
				document.getElementById('span_total_tagihan_modal').innerHTML  = get_rupiah(hasil);			

			}

			function hitung_banyak() {

				var banyak = parseInt($("#banyak").val());
				var harga_satuan = parseInt($("#harga_satuan").val());

				var hasil = banyak * harga_satuan;

				$("#total_biaya_handling_modal").val(hasil);
				$("#total_tagihan_modal").val(hasil);	
				
				document.getElementById('span_total_biaya_handling_modal').innerHTML = get_rupiah(hasil);	
				document.getElementById('span_total_tagihan_modal').innerHTML  = get_rupiah(hasil);							

			}


			function hitung_biaya_kirim_vendor() {

				var biaya = parseInt($("#total_biaya_kirim_modal").val());
				document.getElementById('span_total_biaya_kirim_modal').innerHTML = get_rupiah(biaya);						

			}



			function hitung_bayar_tujuan() {

				var biaya = parseInt($("#total_bayar_tujuan_modal").val());
				var handling = parseInt($("#total_biaya_handling_modal").val());

				var hasil = handling - biaya; 

				$("#total_tagihan_modal").val(hasil);	

				document.getElementById('span_total_bayar_tujuan_modal').innerHTML = get_rupiah(biaya);		
				document.getElementById('span_total_tagihan_modal').innerHTML = get_rupiah(hasil);	
			}

			function numberOnly(id) {
				// Get element by id which passed as parameter within HTML element event
				var element = document.getElementById(id);
				// This removes any other character but numbers as entered by user
				element.value = element.value.replace(/[^0-9]/gi, "");
			}

			function get_rupiah(val) {
				var numb = val;
				const format = numb.toString().split('').reverse().join('');
				const convert = format.match(/\d{1,3}/g);
				const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
				return rupiah;
			}

		</script>