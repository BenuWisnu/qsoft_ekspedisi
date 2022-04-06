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

									<h5>Pendaftaran Admin</h5>
									<span>Registrasi pembuatan akun admin, isikan data pendaftar dengan baik dan benar.</span>


								</div>


								<div class="card-block">

									<form action="<?php echo base_url('pengguna/update/'.$data['id']); ?>" method="post" enctype="multipart/form-data">

						
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Nama Lengkap</label>
											<div class="col-sm-9">
												<input type="text" name="nama_lengkap" required class="form-control form-control-round"
													placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
											<div class="col-sm-9">
												<select name="jenis_kelamin" class="form-control-round" required>
													<option value="<?php echo $data['jenis_kelamin'] ?>"><?php if($data['jenis_kelamin'] == "L") { echo "Laki-laki";} else { echo "Perempuan"; } ?></option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Alamat</label>
											<div class="col-sm-9">
												<input type="text" name="alamat" required class="form-control form-control-round"
													placeholder="Alamat" value="<?php echo $data['alamat'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Photo</label>
											<div class="col-sm-9">
												<input type="file" name="avatar" id="avatar" class="form-control form-control-round">
											</div>
										</div>
                                        
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Level</label>
											<div class="col-sm-9">
												<select name="level" class="form-control-round" required>
													<option value="<?php echo $data['level'] ?>"><?= $data['level']; ?></option>
													<option value="ADMIN">Admin</option>
													<option value="SUPERADMIN">Superadmin</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Username</label>
											<div class="col-sm-9">
												<input type="text" name="username" required class="form-control form-control-round"
													placeholder="Username" value="<?php echo $data['username'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label">Password</label>
											<div class="col-sm-9">
												<input type="password" name="password" required class="form-control form-control-round"
													placeholder="Password" value="<?php echo $data['password'] ?>">
											</div>
										</div>
										<div class="j-footer">
											<button type="submit" class="btn btn-success btn-round"><i
													class="icofont icofont-plus"></i>Simpan Data</button>
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
