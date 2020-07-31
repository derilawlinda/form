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
                        
				<div class="card mb-3">
					<div class="card-body">
            <p>Download format upload rekap absensi</p><a href="<?=base_url()?>upload/file/FormImportRekapAbsensi.xls" class="btn btn-success">Download</a>
          </div>
        </div>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
                        <form method="post" id="import_form" enctype="multipart/form-data">
                             <p><label>Upload File Excel</label><br>
                             <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                             <br />
                             <input type="submit" id="import" name="import" value="Upload" class="btn btn-info" />
                        </form>
                          <br />
                          <div class="table-responsive" id="customer_data">
                            
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

                      
<script>
$(document).ready(function(){ 

  function load_data(){
    $.ajax({
      url:"<?=base_url()?>index.php/rekapabsen/fetch",
      method:"POST",
      success:function(data){
        $('#customer_data').html(data);
        console.log(data);
      }
    })
  }

  $('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?=base_url()?>index.php/rekapabsen/import",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
        $('#file').val('');
        load_data();
      }
    })
  });

});

</script>