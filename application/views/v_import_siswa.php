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

									<h5>Import Data Pembeli</h5> 
									<span>Penyimpanan data pembeli secara cepat dan massal.</span>


								</div>


								<div class="card-block">

									<form action="<?php echo base_url('siswa/import_excel'); ?>" method="post" enctype="multipart/form-data">

									
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">File Excel (.xls, .xlsx)</label>
											<div class="col-sm-10">
												<input name="file" id="file" type="file" class="form-control form-control-round" required></input>
											</div>
										</div>
										
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i
													class="feather icon-plus"></i>Import Data</button>
											<a href="<?= site_url('assets/files/template_import.xlsx'); ?>" class="btn btn-warning btn-round"><i
													class="feather icon-file"></i>Download Template Import</a>
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
