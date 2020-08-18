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

                    <div class="form-group row">
                        <label for="yeardd" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-2"> 
                            <select class="form-control" id="yeardd" name="year" disabled>
                                <option value="">- Pilih Tahun -</option>
                                
                            </select>
                        </div> 
                    </div>

                    <div class="form-group row">
                        <label for="monthdd" class="col-sm-2 col-form-label">Bulan</label>
                        <div class="col-sm-2"> 
                            <select class="form-control" id="monthdd" name="bulan" disabled>
                                <option value=''>- Pilih Bulan -</option>
                                
                            </select>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button id="download"  class="btn btn-primary float-md-right mr-3" disabled>Download Excel</button> 
                            <button id="submit" type="submit" class="btn btn-primary float-md-right mr-3" disabled>Submit</button> 
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
        <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>                           
		<script src="<?=base_url()?>js/editable.js"></script>
        <script type='text/javascript'>
            $(document).ready(function() { 
                var tahunArray = new Array();
                var today = new Date();
                var tahunIni = today.getFullYear();
                var bulanIni = today.getMonth();
                var hariIni = today.getDate();
                var selisihTahun = tahunIni - 2020;
                var maxMonth = 0;
                var bulanArray = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                $("#projectdd").select2();
                $("#download").click(
                    function(){
                        TableToExcel.convert(document.getElementById("tabelAbsensi"), {
                            name: $("#yeardd").val()+$("#monthdd").val()+"_"+$("#projectdd").val()+".xlsx",
                            sheet: {
                                name: "absensi"
                            }
                            });
                    }
                );

                $("#submit").click(function() { 
                    $.get("<?=base_url()?>index.php/Rekapabsen/getTable", 
                    { project: $("#projectdd").val(),
                      bulanNumber : $("#monthdd").val(),
                      tahun : $("#yeardd").val()
                    },
                    function(data, status){
                        $("#table").html(data);
                        $("#download").prop("disabled", false);
                    });
                });

                $( "#projectdd" ).change(function() {
                    if($(this).val() != ""){
                        $("#yeardd").prop("disabled", false);
                        $("#yeardd").val(tahunIni).change();
                       
                    }else{
                        $("#yeardd").prop("disabled", true);
                        $("#monthdd").prop("disabled", true);
                        
                    }
                    toggleButton();
                });

                $( "#yeardd" ).change(function() {
                    if($(this).val() != ""){
                        $("#monthdd").prop("disabled", false);
                        var options =  '<option value=""> - Pilih Bulan - </option>'; 
                        if($("#yeardd").val() == tahunIni && hariIni < 20){
                            maxMonth = bulanIni - 1;
                        }else{
                            maxMonth = 11;
                        }
                        for (i = 0; i < maxMonth + 1; i++) {
                            options += '<option value="'+i+'">'+bulanArray[i]+'</option>';
                        }
                        $('#monthdd').html(options);
                        $("#monthdd").val(bulanIni - 1).change();
                        
                    }else{
                        $("#monthdd").prop("disabled", true);
                        
                    }
                    toggleButton();
                });

                function toggleButton(){
                
                    if($('#yeardd').prop('disabled') || $('#monthdd').prop('disabled')){
                        $("#submit").prop("disabled", true);
                    }else{
                        $("#submit").prop("disabled", false);
                    }

                }


             
                for (i = 0; i < selisihTahun + 1; i++) {
                    tahunArray.push(2020 + i);
                    $('#yeardd').append('<option value='+tahunArray[i]+'>'+tahunArray[i]+'</option>');
                }


            }); 
		 
		</script>        

	
		<?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>