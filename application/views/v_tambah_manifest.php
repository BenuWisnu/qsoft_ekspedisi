
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

									<h5>Tambah Data Manifest</h5> 


								</div> 

								<div class="card-block">
									<p>Silahkan tambahkan <code> nota </code> terlebih dahulu.</p>

									<!-- Modal static-->
									<button type="button" class="btn btn-success btn-round waves-effect"
										data-toggle="modal" data-target="#default-Modal"><i
											class="feather icon-plus"></i> Tambahkan Nota</button>
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

															<form action="<?php echo base_url('invoice/create'); ?>"
																method="post" enctype="multipart/form-data">


																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">No.
																		Nota</label>
																	<div class="col-sm-4">
																		<input type="text" name="no_nota"
																			id="no_nota" required
																			class="form-control form-control-round"
																			placeholder="Auto Generate.."
																			value="<?= kode_otomatis("ekspedisi", "NoNota", "EKS".$this->session->userdata('Cabang')); ?>"
																			>
																	</div>
																	<div class="col-sm-4">
																		<input type="text" name="ttb" required
																			class="form-control form-control-round"
																			placeholder="TTB/STT">
																	</div>
																</div>


																<div class="form-group row">
																	<label
																		class="col-sm-4 col-form-label">Pelanggan/Penerima</label>
																	<div class="col-sm-8">
																		<input type="text" name="keterangan" required
																			class="form-control form-control-round"
																			placeholder="Pelanggan/Penerima">
																	</div>
																</div>

																<div class="form-group row">
																	<label
																		class="col-sm-4 col-form-label">Tujuan</label>
																	<div class="col-sm-3">
																		<input type="text" name="tujuan" required
																			class="form-control form-control-round"
																			placeholder="Tujuan">
																	</div>
																	<div class="col-sm-5">
																		<input type="text" name="alamat_tujuan" required
																			class="form-control form-control-round"
																			placeholder="Alamat Tujuan">
																	</div>
																</div>


																<div class="form-group row">
																	<label
																		class="col-sm-4 col-form-label">Jenis Barang</label>
																	<div class="col-sm-3">
																		<input type="text" name="jenis_barang" required
																			class="form-control form-control-round"
																			placeholder="Jenis Barang">
																	</div>
																	<div class="col-sm-5">
																		<input type="text" name="keterangan_barang" required
																			class="form-control form-control-round"
																			placeholder="Keterangan Barang">
																	</div>
																</div>



																<div class="form-group row">
																	<label
																		class="col-sm-4 col-form-label">Jenis Harga</label>
																	<div class="col-sm-8">
																		<input type="text" name="jenis_harga" required
																			class="form-control form-control-round"
																			placeholder="Jenis Harga">
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Colly</label>
																	<div class="col-sm-3">
																		<div
																			class="input-group input-group-secondary input-group">
																			<input type="number"
																				class="form-control form-control-round"
																				name="colly"
																				id="colly" onkeyup="hitung()"
																				required placeholder="Colly"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																	
																		</div>
																	</div>
																	<div class="col-sm-5">
																		<div
																			class="input-group input-group-secondary input-group">
																			<span class="input-group-addon bg-black"
																				style="width: 100px"
																				id="span_total_bayar_tujuan" min="0">Berat</span>
																			<input type="number"
																				class="form-control form-control-round"
																				name="berat"
																				id="berat" onkeyup="hitung()"
																				required placeholder="Berat"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																			
																		</div>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Biaya Handling
																		</label>
																	<div class="col-sm-8">
																		<div
																			class="input-group input-group-secondary input-group">
																			<input type="number"
																				class="form-control form-control-round"
																				name="total_biaya_handling"
																				id="total_biaya_handling" onkeyup="hitung()"
																				required placeholder="Total Biaya Handling"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																			<span class="input-group-addon bg-black"
																				style="width: 220px"
																				id="span_total_biaya_handling" min="0"></span>
																		</div>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Biaya Kirim (VENDOR)
																		</label>
																	<div class="col-sm-8">
																		<div
																			class="input-group input-group-secondary input-group">
																			<input type="number"
																				class="form-control form-control-round"
																				name="total_bayar_kirim"
																				id="total_bayar_kirim" onkeyup="hitung()"
																				required placeholder="Total Biaya Kirim"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																			<span class="input-group-addon bg-black"
																				style="width: 220px"
																				id="span_total_biaya_kirim" min="0"></span>
																		</div>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Bayar Tujuan
																		</label>
																	<div class="col-sm-8">
																		<div
																			class="input-group input-group-secondary input-group">
																			<input type="number"
																				class="form-control form-control-round"
																				name="total_bayar_tujuan"
																				id="total_bayar_tujuan" onkeyup="hitung()"
																				required placeholder="Total Bayar Tujuan"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																			<span class="input-group-addon bg-black"
																				style="width: 220px"
																				id="span_total_bayar_tujuan" min="0"></span>
																		</div>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">
																		Tagihan</label>
																	<div class="col-sm-8">
																		<div
																			class="input-group input-group-secondary input-group">
																			<input type="number"
																				class="form-control form-control-round"
																				name="total_tagihan"
																				id="total_tagihan" onkeyup="hitung()"
																				required placeholder="Total Tagihan"
																				maxlength="30"
																				oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
																			<span class="input-group-addon bg-black"
																				style="width: 220px"
																				id="span_total_tagihan" min="0"></span>
																		</div>
																	</div>
																</div>

									
																<div class="form-group row">
																	<label
																		class="col-sm-4 col-form-label">Keterangan</label>
																	<div class="col-sm-8">
																		<input type="text" name="keterangan" required
																			class="form-control form-control-round"
																			placeholder="Keterangan">
																	</div>
																</div>



													

														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default btn-round waves-effect "
															data-dismiss="modal">Close</button>
														<button type="submit"
															class="btn btn-success btn-round waves-effect waves-light "><i
																			class="feather icon-plus"></i>Simpan Perubahan</button>
													</div>
															</form>
												</div>
											</div>
										</div>
								</div>

								<div class="card-block">

									<form action="<?php echo base_url('manifest/create'); ?>" method="post" enctype="multipart/form-data">

						
                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">Cabang</label>
											<div class="col-sm-10">
												<input type="text" name="cabang" id="cabang" required class="form-control form-control-round"
													placeholder="Cabang" onkeyup="get_cabang()">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Tanggal</label>
											<div class="col-sm-10">
												<input type="date" name="tanggal" required class="form-control form-control-round"
													placeholder="Tanggal">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Nota</label>
											<div class="col-sm-10">
												<input type="text" name="no_nota" required class="form-control form-control-round"
													placeholder="No. Nota">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Invoice</label>
											<div class="col-sm-10">
												<input type="text" name="no_invoice" id="no_invoice" required class="form-control form-control-round"
													placeholder="No. Invoice">
											</div>
										</div>
                                        
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Tanggal SJ</label>
											<div class="col-sm-10">
												<input type="date" name="tanggal_sj" required class="form-control form-control-round"
													placeholder="Tanggal SJ">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Vendor</label>
											<div class="col-sm-10">
												<input type="text" name="vendor" id="vendor" class="form-control form-control-round"
													placeholder="Nama Vendor" onkeyup="get_vendor()">
											</div>
										</div>

                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Total Bayar Tujuan</label>
                                                <div class="col-sm-10">
                                                <div class="input-group input-group-secondary input-group">
                                                    <input type="number" class="form-control form-control-round" name="total_bayar_tujuan" id="total_bayar_tujuan" onkeyup="hitung()" required placeholder="Total Bayar Tujuan" maxlength="30" oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    <span class="input-group-addon bg-black" style="width: 220px" id="span_total_bayar_tujuan" min="0"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total Biaya Handling</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-secondary input-group">
                                                    <input type="number" class="form-control form-control-round" name="total_biaya_handling" id="total_biaya_handling" onkeyup="hitung_handling()" required placeholder="Total Biaya Handling" maxlength="30" oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    <span class="input-group-addon bg-black" style="width: 220px" id="span_total_biaya_handling" min="0"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total Tagihan</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-secondary input-group">
                                                    <input type="number" class="form-control form-control-round" name="total_tagihan" id="total_tagihan" onkeyup="hitung_total()" required placeholder="Total Tagihan" maxlength="30" oninput="numberOnly(this.id);javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    <span class="input-group-addon bg-black" style="width: 220px" id="span_total_tagihan" min="0"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i class="feather icon-plus"></i>Simpan Data</button>
											<a href="<?= base_url('manifest'); ?>" class="btn btn-danger btn-round"><i class="feather icon-x"></i>Batalkan</a>
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

<script type="text/javascript">



	function get_cabang() {
		//autocomplete
		$("#cabang").autocomplete({
			source: "<?php echo base_url() ?>index.php/manifest/get_cabang",
			minLength: 1
		});

		//get_detail_autofill();
	}


	function get_vendor() {
		//autocomplete
		$("#vendor").autocomplete({
			source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_vendor",
			minLength: 1
		});

		//get_detail_autofill();
	}

	

</script>

