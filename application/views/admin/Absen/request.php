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
                                                <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email_kantor" type="text" placeholder="contoh@pertamina.com atau NOPEK" required>
                                                <div class="invalid-feedback">
                									<?php echo form_error('email') ?>
                								</div>
            								</div>
            								<hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Induk Pegawai</b></label><input class="form-control py-4" id="no_pekerja" name="nip" type="text" placeholder="NIP" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nama Lengkap</b></label><input class="form-control py-4" id="nama_pekerja" name="nama" type="text" placeholder="Nama Lengkap" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label class="mb-1"><b>Bulan</b></label><input class="form-control py-4" id="bulan" name="bulan" type="text" value="<?php echo intval(date("m")) ?>" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Tahun</b></label><input class="form-control py-4" id="tahun" name="tahun" type="number" value="<?php echo date("Y") ?>" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Hari Kerja</b></label><input class="form-control py-4" id="hari_kerja" name="hari_kerja" type="number" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Masuk</b></label><input class="form-control py-4" id="masuk" name="masuk" type="number" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Cuti</b></label><input class="form-control py-4" id="cuti" name="cuti" type="number" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Izin</b></label><input class="form-control py-4" id="izin" name="izin" type="number" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Sakit</b></label><input class="form-control py-4" id="sakit" name="sakit" type="number" /></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Alfa</b></label><input class="form-control py-4" id="alfa" name="alfa" type="number" /></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label class="mb-1"><b>Total Jam Lembur</b></label><input class="form-control py-4" id="total_jam_lembur" name="total_jam_lembur" type="number" /></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label class="mb-1"><b>Total Lembur Konversi</b></label><input class="form-control py-4" id="total_lembur_konversi" name="total_lembur_konversi" type="number" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Keterangan</b></label><textarea class="form-control py-4" id="keterangan" name="keterangan" placeholder="Keterangan" /></textarea></div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <label for="KG111"><b>CCA</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG111" name="KG111" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG104"><b>crew change</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG104" name="KG104" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG045"><b>Daily Off</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG045" name="KG045" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-2">
                                                    <label for="KG044"><b>Daily ON</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG044" name="KG044" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG037"><b>Dinas</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG037" name="KG037" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG050"><b>Dinas Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG050" name="KG050" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-2">
                                                    <label for="KG042"><b>Dinas Khusus</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG042" name="KG042" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG067"><b>Dinas Khusus Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG067" name="KG067" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG091"><b>dinas khusus mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG091" name="KG091" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG068"><b>Dinas Khusus PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG068" name="KG068" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG108"><b>Dinas Lepas Pantai Menginap</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG108" name="KG108" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="KG109"><b>Dinas Lepas Pantai Tdk Menginap</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG109" name="KG109" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-2">
                                                    <label for="KG073"><b>Dinas PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG073" name="KG073" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG114"><b>DOC LAPANGAN</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG114" name="KG114" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG118"><b>DOC OFFICE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG118" name="KG118" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG105"><b>DOC Ofshore 533</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG105" name="KG105" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG106"><b>DOC Ofshore 600</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG106" name="KG106" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG107"><b>DOC Ofshore Luarops</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG107" name="KG107" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-4">
                                                    <label for="KG122"><b>DOC Onshore</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG122" name="KG122" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG039"><b>Ext. Fooding</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG039" name="KG039" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG038"><b>Hotel</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG038" name="KG038" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-3">
                                                    <label for="KG119"><b>Jam Kerja Selamat</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG119" name="KG119" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG043"><b>Kantor</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG043" name="KG043" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG074"><b>lembur tkjp</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG074" name="KG074" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG112"><b>LHC OFFSHORE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG112" name="KG112" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG113"><b>LHC ONSHORE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG113" name="KG113" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG062"><b>maintenance rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG062" name="KG062" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG094"><b>maintenance rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG094" name="KG094" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG034"><b>Makan Lembur</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG034" name="KG034" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>	
                                                <div class="col-md-4">
                                                    <label for="KG046"><b>Mandah Bermalam Driver</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG046" name="KG046" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG072"><b>Mandah Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG072" name="KG072" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-3">
                                                    <label for="KG092"><b>mandah malam mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG092" name="KG092" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG070"><b>Mandah Pagi</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG070" name="KG070" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG064"><b>Mandah PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG064" name="KG064" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG095"><b>mandah pp mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG095" name="KG095" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG071"><b>Mandah Siang</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG071" name="KG071" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-2">
                                                    <label for="KG061"><b>moving rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG061" name="KG061" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG093"><b>moving rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG093" name="KG093" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG117"><b>NIGHT SHIFT</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG117" name="KG117" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG103"><b>offshore allowance</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG103" name="KG103" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG031"><b>Operation Rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG031" name="KG031" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG090"><b>operation rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG090" name="KG090" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG110"><b>OTC</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG110" name="KG110" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-2">
                                                    <label for="KG058"><b>Overday</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG058" name="KG058" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG083"><b>overday harian</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG083" name="KG083" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG115"><b>PDRA MENGINAP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG115" name="KG115" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG116"><b>PDRA TDK MENGINAP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG116" name="KG116" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG082"><b>PH</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG082" name="KG082" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-2">
                                                    <label for="KG033"><b>Premi Shift</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG033" name="KG033" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG057"><b>Public Holiday</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG057" name="KG057" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG120"><b>Santunan Pekerja Selesai</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG120" name="KG120" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG035"><b>TDT Benuang</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG035" name="KG035" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>			
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG036"><b>TDT Betung</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG036" name="KG036" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG089"><b>transport kantor mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG089" name="KG089" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG069"><b>Transport KM</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG069" name="KG069" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-3">
                                                    <label for="KG052"><b>Transport Lembur</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG052" name="KG052" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG065"><b>Tunj Kerja Lokasi Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG065" name="KG065" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG066"><b>Tunj Kerja Lokasi PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG066" name="KG066" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG096"><b>TUNJ LOKASI CAT</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG096" name="KG096" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>				
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG003"><b>Tunj. Kehadiran</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG003" name="KG003" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG049"><b>Uang Makan Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG049" name="KG049" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG047"><b>Uang Makan Pagi</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG047" name="KG047" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG048"><b>Uang Makan Siang/Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG048" name="KG048" type="number">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>										
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Submit Request</button></div>
                                        </form>
                        				<?php endif; ?>
                                    <!--</div>-->
                                    <div class="card-footer text-center">
                                        <div class="small">Data yang telah di ajukan akan di lihat oleh Manager / Asst. Manager.</div>
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
			   $('#nama_pekerja').val(ui.item.value1); 
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