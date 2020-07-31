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

                                        <?php if($this->session->userdata('role') == 'crew'): ?>
                                            <div class="form-group"><label for="email_kantor" class="mb-1"><b style="color:#000">Email Perusahaan</b></label>
                                                <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="email" value="<?php echo isset($temp_form->email_kantor) ? $temp_form->email_kantor : null; ?>" readonly>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Absen Awal</b></label><input class="form-control py-4" id="startdate" name="startdate" type="date" placeholder="YYYY-MM-DD" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Absen Akhir</b></label><input class="form-control py-4" id="enddate" name="enddate" type="date" placeholder="YYYY-MM-DD" /></div>
                                                </div>
                                            </div><hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nama</b></label><input class="form-control py-4" id="nama_pekerja" name="nama_pekerja" type="text" value="<?php echo isset($temp_form->nama_pekerja) ? $temp_form->nama_pekerja : null; ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Pegawai</b></label><input class="form-control py-4" id="no_pekerja" name="no_pekerja" type="text" value="<?php echo isset($temp_form->no_pekerja) ? $temp_form->no_pekerja : null; ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Fungsi</b></label><input class="form-control py-4" id="fungsi" name="fungsi" type="text" value="<?php echo isset($temp_form->fungsi) ? $temp_form->fungsi : null; ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Lokasi Kerja</b></label><input class="form-control py-4" id="lokasi_kerja" name="lokasi_kerja" type="text" value="<?php echo isset($temp_form->lokasi_kerja) ? $temp_form->lokasi_kerja : null; ?>" /></div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group"><label for="email_kantor" class="mb-1"><b style="color:#d00">Masukkan Email Perusahaan atau No. Pekerja untuk mencari data.</b></label>
                                                <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="email" placeholder="contoh@pertamina.com atau Nopeg" required>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Absen Awal</b></label><input class="form-control py-4" id="startdate" name="startdate" type="date" placeholder="YYYY-MM-DD" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Absen Akhir</b></label><input class="form-control py-4" id="enddate" name="enddate" type="date" placeholder="YYYY-MM-DD" /></div>
                                                </div>
                                            </div><hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nama</b></label><input class="form-control py-4" id="nama_pekerja" name="nama_pekerja" type="text" placeholder="Nama Lengkap" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Pegawai</b></label><input class="form-control py-4" id="no_pekerja" name="no_pekerja" type="text" placeholder="Nomor Pegawai" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Fungsi</b></label><input class="form-control py-4" id="fungsi" name="fungsi" type="text" placeholder="Fungsi" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Lokasi Kerja</b></label><input class="form-control py-4" id="lokasi_kerja" name="lokasi_kerja" type="text" placeholder="Lokasi Kerja" /></div>
                                                </div>
                                            </div>
                        				<?php endif; ?>
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Konfirmasi Kehadiran</button></div>
                                        </form>
                        				<?php endif; ?>
                                    <!--</div>-->
                                    <div class="card-footer text-center">
                                        <div class="small">Data yang telah di konfirmasi akan di review oleh Admin Lokasi & User.</div>
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