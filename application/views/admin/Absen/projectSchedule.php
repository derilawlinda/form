<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Tabel Absensi</title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <style>
        .table th, .table td {
            padding: 5px !important;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        </style>
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
                <div class="container-fluid" style="padding:20px;">
                    <div class="form-group row">
                        <label for="projectdd" class="col-sm-2 col-form-label">Project</label>
                        <div class="col-sm-6"> 
                            <select class="form-control" id="projectdd" name="project" >
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
                    </div>

                                 
                
                    
                    <div class="row mt-3">
                        <div class="col-lg-12">
                           <div id="table">
                           
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
		<script type='text/javascript'>
            $(document).ready(function() { 
                $( "#projectdd" ).change(function() {

                    $.get("<?=base_url()?>index.php/Rekapabsen/projectScheduleDetail", 
                        { project: $("#projectdd").val()
                        },
                        function(data, status){
                            $("#table").html(data);
                    });
                    
                });
                var i=1;  
                $("#projectdd").select2();


                $('#add').click(function(){  
                    i++;  
                    $('#tableSchedule').append(
                        '<tr id="row'+i+'" class="dynamic-added">'+ 
                                '<td style="display:none;"></td>' +
                                '<td>' +
                                    '<select class="form-control" >'+
                                        '<option value="">Status</option>' +
                                        '<option value="OFF">OFF Duty</option>' +
                                        '<option value="OFJ">OFF dalam Perjalan (Crew Non Lokal)</option>' +
                                        '<option value="ORC">Operational Rate Potong Catering</option>' +
                                        '<option value="ORT">Operational Rate Tanpa Potong Catering</option>' +
                                        '<option value="MVR">Moving Rate</option>' +
                                        '<option value="MTR">Maintenance Rate</option>' +
                                        '<option value="DK">Dinas Khusus</option>' +
                                        '<option value="CT">Cuti</option>' +
                                        '<option value="IZN">Izin</option>' +
                                    '</select>' +
                                '</td> ' +
                                '<td><input type="date" name="statusStartDate" class="form-control status-list" required="" /></td>'+
                                '<td><input type="date" name="statusEndDate" class="form-control status-list" required="" /></td>'+
                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
                        '</tr>');  
                });

                $(document).on('click', '.btn_remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();  
                });  




            }); 
		 
		</script>        

	
		<?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>