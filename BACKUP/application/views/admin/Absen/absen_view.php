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
                        
                    				<!-- DataTables -->
                    				<div class="card mb-3">
                    					<div class="card-body">
                                            <h3 align="center">List Absen <?php if($this->session->userdata('role')!="admin"){echo $this->session->userdata('full_name');} ?></h3><hr>
                    						<div class="table-responsive">
                    							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    								<thead align="center">
                    									<tr>
                                                            <!--<th>#</th>-->
                                                            <th>User ID</th>
                                                            <th>Tanggal</th>
                                                            <th>Mesin Fingerprint</th>
                                                            <th>Nama</th>
                                                            <th>Project</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody align="center">
                                                    <?php for ($i=0;$i<count($respon);$i++) { ?>
                                                    <tr><?php if($this->session->userdata('sn') == $respon[$i]->SN){ ?>
                                                        <!--<td><?php /*echo ($i+1);*/ ?></td>-->
                                                        <td><?php echo $respon[$i]->userid; ?></td>
                                                        <td><?php echo $respon[$i]->checktime; ?></td>
                                                        <td><?php echo $respon[$i]->SN; ?></td>
                                                        <td><?php echo $respon[$i]->name; ?></td>
                                                        <td><?php echo $respon[$i]->DeptName; ?></td>
                                                    </tr>
                                                    <?php }} ?>

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