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
                        <!-- <h4>Lokasi: <?php echo $this->session->userdata('sn'); ?></h4><hr> -->
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<!-- <th></th> -->
										<th>Lokasi</th>
										<th>Bulan</th>
										<th>Jumlah Kehadiran</th>
										<!-- <?php
											for ($i = 1; $i < 32; $i++){
												echo '<th>'.$i.'</th>';
											}
										?> -->
									</tr>
								</thead>
								<tbody align="center">
									<?php $x=0; foreach ($temp_form as $row): ?>
									<?php 
												$values = explode(",", $row->created_at);
												$bulan = isset($values[$x]) ? date('F',strtotime($values[$x])) : null;
												$bln = isset($values[$x]) ? date('m',strtotime($values[$x])) : null;
									?>
									<tr>
									    <td>
											<?php echo ++$x ?>
										</td>
										<td>
    										<?php echo $row->lokasi_kerja ?>
										</td>
										<td>
											<?php 
												echo $bulan;									
											?>
										</td>
										<!-- <?php
										for ($o = 1; $o <= 31; $o++){
											$check = false;
											$day[$o] = isset($values[$o]) ? date('d',strtotime($values[$o])) : null;
											foreach($values as $val){
												if(date('d',strtotime($val)) == $o ){
													$check = true;
												}
											}
											if($check){
												echo '<td><i id="'.$day[$o].'" class="fas fa-check text-success"></i></td>';
											}else{
												echo '<td><i id="'.$day[$o].'" class="fas fa-times text-danger"></i></td>';
											}
                                        }
										?> -->
										<!-- END OF DAY -->
                                    <?php
                                        $this->db->select('*');
                                        $this->db->where('status' , 'User Confirmed');
                                        $this->db->where('lokasi_kerja' , $row->lokasi_kerja);
                                        // $array = array('status' => 'User Confirmed');
                                        $query = $this->db->get('absen')->num_rows();
                                        echo '<td>'.$query.'</td>';
                                    ?>
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