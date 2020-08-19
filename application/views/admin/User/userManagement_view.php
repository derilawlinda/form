<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Data User</title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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

                                <h3 align="center">List User</h3>
                                <hr>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add User</button>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead align="center">
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Fullname</th>
                                                <th>Lokasi</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php $i = 0; foreach ($userAccount as $row) : ?>
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->full_name; ?></td>
                                            <td><?php echo $row->sn; ?></td>
                                            <?php 
                                                if($row->role == "admin"){echo '<td>Super Administrator</td>';}
                                                if($row->role == "hr"){echo '<td>HR & GA</td>';}
                                                if($row->role == "adminlokasi"){echo '<td>Admin Lokasi</td>';}
                                                if($row->role == "user"){echo '<td>User Lokasi</td>';}
                                                if($row->role == "crew"){echo '<td>Crew / Staff</td>';}
                                                if($row->role == "koordinator"){echo '<td>Koordinator</td>';}
                                            ?>
                                            <!-- <td><?php echo $row->role; ?></td> -->
                                            <td> 
                                                <!-- <a href="" class="btn btn-small"><i class="fas fa-file"></i></a> -->
                                                <a href="#!" class="btn btn-small text-danger" onClick="hapus(<?php echo $row->user_id; ?>)"><i class="fas fa-trash"></i></a>
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

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo base_url('admin/UserAccount/addAccount') ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <label for="username"> Email </label>
                        <div class="form-group">
                            <input class="form-control py-4 <?php echo form_error('email') ? 'is-invalid':'' ?>" id="email_kantor" name="email" type="email" placeholder="contoh@pertamina.com" required>
                            <div class="invalid-feedback">
                			    <?php echo form_error('email') ?>
                		    </div>
            			</div>
                        <label for="username"> Password </label>
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" required>
                        </div>
                        <label for="username"> Username </label>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <label for="username"> Fullname </label>
                        <div class="form-group">
                            <input type="text" id="nama_pekerja" name="fullname" class="form-control" required>
                        </div>
                        <label for="username"> Lokasi </label>
                        <div class="form-group">
                            <input type="text" id="lokasi_kerja" name="sn" class="form-control">
                        </div>
                        <label for="username"> Role </label>
                        <div class="form-group">
                            <select name="role" class="form-control">
                                <option value="admin"> Super Administrator </option>
                                <option value="hr"> HR </option>
                                <option value="adminlokasi"> Admin Lokasi </option>
                                <option value="koordinator"> Koordinator </option>
                                <option value="user"> User Lokasi </option>
                                <option value="crew"> Crew / Staff </option>
                            </select>
                        </div>
                        <div class="form-group" id="projects_fg" style="display:none;">
                            <label for="projectdd">Project</label>
                                <select class="form-control" id="projectdd" name="projects">
                                    <option value="">- Pilih Salah Satu -</option>
                                    <?php
                                        foreach($projects as $project)
                                        {
                                            ?>
                                                <option value="<?=$project["project_nickname"] ?>"><?=$project["project_nickname"]?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                        </div>
                        <input type="hidden" id="no_pekerja" name="no_pekerja">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm" name="save">Save</button>
                    </div>
                </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="hapusModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo base_url('admin/UserAccount/delete') ?>" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idUser" id="idUser" class="form-control" required>
                    </div>
                     Data yang dihapus tidak akan bisa dikembalikan.
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-sm" name="save">Hapus</button>
                    </div>
                </form>

                </div>
            </div>
        </div>

        <?php $this->load->view("admin/_layouts/js.php") ?>   
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

		<script type='text/javascript'>
            function hapus(params) {
                $('#hapusModal').modal('show');
                $('#idUser').val(params);
            }
		  $(document).ready(function(){

            

            $("[name='role']").change(function(){
                
                if($(this).val() == 'adminlokasi'){
                    $("#projects_fg").show();
                    $("#projectdd")
                    .attr('name', 'projects')
                    .removeAttr('multiple')
                    .attr('required', true).select2();
                 
                }else if($(this).val() == 'koordinator'){
                    $("#projects_fg").show();
                    $("#projectdd")
                    .attr('name', 'projects[]')
                    .prop('multiple', 'multiple')
                    .attr('required', true).select2();
                }else{
                    $("#projects_fg").hide();
                    $("#projectdd").attr('required', false);
                }

            });
		  
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
			   $('#email_kantor').val(ui.item.value0);
			   $('#nama_pekerja').val(ui.item.value1); // save selected id to input
			   $('#tgl_masuk').val(ui.item.value2);
			   $('#tempat_lahir').val(ui.item.value3);
			   $('#tgl_lahir').val(ui.item.value4);
			   $('#departemen').val(ui.item.value5);
			   $('#jabatan').val(ui.item.value6);
			   $('#project').val(ui.item.value7);
			   $('#no_pkwt').val(ui.item.value8);
			   $('#area').val(ui.item.value9);
			   $('#alamat').val(ui.item.value10);
			   $('#provinsi').val(ui.item.value11);
			   $('#kota').val(ui.item.value12);
			   $('#telepon').val(ui.item.value13);
			   $('#handphone').val(ui.item.value14);
			   $('#email_pribadi').val(ui.item.value15);
			   $('#no_ktp').val(ui.item.value16);
			   $('#no_kontrak_project').val(ui.item.value17);
			   $('#project_nickname').val(ui.item.value18);
			   $('#lokasi_kerja').val(ui.item.value19);
			   $('#fungsi').val(ui.item.value20);
			   $('#department').val(ui.item.value21);
			   $('#id_pos').val(ui.item.value22);
			   $('#pt_pdc_sk_028a_pdc1000_2019_s0').val(ui.item.value23);
			   $('#userid').val(ui.item.value24);
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