<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_layouts/head.php") ?>
        <title>Data User</title>
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
                                <h3>Welcome <?php echo $this->session->userdata('full_name'); ?></h3>
                                <p>Email: <?php echo $this->session->userdata('email'); ?></p>
                                <p>Lokasi: <?php echo $this->session->userdata('sn'); ?></p>
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