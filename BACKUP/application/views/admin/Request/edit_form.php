<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Koreksi Data</title>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php $this->load->view("admin/_layouts/navbar.php") ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("admin/_layouts/sidebar.php") ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                <br>
				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/request/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
                <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<br><a href="<?php echo site_url('admin/Request/delete/'.$temp_form->no_pekerja); ?>">Klik disini</a> untuk menghapus data yang sudah di koreksi.
				</div>
				<?php else: ?>

						<form action="" method="post">

							<input type="hidden" name="id" value="<?php echo $temp_form->id?>" />
                                                    <div class="form-group"><label class="mb-1"><b>Upload Scan/Photo KTP</b> <small>(Maksimal 1 MB JPG/PNG)</small></label><br>
                                                        <img src="<?php echo base_url('upload/foto/'.$temp_form->image) ?>" width="200" style="margin:10px"/>
                                                        <input class="form-control-file" type="file" name="image" />
                                                        <input type="hidden" name="old_image" value="<?php echo $temp_form->image; ?>">
								                    </div>
                                            <div class="form-group"><label for="email_kantor" class="mb-1"><b>Email Kantor</b></label>
                                                <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="email" value="<?php echo $temp_form->email_kantor ?>" required>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
            								<div class="form-row">
												<div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>User ID Absen</b></label><input class="form-control py-4" id="userid" name="userid" type="text" value="<?php echo $temp_form->userid ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Mesin Absen</b></label><input class="form-control py-4" id="fingerprintid" name="fingerprintid" type="text" value="<?php echo $temp_form->fingerprintid ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Pekerja</b></label><input class="form-control py-4" id="no_pekerja" name="no_pekerja" type="text" value="<?php echo $temp_form->no_pekerja ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. PKWT</b></label><input class="form-control py-4" id="no_pkwt" name="no_pkwt" type="text" value="<?php echo $temp_form->no_pkwt ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tanggal Masuk</b></label><input class="form-control py-4" id="tgl_masuk" name="tgl_masuk" type="text" value="<?php echo $temp_form->tgl_masuk ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Departemen</b></label><input class="form-control py-4" id="departemen" name="departemen" type="text" value="<?php echo $temp_form->departemen ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Jabatan</b></label><input class="form-control py-4" id="jabatan" name="jabatan" type="text" value="<?php echo $temp_form->jabatan ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Project</b></label><input class="form-control py-4" id="project" name="project" type="text" value="<?php echo $temp_form->project ?>" /></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="mb-1"><b>Nama</b></label><input class="form-control py-4" id="nama_pekerja" name="nama_pekerja" type="text" value="<?php echo $temp_form->nama_pekerja ?>" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tempat Lahir</b></label><input class="form-control py-4" id="tempat_lahir" name="tempat_lahir" type="text" value="<?php echo $temp_form->tempat_lahir ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tanggal Lahir</b></label><input class="form-control py-4" id="tgl_lahir" name="tgl_lahir" type="text" value="<?php echo $temp_form->tgl_lahir ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Alamat</b></label><textarea class="form-control py-4" id="alamat" name="alamat" /><?php echo $temp_form->alamat ?></textarea></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Provinsi</b></label><input class="form-control py-4" id="provinsi" name="provinsi" type="text" value="<?php echo $temp_form->provinsi ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Kota / Kabupaten</b></label><input class="form-control py-4" id="kota" name="kota" type="text" value="<?php echo $temp_form->kota ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Telepon</b></label><input class="form-control py-4" id="telepon" name="telepon" type="text" value="<?php echo $temp_form->telepon ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Handphone</b></label><input class="form-control py-4" id="handphone" name="handphone" type="text" value="<?php echo $temp_form->handphone ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Email Pribadi</b></label><input class="form-control py-4" id="email_pribadi" name="email_pribadi" type="email" value="<?php echo $temp_form->email_pribadi ?>" /></div>
                                            <div class="form-group"><label class="mb-1"><b>No. KTP</b></label><input class="form-control py-4" id="no_ktp" name="no_ktp" type="number" value="<?php echo $temp_form->no_ktp ?>" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Area</b></label><input class="form-control py-4" id="area" name="area" type="text" value="<?php echo $temp_form->area ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Kontrak Project</b></label><input class="form-control py-4" id="no_kontrak_project" name="no_kontrak_project" type="text" value="<?php echo $temp_form->no_kontrak_project ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Project Nick Name</b></label><input class="form-control py-4" id="project_nickname" name="project_nickname" type="text" value="<?php echo $temp_form->project_nickname ?>" /></div>
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Lokasi Kerja</b></label><input class="form-control py-4" id="lokasi_kerja" name="lokasi_kerja" type="text" value="<?php echo $temp_form->lokasi_kerja ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Fungsi</b></label><input class="form-control py-4" id="fungsi" name="fungsi" type="text" value="<?php echo $temp_form->fungsi ?>" /></div>
                                            <div class="form-group"><label class="mb-1"><b>Department</b></label><input class="form-control py-4" id="department" name="department" type="text" value="<?php echo $temp_form->department ?>" /></div>
                                            <div class="form-group"><label class="mb-1"><b>ID Pos</b></label><input class="form-control py-4" id="id_pos" name="id_pos" type="text" value="<?php echo $temp_form->id_pos ?>" /></div>
                                            <div class="form-group"><label class="mb-1"><b>PT PDC (SK-028A/PDC1000/2019-S0)</b></label><input class="form-control py-4" id="pt_pdc_sk_028a_pdc1000_2019_s0" name="pt_pdc_sk_028a_pdc1000_2019_s0" type="text" value="<?php echo $temp_form->pt_pdc_sk_028a_pdc1000_2019_s0 ?>" /></div>
                                            
                                            <!--<div class="form-row">-->
                                            <!--    <div class="col-md-6">-->
                                            <!--        <div class="form-group"><label class="small mb-1">Password</b></label><input class="form-control py-4" id="no_pekerja" type="text" placeholder="Nomor Pekerja" /></div>-->
                                            <!--    </div>-->
                                            <!--    <div class="col-md-6">-->
                                            <!--        <div class="form-group"><label class="mb-1"><b>Email</b></label><input class="form-control py-4" id="email_kantor" type="email" placeholder="Enter email address" /></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-success btn-block">Koreksi Data</button></div>
						</form>
                <?php endif; ?>
					</div>
			</div>
			<!-- /.container-fluid -->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view("admin/_layouts/footer.php") ?>
                </footer>
            </div>
        </div>
        <?php $this->load->view("admin/_layouts/js.php") ?>
        
        <?php $this->load->view("admin/_layouts/modal.php") ?>
        
    </body>
</html>