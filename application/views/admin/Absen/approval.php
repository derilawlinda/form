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
                        <h4>Lokasi: <?php echo $this->session->userdata('sn'); ?></h4><hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<!-- <th></th> -->
										<th>NIP</th>
										<th style="min-width:200px">JABATAN</th>
										<th style="min-width:200px">NAMA</th>
										<th>Bulan</th>
										<?php
											for ($i = 1; $i < 32; $i++){
												echo '<th>'.$i.'</th>';
											}
										?>
									</tr>
								</thead>
								<tbody align="center">
									<?php $x=0; foreach ($temp_form as $row): ?>
									<?php 
												$values = explode(",", $row->created_at);
												$status = explode(",", $row->status_kerja);
												$bulan = isset($values[$x]) ? date('F',strtotime($values[$x])) : null;	
												$bln = isset($values[$x]) ? date('m',strtotime($values[$x])) : null;
									?>
									<tr>
									    <td>
											<?php echo ++$x ?>
										</td>
										<!-- <td>
											<a href="<?php echo site_url('absen/detail_approve/'.$row->no_pekerja.'/'.$bln) ?>"
											 class="btn btn-small"><i class="fas fa-eye"></i></a>
											<a onclick="deleteConfirm('<?php echo site_url('absen/delete/'.$row->no_pekerja) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
										</td> -->
										<td>
										<a href="<?php echo site_url('absen/detail_approve/'.$row->no_pekerja.'/'.$bln) ?>"
											 class="text-info"><?php echo $row->no_pekerja ?></a>
										</td>
										<td>
											<?php echo $row->jabatan; ?>
										</td>
										<td>
										<a href="<?php echo site_url('absen/detail_approve/'.$row->no_pekerja.'/'.$bln) ?>"
											 class="text-info"><?php echo $row->nama_pekerja ?></a>
										</td>
										<td>
											<?php 
												echo $bulan;									
											?>
										</td>
										<?php
										//DAY 1
										for ($o = 1; $o <= 31; $o++){
											$check = false;
											$day[$o] = isset($values[$o]) ? date('d',strtotime($values[$o])) : null;
											$kerja[$o] = isset($status[$o]) ? $status[$o] : null;
											foreach($values as $val):
												if(date('d',strtotime($val)) == $o ){
													$check = true;
												}
											endforeach;
											if($check){
												echo '<td>'.$kerja[$o].'</td>';
											}else{
												echo '<td>-</td>';
												// echo '<td><i id="'.$day[$o].'" class="fas fa-times text-danger"></i></td>';
											}
											// echo '<td>';
											// 	$day[$o] = isset($values[$o]) ? date('d',strtotime($values[$o])) : null;
											// 	if($day[$o] == $o+1){
											// 		// echo '<i id="'.$day.'" class="fas fa-check"></i>';
											// 		echo $day[$o];
											// 	}
											// 	else{
											// 		// unset($values[$o]);
											// 		// // echo isset($values[$o]) ? date('d',strtotime($values[$o])) : null;
											// 		// $valnew = isset($values[$o]) ? date('d',strtotime($values[$o])) : null;
											// 		// echo '<i id="'.$valnew.'" class="fas fa-times"></i>';
											// 		echo $day[$o];
											// 	}
											// echo '</td>';
										}
										?>
										<!-- END OF DAY -->
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