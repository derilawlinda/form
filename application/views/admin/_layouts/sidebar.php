                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php $role = $this->session->userdata('role'); if($role == "admin"){ ?>
                            <div class="sb-sidenav-menu-heading">Super Admin</div>
                            <a class="nav-link" href="<?=base_url()?>admin/UserAccount"
                                ><div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                                User Account</a>
                            <?php } ?>

                            <?php $role = $this->session->userdata('role'); if($role == "admin" || $role == "hr"){ ?>
                            <div class="sb-sidenav-menu-heading">HR & GA</div>
                            <a class="nav-link" href="<?=base_url()?>admin/Confirmed"
                                ><div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                Confirmed</a>
                            <a class="nav-link" href="<?=base_url()?>admin/Request"
                                ><div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Request</a>
                            
                            <a class="nav-link" href="<?=base_url()?>rekapabsen/approve"
                                ><div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Approve Rekap Absen</a>

                            <a class="nav-link" href="<?=base_url()?>absen/laporan"
                                ><div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Laporan Absen Lokasi</a>

                            
							
                            <!--<a class="nav-link" href="<?=base_url()?>admin/survey"
                                ><div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Laporan Survey Covid19</a>-->
                            <?php } ?>

                            <?php if($role == "adminlokasi" || $role == "admin"){ ?>
                            <div class="sb-sidenav-menu-heading">Admin Lokasi</div>
                            <!-- <a class="nav-link" href="<?=base_url()?>absen/list"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                List Absen</a> -->
                            <a class="nav-link" href="<?=base_url()?>rekapabsen"
                                ><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Form Rekap Absen</a>
                            <a class="nav-link" href="<?=base_url()?>rekapabsen/upload"
                                ><div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Upload Rekap Absen</a>

                            <a class="nav-link" href="<?=base_url()?>rekapabsen/tabelAbsensi"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabel Absensi Lokasi</a>

                            <a class="nav-link" href="<?=base_url()?>rekapabsen/projectSchedule"
                                ><div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Project Schedule</a>
                            <?php } ?>

                            <?php if($role == "adminlokasi" || $role == "admin" || $role == "user"){ 
                            if($role == "user"){echo '<div class="sb-sidenav-menu-heading">User Lokasi</div>';} ?>
                            <a class="nav-link" href="<?=base_url()?>absen/approve"
                                ><div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                                Approve Absensi</a>
                            <?php } ?>

                            
                            <?php if($role == "crew" || $role == "admin"){ ?>
                            <div class="sb-sidenav-menu-heading">Pekerja</div>
                            <a class="nav-link" href="<?=base_url()?>absen"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data Pekerja</a>
                            <a class="nav-link" href="<?=base_url()?>absen/harian"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Absen Harian</a>
                            <a class="nav-link" href="<?=base_url()?>absen/batch"
                                ><div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Absen Batch</a>
                            <?php } ?>
                    </div>
                </nav>