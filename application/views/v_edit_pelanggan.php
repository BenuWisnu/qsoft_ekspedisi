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

									<h5>Edit Data Pelanggan</h5>  


								</div> 


								<div class="card-block">

									<form action="<?php echo base_url('pelanggan/update/'.$data['KodePelanggan']); ?>" method="post" enctype="multipart/form-data">

						
                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">Kode Pelanggan</label>
											<div class="col-sm-10">
												<input type="text" name="kode_pelanggan" id="kode_pelanggan" required class="form-control form-control-round"
													placeholder="Kode Pelanggan" readonly value="<?php echo $data['KodePelanggan']; ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Pelanggan</label>
											<div class="col-sm-10">
												<input type="text" name="nama_pelanggan" required class="form-control form-control-round"
													placeholder="Nama Pelanggan" value="<?php echo $data['NamaPelanggan']; ?>">
											</div>
										</div>

								

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Vendor</label>
											<div class="col-sm-10">
												<input type="text" name="vendor" id="vendor" required class="form-control form-control-round"
													placeholder="Vendor" onkeyup="get_vendor()"
													value="<?= get_kode_table("vendor", "NamaVendor", "KodeVendor", $data['KodeVendor']); ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Kota</label>
											<div class="col-sm-10">
												<input type="text" name="kota" required class="form-control form-control-round"
													placeholder="Kota" value="<?php echo $data['Kota']; ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Alamat</label>
											<div class="col-sm-10">
												<input type="text" name="alamat" required class="form-control form-control-round"
													placeholder="Alamat" value="<?php echo $data['Alamat']; ?>">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Telpon</label>
											<div class="col-sm-10">
												<input type="text" name="no_telpon"  class="form-control form-control-round"
													placeholder="No. Telpon" value="<?php echo $data['NoTelpon']; ?>">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Jenis Barang</label>
											<div class="col-sm-10">
												<input type="text" name="jenis_barang"  class="form-control form-control-round"
													placeholder="Jenis Barang" value="<?php echo $data['JenisBarang']; ?>">
											</div>
										</div>
                                        
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i class="feather icon-plus"></i>Simpan Data</button>
											<a href="<?= base_url('pelanggan'); ?>" class="btn btn-danger btn-round"><i class="feather icon-x"></i>Batalkan</a>
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
		<div id="styleSelector">

		</div>
	</div>
</div>

<script type="text/javascript">


    function get_cabang() {
		//autocomplete
		$("#cabang").autocomplete({
			source: "<?php echo base_url() ?>index.php/manifest/get_cabang",  
			minLength: 1
		});
	}

    function get_rupiah(val) {
			var numb = val;
			const format = numb.toString().split('').reverse().join('');
			const convert = format.match(/\d{1,3}/g);
			const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
			return rupiah;
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