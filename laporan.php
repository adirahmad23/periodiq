<?php 
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
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
                        <h1 class="h3 mb-0 text-gray-800">Cetak Laporan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="comtainer-fluid">

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Sebelum</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <!-- Formulir filter tanggal -->
                                            <form method="get" action="cetak1.php" class="form-inline">
                                                <div class="form-group">
                                                    <input type="date" id="filterStartDate" name="filterStartDate" class="form-control" required value="<?php echo $filterStartDate; ?>">
                                                    <input type="time" id="filterStartTime" name="filterStartTime" class="form-control" required value="<?php echo $filterStartTime; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="filterEndDate" class="ml-2 mr-2">-</label>
                                                    <input type="date" id="filterEndDate" name="filterEndDate" class="form-control" required value="<?php echo $filterEndDate; ?>">
                                                    <input type="time" id="filterEndTime" name="filterEndTime" class="form-control" required value="<?php echo $filterEndTime; ?>">
                                                </div>

                                                <button type="submit" class="btn btn-primary ml-2">Cetak</button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Sesudah</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <!-- Formulir filter tanggal -->
                                            <form method="get" action="cetak2.php" class="form-inline">
                                                <div class="form-group">
                                                    <input type="date" id="filterStartDate" name="filterStartDate" class="form-control" required value="<?php echo $filterStartDate; ?>">
                                                    <input type="time" id="filterStartTime" name="filterStartTime" class="form-control" required value="<?php echo $filterStartTime; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="filterEndDate" class="ml-2 mr-2">-</label>
                                                    <input type="date" id="filterEndDate" name="filterEndDate" class="form-control" required value="<?php echo $filterEndDate; ?>">
                                                    <input type="time" id="filterEndTime" name="filterEndTime" class="form-control" required value="<?php echo $filterEndTime; ?>">
                                                </div>

                                                <button type="submit" class="btn btn-primary ml-2">Cetak</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
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