<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Pengajuan Rekap Absensi</title>
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
                        <h3 align="center">Pengajuan Rekap Absensi</h3><hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<th>NIP</th>
										<th>NAMA PEKERJA</th>
										<th>BULAN</th>
										<th>TAHUN</th>
										<th>STATUS</th>
										<th>DIBUAT</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $x=0; foreach ($temp_form as $row): ?>
									<tr>
									    <td>
											<?php echo ++$x ?>
										</td>
										<td>
											<?php echo $row->nip ?>
										</td>
										<td>
											<?php echo $row->nama ?>
										</td>
										<td>
											<?php echo $row->bulan ?>
										</td>
										<td>
											<?php echo $row->tahun ?>
										</td>
										<td>
											<?php echo $row->status ?>
										</td>
										<td>
											<?php 
											$dibuat = $row->created_at;
											echo format_indo(date($dibuat)); ?>
										</td>
										<td>
											<a href="<?php echo site_url('Rekapabsen/detail/'.$row->no) ?>"
											 class="btn btn-small"><i class="fas fa-eye"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('Rekapabsen/delete/'.$row->no) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
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
        
        <?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>