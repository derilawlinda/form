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
        .btn-primary:hover {
            background-color: RoyalBlue;
        }
      
        </style>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php $this->load->view("admin/_layouts/navbar.php") ?>
        </nav>
    <!-- Modal master -->
    <div class="modal fade" id="modalDialog" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
            </div>

        </div>
    </div>

    

    <!-- Modal reject -->

    <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="note-text" class="col-form-label">Alasan ditolak :</label>
                        <textarea class="form-control is-invalid" id="note-text"></textarea>
                        <span class="invalid-feedback"> Tidak bisa kurang dari 30 karakter. </span>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submitButton" class="btn btn-primary" disabled>Submit</button>
                </div>
                </div>
            </div>
        </div>



        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("admin/_layouts/sidebar.php") ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid" style="padding:20px;">
                    
                    <div class="row">
                        <label class="col-sm-2">Project</label>
                        <div class="col-sm-6"> 

                        <?php if($role == "adminlokasi" || $role == "admin" || $role=="user") { ?>

                            <span id="projectspan"> <?php echo($project) ?> </span>


                        <?php } elseif($role == "koordinator") {
                            ?>
                            <select class="form-control" id="projectdd" name="project" >
                                <?php
                                    for ($x = 0; $x  < count($projectsArray); $x++) 
                                    {
                                        if($x == 0) { ?>
                                            <option selected value="<?=$projectsArray[$x]["project"] ?>"><?=$projectsArray[$x]["project"]?></option>
                                        <?php }
                                        else{ ?>
                                            <option value="<?=$projectsArray[$x]["project"] ?>"><?=$projectsArray[$x]["project"]?></option>
                                        <?php } 
                                    }
                                ?>
                            </select>
                        


                        <?php } ?>
                        </div> 
                    </div>

                    <div class="row">
                        <label class="col-sm-2">Tahun</label>
                        <div class="col-sm-6"> 
                            <?php echo($tahun) ?>
                        </div> 
                    </div>

                    <div class="row">
                        <label class="col-sm-2">Bulan</label>
                        <div class="col-sm-6"> 
                            <?php echo($bulanText) ?>
                        </div> 
                    </div>

                    <div class="row">
                        <label class="col-sm-2">Approval Status</label>
                        <div class="col-sm-6"> 
                            <span id="approvalstatus"><?php  echo($status) ?></span>
                            <br>
                            <span id="notes">Notes : <?php  echo($notes) ?></span>
                        </div> 
                    </div>



                    <div class="row mt-3">
                        <div class="col-sm-12">
                                <button id="download" class="btn btn-primary"><i class="fas fa-file-excel"></i> Download Excel</button>
                            <?php if($role == "adminlokasi" || $role == "admin" || $role == "koordinator") { ?>
                                <button id="edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                <button id="save" class="btn btn-primary" disabled><i class="fas fa-save"></i> Save</button>
                                <button id="cancel" class="btn btn-primary" disabled><i class="fas fa-times"></i> Cancel</button>
                            <?php } ?>
                                <button id="approve" class="btn btn-success"><i class="fas fa-check"></i> Approve</button>
                            <?php if($role == "user") { ?>
                                <button id="reject" class="btn btn-danger"><i class="fas fa-times"></i> Reject</button>
                            <?php } ?>    
                        </div>                 
                    </div>                
                
                    
                    <div class="row mt-3">
                        <div class="col-lg-12">
                           <div id="table">
                                <?php echo($table); ?>
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
            var edited = {};
            $(document).ready(function() { 
                var tahunArray = new Array();
                var today = new Date();
                var tahunIni = today.getFullYear();
                var bulanIni = today.getMonth();
                var hariIni = today.getDate();
                var selisihTahun = tahunIni - 2020;
                var maxMonth = 0;
                var bulanArray = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                var projectname;
                $("#projectdd").select2();
                $("#download").click(
                    function(){
                        if($("#projectdd").val()){
                            project = $("#projectdd").val();
                        }else{
                            project = $("#projectspan").text();
                        }
                        TableToExcel.convert(document.getElementById("tabelAbsensi"), {
                            name: <?php echo($tahun.$bulan)?>+"_"+project+".xlsx",
                            sheet: {
                                name: "absensi"
                            }
                            });
                    }
                );

                

                $( "#projectdd" ).change(function() {
                    var ddvalue = $.trim($(this).val());
                    $.get("<?=base_url()?>index.php/Rekapabsen/getTable", 
                        { project: ddvalue,
                        bulanNumber : <?php echo($bulan - 1) ?>,
                        tahun : <?php echo($tahun) ?>
                        },
                        function(data, status){
                            $("#table").html(data);
                            generateTable();
            
                    });
                    $.get("<?=base_url()?>index.php/Rekapabsen/getStatus", 
                        { project: ddvalue,
                        bulanNumber : <?php echo($bulan) ?>,
                        tahun : <?php echo($tahun) ?>
                        },
                        function(data, status){
                            var jsonData = JSON.parse(data);
                            $("#approvalstatus").text(jsonData["status"]);
                            $("#notes").text("Notes : " + jsonData["notes"]);
            
                    });
                });

                
                var edited = {};    
                


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

                $("#edit").click(function(){
                    $(this).prop("disabled",true);
                    $("#save").prop("disabled",false);
                    $("#download").prop("disabled",true);
                    $("#cancel").prop("disabled",false);
                    $('#tabelAbsensi').data('plugin_editable').edit();
                    $("#approve").prop("disabled",true);
                    if($("#projectdd")){
                        $("#projectdd").prop("disabled",true)
                    }
                    var table = document.getElementById('tabelAbsensi');
                    var tbody = document.getElementById('tabelAbsensiBody');
                    $("select.status-dd").change(function(){
                        var rowIndex = $(this).parent().parent().index();
                        var colIndex = $(this).parent().index() - 3;
                        var date = $(table.rows[1].cells[colIndex]).text();
                        var no_pekerja = $(tbody.rows[rowIndex].cells[0]).text();
                        console.log(no_pekerja);
                        if(!(no_pekerja in edited)) {
                            edited[no_pekerja] = {};
                        };
                        var bulan = <?php echo($bulan); ?> ;
                        if(date > 20){
                            bulan = bulan - 1;
                        }
                        var tanggal = '<?php echo($tahun.'-'); ?>'+bulan+'-'+date;
                        if(!(tanggal in edited[no_pekerja])) {
                            edited[no_pekerja][tanggal] = {};
                        };
                        edited[no_pekerja][tanggal]["status"] = $(this).val();
                        edited[no_pekerja][tanggal]["old_status"] = $(this).data("old-value");
                    });
                    


                });

                $("#save").click(function(){
                    $("#edit").prop("disabled",false);
                    var project;
                        
                    var thisTable = $("#tableAbsensi");
                    if($("#projectdd").val()){
                        project = $("#projectdd").val();
                    }else{
                        project = $("#projectspan").text();
                    }

                    $.post("<?=base_url()?>index.php/Rekapabsen/saveRekapAbsen", 
                        {
                            data : JSON.stringify(edited),
                            project : $.trim(project),
                            bulan : <?php echo($bulan) ?>,
                            tahun : <?php echo($tahun) ?>
                        }
                    ,function() {
                        $('#tabelAbsensi').data('plugin_editable').save();
                    })
                    .fail(function(data){
                        $("#modalDialog .modal-body").html(`
                        <div class="row">
                            <div class="col-3">
                                <p></p>
                                <p class="text-center">
                                    <i class="fas fa-times fa-3x" style="color:red"></i>
                                </p>
                            </div>

                            <div class="col-9 mt-3">
                                <h2>
                                <span>`+data.responseJSON.message+`</span>
                                </h2>

                            </div>
                        </div>`);
                        $("#modalDialog").modal();
                        $('#tabelAbsensi').data('plugin_editable').cancel();
                        edited = {}; 


                    });
                    
                    $(this).prop("disabled",true);
                    $("#cancel").prop("disabled",true);
                    $("#download").prop("disabled",false);
                    $("#approve").prop("disabled",false);
                    if($("#projectdd")){
                        $("#projectdd").prop("disabled",false)
                    }

                });

                $("#cancel").click(function(){
                    $("#edit").prop("disabled",false);
                    $("#cancel").prop("disabled",true);
                    $("#save").prop("disabled",true);
                    $('#tabelAbsensi').data('plugin_editable').cancel();
                    $("#download").prop("disabled",false);
                    $("#approve").prop("disabled",false);
                    if($("#projectdd")){
                        $("#projectdd").prop("disabled",false)
                    }
                    edited = {}; 

                });

                $("#reject").click(function(){
                    if($("#approvalstatus").text() == "REJECTED BY USER"){
                        $("#modalDialog .modal-body").html(`
                        <div class="row">
                            <div class="col-3">
                                <p></p>
                                <p class="text-center">
                                    <i class="fas fa-times fa-3x" style="color:red"></i>
                                </p>
                            </div>

                            <div class="col-9 mt-3">
                                <h2>
                                <span>Status sudah reject</span>
                                </h2>

                            </div>
                        </div>`);
                        $("#modalDialog").modal();
                    }else{
                        $("#noteModal").modal();
                    ;}
                });

                  

                $("#submitButton").click(function(){
                
                    $.post("<?=base_url()?>index.php/Rekapabsen/rejectRekapAbsen", 
                        {
                            project_nickname : "<?php echo($project) ?>",
                            bulan : <?php echo($bulan) ?>,
                            tahun : <?php echo($tahun) ?>,
                            notes : $("#note-text").val()
                        }
                        ,function(data) {
                            var array = JSON.parse(data);
                            $('#noteModal').modal('toggle');
                            $("#approvalstatus").text(array["status"]);
                            $("#notes").text("Notes : "+ array["notes"]);
                            
                            
                        })
                        .fail(function(data) {
                            $("#modalDialog .modal-body").html(`
                            <div class="row">
                                <div class="col-3">
                                    <p></p>
                                    <p class="text-center">
                                        <i class="fas fa-times fa-3x" style="color:red"></i>
                                    </p>
                                </div>

                                <div class="col-9 mt-3">
                                    <h2>
                                    <span>`+data.responseJSON.message+`</span>
                                    </h2>

                                </div>
                            </div>`);
                            $("#modalDialog").modal();
                        });

                })


                function toggleButton(){
                
                    if($('#yeardd').prop('disabled') || $('#monthdd').prop('disabled')){
                        $("#submit").prop("disabled", true);
                    }else{
                        $("#submit").prop("disabled", false);
                    }

                }
                jQuery('#note-text').on('input propertychange paste', function() {
                    if($(this).val().length <= 29){
                        $(this).addClass("is-invalid");
                        $("#submitButton").prop("disabled",true);
                    }else {
                        $(this).removeClass("is-invalid");
                        $("#submitButton").prop("disabled",false);
                    }
                });

                $("#approve").click(function(){

                    var project;
                    if($("#projectdd").val()){
                        project = $("#projectdd").val();
                    }else{
                        project = $("#projectspan").text();
                    }
                    $.post("<?=base_url()?>index.php/Rekapabsen/approveRekapAbsen", 
                    {
                        project_nickname : $.trim(project),
                        bulan : <?php echo($bulan) ?>,
                        tahun : <?php echo($tahun) ?>
                    }
                    ,function() {
                        var project;
                        if($("#projectdd").val()){
                            project = $.trim($("#projectdd").val());
                        }else{
                            project = $.trim($("#projectspan").text());
                        }
                        $("#modalDialog .modal-body").html('<p>Data tersimpan</p>');
                        $("#modalDialog").modal();
                        $.get("<?=base_url()?>index.php/Rekapabsen/getStatus", 
                            { project: project,
                            bulanNumber : <?php echo($bulan) ?>,
                            tahun : <?php echo($tahun) ?>
                            },
                            function(data, status){
                                var jsonData = JSON.parse(data);
                                $("#approvalstatus").text(jsonData["status"]);
                                $("#notes").text("Notes : "+ jsonData["notes"]);
                
                        });
                    })
                    .fail(function(data) {
                        $("#modalDialog .modal-body").html(`
                        <div class="row">
                            <div class="col-3">
                                <p></p>
                                <p class="text-center">
                                    <i class="fas fa-times fa-3x" style="color:red"></i>
                                </p>
                            </div>

                            <div class="col-9 mt-3">
                                <h2>
                                <span>`+data.responseJSON.message+`</span>
                                </h2>

                            </div>
                        </div>`);
                        $("#modalDialog").modal();
                        
                    });
                });
            });

            var cellcolor = new Array();
            cellcolor["NA"] = "FFFFFF"; //white
            cellcolor["OFT"] = "FF0000"; //red
            cellcolor["OFJ"] = "996600"; // brown
            cellcolor["ORC"] = "29B150"; // green
            cellcolor["ORT"] = "92D04F"; // light green
            cellcolor["MVR"] = "1470C0"; // blue
            cellcolor["MTR"] = "FFFF01"; // yellow
            cellcolor["DK"] = "7030A0"; //purple
            cellcolor["CT"] = "F900FF"; // pink
            cellcolor["IZ"] = "A6A6A6"; //grey
        var generateTable = function(){
            $("#tabelAbsensi").editable({
                    keyboard: true,
                    dblclick: false,
                    button: true,
                    buttonSelector: ".edit",
                    dropdowns: {
                            work_status: ['NA','OFT','OFJ', 'ORC', 'ORT', 'MVR','MTR','DK','CT']
                    },
                    maintainWidth: true,
                    edit: function(values) {
                        
                    },
                    save: function(values) {
                        var rows = $('#tabelAbsensiBody').children();
                        for (i = 0; i < rows.length; i++) {
                            var countStatus = new Array();
                            countStatus["OFT"] = 0;
                            countStatus["OFJ"] = 0;
                            countStatus["ORC"] = 0;
                            countStatus["ORT"] = 0;
                            countStatus["MVR"] = 0;
                            countStatus["MTR"] = 0;
                            countStatus["DK"] = 0;
                            countStatus["CT"] = 0;
                            countStatus["IZN"] = 0;
                            countStatus["NA"] = 0;
                            var cells = $(rows[i]).children();

                            for (j = 3; j < cells.length - 11; j++) {
                                var tdcolor = cellcolor[$(cells[j]).text()];
                                $(cells[j]).css("background-color", "#"+tdcolor);
                                $(cells[j]).attr( "data-fill-color", "FF"+tdcolor);
                                countStatus[$(cells[j]).text()] += 1;
                            }
                            $(cells[cells.length - 1]).text(countStatus["NA"]);
                            $(cells[cells.length - 2]).text(countStatus["IZN"]);
                            $(cells[cells.length - 3]).text(countStatus["CT"]);
                            $(cells[cells.length - 4]).text(countStatus["DK"]);
                            $(cells[cells.length - 5]).text(countStatus["MTR"]);
                            $(cells[cells.length - 6]).text(countStatus["MVR"]);
                            $(cells[cells.length - 7]).text(countStatus["ORT"]);
                            $(cells[cells.length - 8]).text(countStatus["ORC"]);
                            $(cells[cells.length - 9]).text(countStatus["OFJ"]);
                            $(cells[cells.length - 10]).text(countStatus["OFT"]);
                        };
                    },
                    cancel: function(values) {
                        edited = {};
                    }
                });

        };
        generateTable();
		 
		</script>        

	
		<?php $this->load->view("admin/_layouts/modal.php") ?>
    </body>
</html>