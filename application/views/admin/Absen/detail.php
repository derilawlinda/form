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
            <div class="row justify-content-center">
                <div class="col-lg-8">
				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('rekapabsen/approve') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
                <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php else: ?>

						<form action="" method="post">

							<input type="hidden" name="no" value="<?php echo $temp_form->no?>" />
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nomor Induk Pegawai</b></label><input class="form-control py-4" id="no_pekerja" name="nip" type="text" value="<?php echo $temp_form->nip ?>" readonly></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="mb-1"><b>Nama Lengkap</b></label><input class="form-control py-4" id="nama_pekerja" name="nama" type="text" value="<?php echo $temp_form->nama ?>" readonly></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label class="mb-1"><b>Bulan</b></label><input class="form-control py-4" id="bulan" name="bulan" type="text" value="<?php echo $temp_form->bulan ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Tahun</b></label><input class="form-control py-4" id="tahun" name="tahun" type="number" value="<?php echo $temp_form->tahun ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Hari Kerja</b></label><input class="form-control py-4" id="hari_kerja" name="hari_kerja" type="number" value="<?php echo $temp_form->hari_kerja ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Masuk</b></label><input class="form-control py-4" id="masuk" name="masuk" type="number" value="<?php echo $temp_form->masuk ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Cuti</b></label><input class="form-control py-4" id="cuti" name="cuti" type="number" value="<?php echo $temp_form->cuti ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Izin</b></label><input class="form-control py-4" id="izin" name="izin" type="number" value="<?php echo $temp_form->izin ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Sakit</b></label><input class="form-control py-4" id="sakit" name="sakit" type="number" value="<?php echo $temp_form->sakit ?>" readonly></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group"><label class="mb-1"><b>Alfa</b></label><input class="form-control py-4" id="alfa" name="alfa" type="number" value="<?php echo $temp_form->alfa ?>" readonly></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label class="mb-1"><b>Total Jam Lembur</b></label><input class="form-control py-4" id="total_jam_lembur" name="total_jam_lembur" type="number" value="<?php echo $temp_form->total_jam_lembur ?>" readonly></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"><label class="mb-1"><b>Total Lembur Konversi</b></label><input class="form-control py-4" id="total_lembur_konversi" name="total_lembur_konversi" type="number" value="<?php echo $temp_form->total_lembur_konversi ?>" readonly></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="mb-1"><b>Keterangan</b></label><textarea class="form-control py-4" id="keterangan" name="keterangan" readonly><?php echo $temp_form->keterangan ?></textarea></div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-2">
                                                    <label for="KG111"><b>CCA</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG111" name="KG111" type="number" value="<?php echo $temp_form->KG111 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG104"><b>crew change</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG104" name="KG104" type="number" value="<?php echo $temp_form->KG104 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG045"><b>Daily Off</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG045" name="KG045" type="number" value="<?php echo $temp_form->KG045 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-2">
                                                    <label for="KG044"><b>Daily ON</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG044" name="KG044" type="number" value="<?php echo $temp_form->KG044 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG037"><b>Dinas</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG037" name="KG037" type="number" value="<?php echo $temp_form->KG037 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG050"><b>Dinas Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG050" name="KG050" type="number" value="<?php echo $temp_form->KG050 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-2">
                                                    <label for="KG042"><b>Dinas Khusus</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG042" name="KG042" type="number" value="<?php echo $temp_form->KG042 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG067"><b>Dinas Khusus Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG067" name="KG067" type="number" value="<?php echo $temp_form->KG067 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG091"><b>dinas khusus mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG091" name="KG091" type="number" value="<?php echo $temp_form->KG091 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG068"><b>Dinas Khusus PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG068" name="KG068" type="number" value="<?php echo $temp_form->KG068 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG108"><b>Dinas Lepas Pantai Menginap</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG108" name="KG108" type="number" value="<?php echo $temp_form->KG108 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="KG109"><b>Dinas Lepas Pantai Tdk Menginap</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG109" name="KG109" type="number" value="<?php echo $temp_form->KG109 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-2">
                                                    <label for="KG073"><b>Dinas PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG073" name="KG073" type="number" value="<?php echo $temp_form->KG073 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG114"><b>DOC LAPANGAN</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG114" name="KG114" type="number" value="<?php echo $temp_form->KG114 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG118"><b>DOC OFFICE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG118" name="KG118" type="number" value="<?php echo $temp_form->KG118 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG105"><b>DOC Ofshore 533</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG105" name="KG105" type="number" value="<?php echo $temp_form->KG105 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG106"><b>DOC Ofshore 600</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG106" name="KG106" type="number" value="<?php echo $temp_form->KG106 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG107"><b>DOC Ofshore Luarops</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG107" name="KG107" type="number" value="<?php echo $temp_form->KG107 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-4">
                                                    <label for="KG122"><b>DOC Onshore</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG122" name="KG122" type="number" value="<?php echo $temp_form->KG122 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG039"><b>Ext. Fooding</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG039" name="KG039" type="number" value="<?php echo $temp_form->KG039 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG038"><b>Hotel</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG038" name="KG038" type="number" value="<?php echo $temp_form->KG038 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-3">
                                                    <label for="KG119"><b>Jam Kerja Selamat</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG119" name="KG119" type="number" value="<?php echo $temp_form->KG119 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG043"><b>Kantor</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG043" name="KG043" type="number" value="<?php echo $temp_form->KG043 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG074"><b>lembur tkjp</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG074" name="KG074" type="number" value="<?php echo $temp_form->KG074 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG112"><b>LHC OFFSHORE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG112" name="KG112" type="number" value="<?php echo $temp_form->KG112 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG113"><b>LHC ONSHORE</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG113" name="KG113" type="number" value="<?php echo $temp_form->KG113 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG062"><b>maintenance rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG062" name="KG062" type="number" value="<?php echo $temp_form->KG062 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG094"><b>maintenance rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG094" name="KG094" type="number" value="<?php echo $temp_form->KG094 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <div class="col-md-3">
                                                    <label for="KG034"><b>Makan Lembur</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG034" name="KG034" type="number" value="<?php echo $temp_form->KG034 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>	
                                                <div class="col-md-4">
                                                    <label for="KG046"><b>Mandah Bermalam Driver</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG046" name="KG046" type="number" value="<?php echo $temp_form->KG046 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG072"><b>Mandah Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG072" name="KG072" type="number" value="<?php echo $temp_form->KG072 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-3">
                                                    <label for="KG092"><b>mandah malam mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG092" name="KG092" type="number" value="<?php echo $temp_form->KG092 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG070"><b>Mandah Pagi</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG070" name="KG070" type="number" value="<?php echo $temp_form->KG070 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG064"><b>Mandah PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG064" name="KG064" type="number" value="<?php echo $temp_form->KG064 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG095"><b>mandah pp mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG095" name="KG095" type="number" value="<?php echo $temp_form->KG095 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG071"><b>Mandah Siang</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG071" name="KG071" type="number" value="<?php echo $temp_form->KG071 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-2">
                                                    <label for="KG061"><b>moving rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG061" name="KG061" type="number" value="<?php echo $temp_form->KG061 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG093"><b>moving rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG093" name="KG093" type="number" value="<?php echo $temp_form->KG093 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG117"><b>NIGHT SHIFT</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG117" name="KG117" type="number" value="<?php echo $temp_form->KG117 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG103"><b>offshore allowance</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG103" name="KG103" type="number" value="<?php echo $temp_form->KG103 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>			
                                                <div class="col-md-3">
                                                    <label for="KG031"><b>Operation Rate</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG031" name="KG031" type="number" value="<?php echo $temp_form->KG031 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG090"><b>operation rate mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG090" name="KG090" type="number" value="<?php echo $temp_form->KG090 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG110"><b>OTC</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG110" name="KG110" type="number" value="<?php echo $temp_form->KG110 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>					
                                                <div class="col-md-2">
                                                    <label for="KG058"><b>Overday</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG058" name="KG058" type="number" value="<?php echo $temp_form->KG058 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG083"><b>overday harian</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG083" name="KG083" type="number" value="<?php echo $temp_form->KG083 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG115"><b>PDRA MENGINAP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG115" name="KG115" type="number" value="<?php echo $temp_form->KG115 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG116"><b>PDRA TDK MENGINAP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG116" name="KG116" type="number" value="<?php echo $temp_form->KG116 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG082"><b>PH</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG082" name="KG082" type="number" value="<?php echo $temp_form->KG082 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-2">
                                                    <label for="KG033"><b>Premi Shift</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG033" name="KG033" type="number" value="<?php echo $temp_form->KG033 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG057"><b>Public Holiday</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG057" name="KG057" type="number" value="<?php echo $temp_form->KG057 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG120"><b>Santunan Pekerja Selesai</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG120" name="KG120" type="number" value="<?php echo $temp_form->KG120 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG035"><b>TDT Benuang</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG035" name="KG035" type="number" value="<?php echo $temp_form->KG035 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>			
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG036"><b>TDT Betung</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG036" name="KG036" type="number" value="<?php echo $temp_form->KG036 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG089"><b>transport kantor mtn</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG089" name="KG089" type="number" value="<?php echo $temp_form->KG089 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="KG069"><b>Transport KM</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG069" name="KG069" type="number" value="<?php echo $temp_form->KG069 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>				
                                                <div class="col-md-3">
                                                    <label for="KG052"><b>Transport Lembur</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG052" name="KG052" type="number" value="<?php echo $temp_form->KG052 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG065"><b>Tunj Kerja Lokasi Bermalam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG065" name="KG065" type="number" value="<?php echo $temp_form->KG065 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG066"><b>Tunj Kerja Lokasi PP</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG066" name="KG066" type="number" value="<?php echo $temp_form->KG066 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG096"><b>TUNJ LOKASI CAT</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG096" name="KG096" type="number" value="<?php echo $temp_form->KG096 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>				
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG003"><b>Tunj. Kehadiran</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG003" name="KG003" type="number" value="<?php echo $temp_form->KG003 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG049"><b>Uang Makan Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG049" name="KG049" type="number" value="<?php echo $temp_form->KG049 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="KG047"><b>Uang Makan Pagi</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG047" name="KG047" type="number" value="<?php echo $temp_form->KG047 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="KG048"><b>Uang Makan Siang/Malam</b></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="KG048" name="KG048" type="number" value="<?php echo $temp_form->KG048 ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kali</span>
                                                        </div>
                                                    </div>
                                                </div>									
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-success btn-block">Menyetujui</button></div>
                                            <!-- <div class="form-group mt-4 mb-0"><a href="<?php echo site_url('rekapabsen/reject/'.$temp_form->no) ?>" class="btn btn-danger btn-block">Tolak</a></div> -->
						</form>
                <?php endif; ?>
					</div>
			</div></div></div>
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