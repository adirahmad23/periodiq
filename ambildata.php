<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
include_once "proses/koneksi.php";
$kon = new Koneksi();

$data = $kon->kueri("SELECT * FROM komp2 ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "template/header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once  "template/sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Table Kompresor 2</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="comtainer-fluid">

                        <!-- Content Row -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kompresor 2</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>Tanggal Waktu</th>
                                                <th>Getaran / Menit</th>
                                                <!-- <th>Piezo</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach ($data as $row) { ?>
                                                <tr>
                                                    <td><?= $no;?></td>
                                                    <td><?= $row['date']?></td>
                                                    <td><?= $row['getar']?> / Menit</td>
                                                </tr>
                                              
                                            <?php   $no++; } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include_once  "template/fotter.php" ?>
</body>

</html>