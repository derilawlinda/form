<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Data Pekerja PDC</title>
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
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <!--<div class="card shadow-lg border-0 rounded-lg mt-5">-->
                                <!--    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="assets/img/avatar.png" height="50"></h3></div>-->
                                    <!--<div class="card-body">-->
                                        <?php if ($this->session->flashdata('success')): ?>
                                		<div class="alert alert-success" role="alert">
                                		    <?php echo $this->session->flashdata('success'); ?>
                        				</div>
                        				<?php else: ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group"><label for="email_kantor" class="mb-1"><b style="color:#d00">Masukkan Email Perusahaan atau No. Pekerja untuk mencari data.</b></label>
                                                <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="email" placeholder="contoh@pertamina.com atau NOPEK" required>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
            								<div class="form-group">
                								<label for="image" class="mb-1"><b>Upload Scan/Photo KTP</b> <small>(Maksimal 1 MB JPG/PNG)</small></label>
                								<input class="form-control-file" type="file" name="image" />
                							</div>
                                            <!--<div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>User ID Absen</b></label><input class="form-control py-4" id="userid" name="userid" type="text" placeholder="User ID Absen" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Mesin Absen</b></label><input class="form-control py-4" id="fingerprintid" name="fingerprintid" type="text" value="<?php echo $this->session->userdata('sn'); ?>" /></div>
                                                </div>
                                            </div>-->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Pekerja</b></label><input class="form-control py-4" id="no_pekerja" name="no_pekerja" type="text" placeholder="Nomor Pekerja" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. PKWT</b></label><input class="form-control py-4" id="no_pkwt" name="no_pkwt" type="text" placeholder="No. PKWT" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tanggal Masuk</b></label><input class="form-control py-4" id="tgl_masuk" name="tgl_masuk" type="text" placeholder="Format: YYYY-MM-DD" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Departemen</b></label><input class="form-control py-4" id="departemen" name="departemen" type="text" placeholder="Departemen" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Jabatan</b></label><input class="form-control py-4" id="jabatan" name="jabatan" type="text" placeholder="Jabatan" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Project</b></label><input class="form-control py-4" id="project" name="project" type="text" placeholder="Project" /></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="mb-1"><b>Nama</b></label><input class="form-control py-4" id="nama_pekerja" name="nama_pekerja" type="text" placeholder="Nama Lengkap" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tempat Lahir</b></label><input class="form-control py-4" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Tanggal Lahir</b></label><input class="form-control py-4" id="tgl_lahir" name="tgl_lahir" type="text" placeholder="Format: YYYY-MM-DD" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Alamat</b></label><textarea class="form-control py-4" id="alamat" name="alamat" placeholder="Alamat Lengkap" /></textarea></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Provinsi</b></label><input class="form-control py-4" id="provinsi" name="provinsi" type="text" placeholder="Provinsi" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Kota / Kabupaten</b></label><input class="form-control py-4" id="kota" name="kota" type="text" placeholder="Kota / Kabupaten" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Telepon</b></label><input class="form-control py-4" id="telepon" name="telepon" type="text" placeholder="Nomor Telepon" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Handphone</b></label><input class="form-control py-4" id="handphone" name="handphone" type="text" placeholder="Nomor Handphone" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Email Pribadi</b></label><input class="form-control py-4" id="email_pribadi" name="email_pribadi" type="email" placeholder="Email Pribadi" /></div>
                                            <div class="form-group"><label class="mb-1"><b>No. KTP</b></label><input class="form-control py-4" id="no_ktp" name="no_ktp" type="text" placeholder="Nomor KTP" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Area</b></label><input class="form-control py-4" id="area" name="area" type="text" placeholder="Area" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>No. Kontrak Project</b></label><input class="form-control py-4" id="no_kontrak_project" name="no_kontrak_project" type="text" placeholder="No. Kontrak Project" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Project Nick Name</b></label><input class="form-control py-4" id="project_nickname" name="project_nickname" type="text" placeholder="Project Nick Name" /></div>
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Lokasi Kerja</b></label><input class="form-control py-4" id="lokasi_kerja" name="lokasi_kerja" type="text" placeholder="Lokasi Kerja" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Fungsi</b></label><input class="form-control py-4" id="fungsi" name="fungsi" type="text" placeholder="Fungsi" /></div>
                                            <div class="form-group"><label class="mb-1"><b>Department</b></label><input class="form-control py-4" id="department" name="department" type="text" placeholder="Department" /></div>
                                            <div class="form-group"><label class="mb-1"><b>ID Pos</b></label><input class="form-control py-4" id="id_pos" name="id_pos" type="text" placeholder="ID Pos" /></div>
                                            <div class="form-group"><label class="mb-1"><b>PT PDC (SK-028A/PDC1000/2019-S0)</b></label><input class="form-control py-4" id="pt_pdc_sk_028a_pdc1000_2019_s0" name="pt_pdc_sk_028a_pdc1000_2019_s0" type="text" placeholder="PT PDC (SK-028A/PDC1000/2019-S0)" /></div>
                                            
                                            <!--<div class="form-row">-->
                                            <!--    <div class="col-md-6">-->
                                            <!--        <div class="form-group"><label class="small mb-1">Password</b></label><input class="form-control py-4" id="no_pekerja" type="text" placeholder="Nomor Pekerja" /></div>-->
                                            <!--    </div>-->
                                            <!--    <div class="col-md-6">-->
                                            <!--        <div class="form-group"><label class="mb-1"><b>Email</b></label><input class="form-control py-4" id="email_kantor" type="email" placeholder="Enter email address" /></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Konfirmasi Data</button></div>
                                        </form>
                        				<?php endif; ?>
                                    <!--</div>-->
                                    <div class="card-footer text-center">
                                        <div class="small">Data yang telah di konfirmasi akan di review oleh team HR & GA.</div>
                                    </div>
                                <!--</div>-->
                            </div>
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
	
		<script type='text/javascript'>
 
		  $(document).ready(function(){
		  
			 $( "#email_kantor" ).autocomplete({
			  source: function( request, response ) {
			   // Fetch data
			   $.ajax({
				url: "<?=base_url()?>index.php/User/userList",
				type: 'post',
				dataType: "json",
				cache : false,
				data: {
				 search: request.term
				},
				success: function( data ) {
				 response( data );
				}
			   });
			  },
			  select: function (event, ui) {
			   // Set selection
			   $('#no_pekerja').val(ui.item.value0);
			   $('#nama_pekerja').val(ui.item.value1); // save selected id to input
			   $('#tgl_masuk').val(ui.item.value2);
			   $('#tempat_lahir').val(ui.item.value3);
			   $('#tgl_lahir').val(ui.item.value4);
			   $('#departemen').val(ui.item.value5);
			   $('#jabatan').val(ui.item.value6);
			   $('#project').val(ui.item.value7);
			   $('#no_pkwt').val(ui.item.value8);
			   $('#area').val(ui.item.value9);
			   $('#alamat').val(ui.item.value10);
			   $('#provinsi').val(ui.item.value11);
			   $('#kota').val(ui.item.value12);
			   $('#telepon').val(ui.item.value13);
			   $('#handphone').val(ui.item.value14);
			   $('#email_pribadi').val(ui.item.value15);
			   $('#no_ktp').val(ui.item.value16);
			   $('#no_kontrak_project').val(ui.item.value17);
			   $('#project_nickname').val(ui.item.value18);
			   $('#lokasi_kerja').val(ui.item.value19);
			   $('#fungsi').val(ui.item.value20);
			   $('#department').val(ui.item.value21);
			   $('#id_pos').val(ui.item.value22);
			   $('#pt_pdc_sk_028a_pdc1000_2019_s0').val(ui.item.value23);
			   $('#userid').val(ui.item.value24);
			   $('#email_kantor').val(ui.item.label);
			   $('#no_pekerja').val(ui.item.label2);// display the selected text
			   return false;
			  }
			 });
		
		  });
		</script>        

	
		<?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>