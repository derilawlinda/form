<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sesuai dengan surat edaran Direktur Utama PT PDC No. E-002/PDC000/2020-S8 tentang pemberlakuan Work From Home dalam rangka pencegahan penyebaran COVID-19. Guna mengetahui dan memantau kondisi kesehatan pekerja PT PDC, maka kepada seluruh pekerja dimohon untuk mengisi Formulir Pemantauan Kesehatan dan Formulir Survey Kondisi Kesehatan." />
        <meta name="author" content="PDC" />
        <title>Survey Kondisi Kesehatan Pekerja</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="icon" href="assets/img/P152.png" type="image/png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="assets/img/avatar.png" height="50"></h3>
                                    <hr>
                                    <p style="font-size:12px;font-weight:bold;text-align:justify">Sesuai dengan surat edaran Direktur Utama PT PDC No. E-002/PDC000/2020-S8 tentang pemberlakuan Work From Home dalam rangka pencegahan penyebaran COVID-19.
                                        <br>Guna mengetahui dan memantau kondisi kesehatan pekerja PT PDC, maka kepada seluruh pekerja dimohon untuk mengisi Formulir Pemantauan Kesehatan dan Formulir Survey Kondisi Kesehatan.</p>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($this->session->flashdata('ulang')): ?>
                                		<div class="alert alert-danger" role="alert">
                                		    <?php echo $this->session->flashdata('ulang'); ?>
                        				</div>
                                        <?php elseif ($this->session->flashdata('success')): ?>
                                		<div class="alert alert-success" role="alert">
                                		    <?php echo $this->session->flashdata('success'); ?>
                        				</div>
                                        <?php elseif ($this->session->flashdata('fail')): ?>
                        				<script>
                                             window.onload = function(){
                                                 window.open("https://dev.pertamina-pdc.network/downloads/Formulir A1 deteksi dini covid-19 PT. PDC_Rev01.xls", "_blank"); // will open new tab on window.onload
                                            }
                        				</script>
                        				<div class="alert alert-success" role="alert">
                                		    <?php echo $this->session->flashdata('fail'); ?>
                        				</div>
                        				<?php else: ?>
                                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <div class="form-group"><label for="email_kantor" class="mb-1"><b style="color:#d00">Ketik Email Perusahaan atau NIP untuk mencari data.</b></label>
                                                <input class="form-control py-4 <?php echo form_error('email_kantor') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="email" placeholder="contoh@pertamina-pdc.com atau NIP" required>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Pekerja</b></label><input class="form-control py-4" id="no_pekerja" name="no_pekerja" type="text" placeholder="Nomor Pekerja"  required autofocus></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Departemen/Fungsi</b></label><input class="form-control py-4" id="fungsi" name="fungsi" type="text" placeholder="Departemen/Fungsi" required autofocus></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Jabatan</b></label><input class="form-control py-4" id="jabatan" name="jabatan" type="text" placeholder="Jabatan"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Project/Lokasi Kerja</b></label><input class="form-control py-4" id="lokasi_kerja" name="lokasi_kerja" type="text" placeholder="Project/Lokasi Kerja" required autofocus></div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="mb-1"><b>Nama</b></label><input class="form-control py-4" id="nama_pekerja" name="nama_pekerja" type="text" placeholder="Nama Lengkap" required autofocus></div>
                                            <hr>
                                            <div class="form-group"><label class="mb-1"><b>1. Lokasi Saat Ini</b></label><input class="form-control py-4" id="lokasi_ini" name="lokasi_ini" type="text" placeholder="Sebutkan lokasi Anda. Contoh: Gambir, Jakarta Pusat" required autofocus></div>
                                            <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>2. Perjalanan ke Kantor/Lokasi Kerja menggunakan</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="transport1" name="transport" class="custom-control-input" value="Kendaraan Pribadi" required autofocus>
                                                          <label class="custom-control-label" for="transport1">Kendaraan Pribadi</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="transport2" name="transport" class="custom-control-input" value="Transportasi Umum" required autofocus>
                                                          <label class="custom-control-label" for="transport2">Transportasi Umum</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="transport3" name="transport" class="custom-control-input" value="Kendaraan Perusahaan" required autofocus>
                                                          <label class="custom-control-label" for="transport3">Kendaraan Perusahaan</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>3. Suhu Tubuh (Celcius)</b></label><input class="form-control py-4" id="suhu" name="suhu" type="text" placeholder="Isi dengan suhu tubuh saat ini"/></div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>4. Batuk</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="batuk1" name="batuk" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="batuk1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="batuk2" name="batuk" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="batuk2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>5. Pilek</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="pilek1" name="pilek" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="pilek1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="pilek2" name="pilek" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="pilek2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>6. Sakit Tenggorokan</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="tenggorokan1" name="tenggorokan" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="tenggorokan1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="tenggorokan2" name="tenggorokan" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="tenggorokan2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>7. Sesak Napas</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="napas1" name="napas" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="napas1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="napas2" name="napas" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="napas2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>8. Diare</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="diare1" name="diare" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="diare1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="diare2" name="diare" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="diare2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>9. Mual</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="mual1" name="mual" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="mual1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="mual2" name="mual" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="mual2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>10. Muntah</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="muntah1" name="muntah" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="muntah1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="muntah2" name="muntah" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="muntah2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>11 .  Sedang mengonsumsi obat - obatan saat ini ?</b></label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="obat1" name="obat" class="custom-control-input" value="Ya" required autofocus>
                                                          <label class="custom-control-label" for="obat1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="obat2" name="obat" class="custom-control-input" value="Tidak" required autofocus>
                                                          <label class="custom-control-label" for="obat2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>12 .  Jika Ya, Sebutkan obat - obatan yang Anda konsumsi !</b></label><textarea class="form-control py-4" id="konsumsi" name="konsumsi" placeholder="Jika Ya, sebutkan obat-obatan yang sedang Anda konsumsi." /></textarea></div>
                                            <div class="form-group"><label class="mb-1"><b>13 .  Jika memiliki penyakit bawaan, sebutkan !</b></label><textarea class="form-control py-4" id="penyakit" name="penyakit" placeholder="Sebutkan pada kolom berikut ini jika memiliki penyakit bawaan" /></textarea></div>
                                            <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="mb-1"><b>11. Apakah pekerja wanita sedang hamil / sedang menyusui bayi kurang dari 2 tahun</b></label><small class="text-danger"> (* Khusus pekerja wanita wajib di isi)</small><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="hamil1" name="hamil" class="custom-control-input" value="Ya">
                                                          <label class="custom-control-label" for="hamil1">Ya</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                          <input type="radio" id="hamil2" name="hamil" class="custom-control-input" value="Tidak">
                                                          <label class="custom-control-label" for="hamil2">Tidak</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-success btn-block">Kirim Data</button></div>
                                        </form>
                        				<?php endif; ?>
                                    </div>
                                    <!--<div class="card-footer text-center">-->
                                    <!--    <div class="small">Hubungi fungsi HR & GA jika tidak memiliki email perusahaan atau NIP.</div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy 2020 &middot; PT. Patra Drilling Contractor</div>
                            <div>
                                <a href="https://pertamina-pdc.com">Home</a>
                                &middot;
                                <a href="https://item.pertamina-pdc.network">IT-eM</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- jQuery UI -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="js/scripts.js"></script>
<script type='text/javascript'>
	
  $(document).ready(function(){
  
     $( "#email_kantor" ).autocomplete({
		create: function( event, ui ) {
        	$(this).attr('autocomplete', 'nope');
    	},
			   minLength:2,   
               delay:200,
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
    </body>
</html>
