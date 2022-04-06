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

									<h5>Tambah Data Pengiriman Masuk</h5> 


								</div> 


								<div class="card-block">

									<form action="<?php echo base_url('returkiriman/create'); ?>" method="post" enctype="multipart/form-data">

						

                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Vendor</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="vendor" required class="form-control form-control-round"
                                                        placeholder="Nama Vendor">
                                                </div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Manifest</label>
											<div class="col-sm-10">
												<input type="text" name="no_nota" required class="form-control form-control-round"
													placeholder="No. Manifest">
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
											<label class="col-sm-2 col-form-label">Tanggal Masuk</label>
											<div class="col-sm-10">
												<input type="date" name="tanggal" required class="form-control form-control-round"
													placeholder="Tanggal Masuk">
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Kapal</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="Nama Kapal">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">No. Polisi</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="No. Polisi">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">No. HP Sopir</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="No. HP Sopir">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">Parkir Pelindo</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="Parkir Pelindo">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">TTD Sopir</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="TTD Sopir">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label">No. STT</label>
											<div class="col-sm-10">
												<input type="text" name="keterangan" required class="form-control form-control-round"
													placeholder="No. STT">
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

    function hitung() {

            var a = parseInt($("#total_bayar_tujuan").val());
            var b = parseInt($("#total_biaya_handling").val());
            var c = parseInt($("#total_tagihan").val());

            document.getElementById('span_total_bayar_tujuan').innerHTML = get_rupiah(a);
            document.getElementById('span_total_biaya_handling').innerHTML = get_rupiah(b);
            document.getElementById('span_total_tagihan').innerHTML = get_rupiah(c);

    }

    function hitung_handling() {

        var a = parseInt($("#total_bayar_tujuan").val());
        var b = parseInt($("#total_biaya_handling").val());
        var c = parseInt($("#total_tagihan").val());

        document.getElementById('span_total_bayar_tujuan').innerHTML = get_rupiah(a);
        document.getElementById('span_total_biaya_handling').innerHTML = get_rupiah(b);
        document.getElementById('span_total_tagihan').innerHTML = get_rupiah(c);

    }

    function hitung_total() {

        var a = parseInt($("#total_bayar_tujuan").val());
        var b = parseInt($("#total_biaya_handling").val());
        var c = parseInt($("#total_tagihan").val());

        document.getElementById('span_total_bayar_tujuan').innerHTML = get_rupiah(a);
        document.getElementById('span_total_biaya_handling').innerHTML = get_rupiah(b);
        document.getElementById('span_total_tagihan').innerHTML = get_rupiah(c);

    }

    
    function numberOnly(id) {
        // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
        // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
    }

</script>