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
                        <h4>Lokasi: <?php echo $this->session->userdata('sn'); ?></h4>
                        <p>Nama: <?php echo $temp_form->nama_pekerja ?></p>
                        <p>NIP: <?php echo $temp_form->no_pekerja ?></p>
                        <hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<th>STATUS</th>
										<th>Tanggal Absen</th>
										<!-- <th>ACTION</th> -->
									</tr>
								</thead>
								<tbody align="center">
									<?php $x=0; foreach ($temp as $row): ?>
									<tr>
									    <td>
											<?php echo ++$x ?>
										</td>
										<td>
											<?php echo $row->status ?>
										</td>
										<td>
											<?php 
											$dibuat = $row->created_at;
											echo date('d F Y', strtotime($dibuat)); ?>
										</td>
										<!-- <td>
											<a href="<?php echo site_url('Rekapabsen/detail/'.$row->id) ?>"
											 class="btn btn-small"><i class="fas fa-eye"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('Rekapabsen/delete/'.$row->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										</td> -->
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
							<?php $dibuat = isset($dibuat) ? $dibuat : null;
							$bulan = date('m',strtotime($dibuat)); ?>
							<form action="<?php echo site_url('Absen/approveAbsensi/'.$temp_form->no_pekerja.'/'.$bulan) ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $temp_form->id ?>">
								<input type="hidden" name="created_at" value="<?php echo $dibuat ?>">
								<input type="hidden" name="no_pekerja" value="<?php echo $temp_form->no_pekerja ?>">
								<input type="hidden" name="nama_pekerja" value="<?php echo $temp_form->nama_pekerja ?>">
								<input type="hidden" name="email_kantor" value="<?php echo $temp_form->email_kantor ?>">
								<input type="hidden" name="lokasi_kerja" value="<?php echo $temp_form->lokasi_kerja ?>">
								<input type="hidden" name="fungsi" value="<?php echo $temp_form->fungsi ?>">
								<input type="hidden" name="bln" value="<?php echo $bulan; ?>">
								<center><button type="submit" class="btn btn-success">Approve</button>
							</form>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button></center>
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
        <!-- The Modal -->
        <div class="modal fade" id="rejectModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Alasan Penolakan Permohonan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo site_url('Absen/approveAbsensi/'.$temp_form->no_pekerja.'/'.$bulan) ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <!-- <label for="reason"> Alasan </label> -->
                        <div class="form-group">
                            <textarea class="form-control py-4" id="reason" name="reason" placeholder="Isi alasan di dalam kolom berikut." required></textarea>
							<input type="hidden" name="id" value="<?php echo $temp_form->id ?>">
								<input type="hidden" name="created_at" value="<?php echo $dibuat ?>">
								<input type="hidden" name="no_pekerja" value="<?php echo $temp_form->no_pekerja ?>">
								<input type="hidden" name="nama_pekerja" value="<?php echo $temp_form->nama_pekerja ?>">
								<input type="hidden" name="email_kantor" value="<?php echo $temp_form->email_kantor ?>">
								<input type="hidden" name="lokasi_kerja" value="<?php echo $temp_form->lokasi_kerja ?>">
								<input type="hidden" name="fungsi" value="<?php echo $temp_form->fungsi ?>">
								<input type="hidden" name="bln" value="<?php echo $bulan; ?>">
            			</div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm" name="save">Send</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>