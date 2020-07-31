<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>List Lokasi</title>
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
                            <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php else: ?>

                                <h3 align="center">List Lokasi</h3>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lokasiModal">Tambah Lokasi</button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#projectModal">Tambah Project</button>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead align="center">
                                            <tr>
                                                <th>No</th>
                                                <!-- <th>Email</th> -->
                                                <th>Lokasi</th>
                                                <th>Status</th>
                                                <th>Project</th>
                                                <th>Waktu</th>
                                                <th>Admin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php $i = 0; foreach ($lokasi as $row) : ?>
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <!-- <td><?php echo $row->email; ?></td> -->
                                            <td>
                                                <!-- <a href="<?php echo site_url('absen/approve/'.str_replace(' ', '_', $row->nama_lokasi)) ?>"
											 class="text-info"><?php echo $row->nama_lokasi; ?></a> -->
                                             <?php echo $row->nama_lokasi; ?>
                                            </td>
                                            <td><?php if($row->status_lokasi == 1){
                                                echo 'OFT';
                                            }elseif($row->status_lokasi == 2){
                                                echo 'OFJ';
                                            }elseif($row->status_lokasi == 3){
                                                echo 'ORC';
                                            }elseif($row->status_lokasi == 4){
                                                echo 'ORT';
                                            }elseif($row->status_lokasi == 5){
                                                echo 'MVR';
                                            }elseif($row->status_lokasi == 6){
                                                echo 'MTR';
                                            }elseif($row->status_lokasi == 7){
                                                echo 'DK';
                                            }elseif($row->status_lokasi == 8){
                                                echo 'CT';
                                            }elseif($row->status_lokasi == 9){
                                                echo 'IZN';
                                            }else{
                                                echo 'NULL';
                                            } ?></td>
                                            <td><?php echo $row->projectname; ?></td>
                                            <td><?php echo date('d F Y',strtotime($row->mulai)); ?></td>
                                            <td><?php echo $row->full_name; ?></td>
                                            <td> 
                                                <!-- <a href="" class="btn btn-small"><i class="fas fa-file"></i></a> -->
                                                <a href="#!" class="btn btn-small text-danger" onClick="deleteConfirm('<?php echo site_url('absen/deleteLokasi/'.$row->lokasi_id) ?>')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
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

        <!-- Lokasi Modal -->
        <div class="modal fade" id="lokasiModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo base_url('absen/addLokasi') ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <label for="projectid"> Pilih Project </label>
                        <div class="form-group">
                            <select name="projectid" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                <?php foreach ($project as $rows){
                                    echo '<option value="'.$rows->projectid.'">'.$rows->projectname.'</option>';
                                } ?>
                            </select>
                        </div>
                        <label for="user_id"> Pilih Admin </label>
                        <div class="form-group">
                            <select name="user_id" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                <?php foreach ($userAccount as $row){
                                    if($row->role == "adminlokasi"){
                                    echo '<option value="'.$row->user_id.'">'.$row->full_name.'</option>';
                                }} ?>
                            </select>
                        </div>
                        <label for="nama_lokasi"> Nama Lokasi </label>
                        <div class="form-group">
                            <input type="text" name="nama_lokasi" class="form-control" placeholder="Masukkan text disini..." required>
                            <input type="hidden" name="adminid" value="<?php echo $this->session->userdata('email'); ?>">
                        </div>
                        <label for="status_lokasi"> Status Lokasi </label>
                        <div class="form-group">
                            <select name="status_lokasi" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="1">OFF Duty</option>
                                <option value="2">OFF dalam Perjalan (Crew Non Lokal)</option>
                                <option value="3">Operational Rate Potong Catering</option>
                                <option value="4">Operational Rate Tanpa Potong Catering</option>
                                <option value="5">Moving Rate</option>
                                <option value="6">Maintenance Rate</option>
                                <option value="7">Dinas Khusus</option>
                                <option value="8">Cuti</option>
                                <option value="9">Izin</option>
                            </select>
                        </div>
                        <label for="mulai"> Waktu Mulai </label>
                        <div class="form-group">
                            <input class="form-control" name="mulai" type="date" placeholder="YYYY-MM-DD" />
                        </div>
                        <label for="akhir"> Waktu Berakhir </label>
                        <div class="form-group">
                            <input class="form-control" name="akhir" type="date" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm" name="save">Simpan</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <!-- Project Modal -->
        <div class="modal fade" id="projectModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Project</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo base_url('absen/addProject') ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <label for="projectName"> Nama Project </label>
                        <div class="form-group">
                            <input type="text" name="projectName" class="form-control" placeholder="Masukkan text disini..." required>
                            <input type="hidden" name="adminid" value="<?php echo $this->session->userdata('email'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" name="save">Simpan</button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button> -->
                    
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php  $i = 0; foreach ($project as $row) : ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $row->projectname; ?></td>
                                        <td> 
                                            <a href="deleteProject/<?php echo $row->projectid; ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>

                </div>
            </div>
        </div>

        <?php $this->load->view("admin/_layouts/js.php") ?>  
        <?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>