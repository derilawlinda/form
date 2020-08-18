<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Approval Absensi</title>
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
                        <br>                        
                        <!-- DataTables -->
                        <table id="project-list" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Status</th>
                                    <th>OFT</th>
                                    <th>OFJ</th>
                                    <th>ORC</th>
                                    <th>ORT</th>
                                    <th>MVR</th>
                                    <th>MTR</th>
                                    <th>DK</th>
                                    <th>CT</th>
                                    <th>IZN</th>
                                    <th>NA</th>
                                    <th>Approval</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>      
                    </div>
            <!-- /.container-fluid -->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view("admin/_layouts/footer.php") ?>
                </footer>
            </div>
        </div>



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

        

        <?php $this->load->view("admin/_layouts/js.php") ?>  

    </body>
 
    <script type="text/javascript">
        $(document).ready(function() {
            var tahun = <?php echo($tahun) ?>;
            var bulan =  <?php echo($bulan) ?>;
            var data;
            var rowIdx;
            
            var table = $('#project-list').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url : "getProjectStatusData",
                    type : 'GET'
                },
                "columns": [
                    {data: "project_nickname",
                    render : function(data,type){
                        var url = "<?=base_url()?>index.php/Rekapabsen/absensiApproval?"
                        var params = $.param( {
                                bulan : bulan ,
                                tahun : tahun,
                                project : data, 
                                is_get : true
                            } );
                        var urlparams = url+params;
                        return "<a target='_blank' href='"+urlparams+"'>"+data+"</a>";
                    }},
                    {data:"status",
                     render : function(data, type) {
                         if(data == 1){
                            return "Approved by Admin Lokasi";
                         }else if(data == 2){
                            return "Approved by Koordinator";
                         }else if(data == 3){
                            return "Approved by User";
                         }else if(data == 4){
                            return "Rejected by User";
                         }else if(data == 99){
                            return "Approved by System";
                         }else{
                             return "-";
                         }
                        }
                     },
                    {data:"OFT", "orderable": false},
                    {data:"OFJ", "orderable": false},
                    {data:"ORC", "orderable": false},
                    {data:"ORT", "orderable": false},
                    {data:"MVR", "orderable": false},
                    {data:"MTR", "orderable": false},
                    {data:"DK", "orderable": false},
                    {data:"CT", "orderable": false},
                    {data:"IZN", "orderable": false},
                    {data:"NA", "orderable": false},
                    {data:null, width: 150, defaultContent: "<button class='btn-sm btn-success float-left'>Approve</button> <button class='btn-sm btn-danger float-right'>Reject</button>"}
                ]
            });

            $('#project-list tbody').on( 'click', 'button', function () {
                data = table.row( $(this).parents('tr') ).data();
                rowIdx = table.row( $(this).parents('tr') ).index();

                if($(this).text() == "Approve"){
                    $.post("<?=base_url()?>index.php/Rekapabsen/approveRekapAbsen", 
                    {
                        project_nickname : $.trim(data["project_nickname"]),
                        bulan : bulan,
                        tahun : tahun
                    }
                    ,function() {
                        $("#modalDialog .modal-body").html('<p>Data tersimpan</p>');
                        $("#modalDialog").modal();
                        table.cell({row:rowIdx, column:1}).data(3);
                        
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
                    
                }else if($(this).text() == "Reject"){

                    if(data["status"] == 4){
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
                        
                    };
                    
                    

                }
                
            });

            jQuery('#note-text').on('input propertychange paste', function() {
                if($(this).val().length <= 29){
                    $(this).addClass("is-invalid");
                    $("#submitButton").prop("disabled",true);
                }else {
                    $(this).removeClass("is-invalid");
                    $("#submitButton").prop("disabled",false);
                }
            });

            $("#submitButton").click(function(){
                
                $.post("<?=base_url()?>index.php/Rekapabsen/rejectRekapAbsen", 
                    {
                        project_nickname : $.trim(data["project_nickname"]),
                        bulan : bulan,
                        tahun : tahun,
                        notes : $("#note-text").val()
                    }
                    ,function() {
                        $('#noteModal').modal('toggle');
                        table.cell({row:rowIdx, column:1}).data(4);
                        
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

        });
    </script>
</html>