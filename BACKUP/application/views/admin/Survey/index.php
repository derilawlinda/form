<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Laporan Survey Kesehatan PDC</title>
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
                        
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
                        <h3 align="center">Laporan Survey Kesehatan PDC</h3><hr>
                        <p><button class="btn-large btn-success" id="exporttable">Export</button></p>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<th>Email</th>
										<th>NIP</th>
										<th>Fungsi</th>
										<th>Jabatan</th>
										<th>Lokasi Kerja</th>
										<th>Nama</th>
										<th>Lokasi Sekarang</th>
										<th>Suhu Tubuh</th>
										<th>Batuk</th>
										<th>Pilek</th>
										<th>Sakit Tenggorokan</th>
										<th>Sesak Napas</th>
										<th>Diare</th>
										<th>Mual</th>
										<th>Muntah</th>
										<th>Konsumsi Obat</th>
										<th>Obat-obatan</th>
										<th>Status</th>
										<th>Tanggal Isi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $x=0; foreach ($temp_form as $row): ?>
									<tr>
									    <td>
											<?php echo ++$x ?>
										</td>
										<td>
											<?php echo $row->email_kantor ?>
										</td>
										<td>
											<?php echo $row->no_pekerja ?>
										</td>
										<td>
											<?php echo $row->fungsi ?>
										</td>
										<td>
											<?php echo $row->jabatan ?>
										</td>
										<td>
											<?php echo $row->lokasi_kerja ?>
										</td>
										<td>
											<?php echo $row->nama_pekerja ?>
										</td>
										<td>
											<?php echo $row->lokasi_ini ?>
										</td>
										<td>
											<?php echo $row->suhu ?>
										</td>
										<td>
											<?php echo $row->batuk ?>
										</td>
										<td>
											<?php echo $row->pilek ?>
										</td>
										<td>
											<?php echo $row->tenggorokan ?>
										</td>
										<td>
											<?php echo $row->napas ?>
										</td>
										<td>
											<?php echo $row->diare ?>
										</td>
										<td>
											<?php echo $row->mual ?>
										</td>
										<td>
											<?php echo $row->muntah ?>
										</td>
										<td>
											<?php echo $row->obat ?>
										</td>
										<td>
											<?php echo $row->konsumsi ?>
										</td>
										<td>
											<?php echo $row->status ?>
										</td>
										<td>
											<?php 
											$dibuat = $row->created_at;
											echo date($dibuat); ?>
										</td>
										<td>
										<!-- <a href="<?php echo site_url('admin/Confirmed/edit/'.$row->id) ?>"
										class="btn btn-small"><i class="fas fa-file"></i></a>-->
											<a onclick="deleteConfirm('<?php echo site_url('admin/Confirmed/delete/'.$row->no_pekerja) ?>')"
											href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- End DataTables -->
			
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