<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Permintaan Konfirmasi Data Pekerja</title>
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
                        <h3 align="center">Permintaan Konfirmasi Data Pekerja</h3><hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<th>FOTO</th>
										<th>NO PEKERJA</th>
										<th>EMAIL KANTOR</th>
										<th>NAMA PEKERJA</th>
										<th>FUNGSI</th>
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
											<img src="<?php echo base_url('upload/foto/'.$row->image) ?>" width="64" />
										</td>
										<td>
											<?php echo $row->no_pekerja ?>
										</td>
										<td>
											<?php echo $row->email_kantor ?>
										</td>
										<td>
											<?php echo $row->nama_pekerja ?>
										</td>
										<td>
											<?php echo $row->fungsi ?>
										</td>
										<td>
											<?php 
											$dibuat = $row->created_at;
											echo format_indo(date($dibuat)); ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/Request/edit/'.$row->no_pekerja) ?>"
											 class="btn btn-small"><i class="fas fa-file"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/Request/delete/'.$row->id) ?>')"
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