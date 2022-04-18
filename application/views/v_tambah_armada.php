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

									<h5>Tambah Data Sopir</h5> 


								</div> 


								<div class="card-block">

									<form action="<?php echo base_url('armada/create'); ?>" method="post" enctype="multipart/form-data">

						
                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Kendaraan</label>
											<div class="col-sm-10">
												<input type="text" name="no_kendaraan" id="no_kendaraan" required class="form-control form-control-round"
													placeholder="No. Kendaraan" value="">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Jenis</label>
											<div class="col-sm-10">
												<input type="text" name="jenis" required class="form-control form-control-round"
													placeholder="Jenis">
											</div>
										</div>

				

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Merek</label>
											<div class="col-sm-10">
												<input type="text" name="merek" required class="form-control form-control-round"
													placeholder="merek">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Tahun Pembuatan</label>
											<div class="col-sm-10">
												<input type="number" name="tahun_pembuatan" required class="form-control form-control-round"
													placeholder="Tahun Pembuatan">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Tanggal Pembelian</label>
											<div class="col-sm-10">
												<input type="date" name="tanggal_pembelian" required class="form-control form-control-round"
													placeholder="">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Sopir</label>
											<div class="col-sm-10">
												<input type="text" name="sopir" id="sopir" required class="form-control form-control-round"
													placeholder="Sopir" onkeyup="get_sopir()">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Hp Sopir</label>
											<div class="col-sm-10">
												<input type="text" name="hp_sopir" id="hp_sopir" required class="form-control form-control-round"
													placeholder="Hp Sopir">
											</div>
										</div>
                                        
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i class="feather icon-plus"></i>Simpan Data</button>
											<a href="<?= base_url('sopir'); ?>" class="btn btn-danger btn-round"><i class="feather icon-x"></i>Batalkan</a>
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


function get_sopir() {
				//autocomplete
				$("#sopir").autocomplete({
					source: "<?php echo base_url() ?>index.php/vendorekspedisi/get_sopir",
					minLength: 1
				});

				get_detail_sopir();
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
							$('#hp_sopir').val(obj.NoTelpon);

						}
					});
				} else {
					$('#hp_sopir').val("");
				}

			}
    
    function numberOnly(id) {
        // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
        // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
    }

</script>