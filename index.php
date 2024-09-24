<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

include_once "proses/koneksi.php";
$kon = new Koneksi();

$abc = $kon->kueri("SELECT * FROM tb_kondisi WHERE id = '1'");
$datakondisi = $kon->hasil_data($abc);



if (isset($_POST['sblm'])) {
    $nilai = $_POST['nilaisblm'];
    $user = $_POST['user'];
    $result = $kon->kueri("UPDATE `tb_kondisi` SET `sebelum`='$nilai', `user`='$user' WHERE id = '1' ");

    if ($result  == true) {
        // Redirect to the same page to refresh it
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}


if (isset($_POST['sdh'])) {
    $nilai = $_POST['nilaisdh'];
    $user = $_POST['user'];
    $result = $kon->kueri("UPDATE `tb_kondisi` SET `sesudah`='$nilai' , `user`='$user' WHERE id = '1' ");

    if ($result  == true) {
        // Redirect to the same page to refresh it
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
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
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div> -->

                    <!-- Content Row -->
                    <div class="comtainer-fluid">
                        <div class="row justify-content-center">
                            <!-- Display Getaran -->
                            <div id="getaran" class="col-xl-4 col-md-4 mb-3">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Detak Jantung</div>
                                                <div id="getaran-value" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-heartbeat fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Display Piezo -->
                            <div id="piezo" class="col-xl-4 col-md-4 mb-3">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Tingkat Stress</div>
                                                <div id="suhu-value" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-medkit fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function fetchData() {
                                    $.ajax({
                                        url: 'fetchbar.php', // Replace with the actual PHP script name
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#getaran-value').text(data[0].bpm + ' BPM');


                                        },
                                        error: function(error) {
                                            console.error('Error:', error);
                                        }
                                    });
                                }

                                // Update data every 2 seconds
                                setInterval(fetchData, 2000);

                                // Initial data fetch
                                fetchData();
                            </script>
                            <!-- JavaScript to fetch data -->
                            <script>
                                function fetchDatas() {
                                    $.ajax({
                                        url: 'fetchbar.php', // Replace with the actual PHP script name
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#suhu-value').text(data[0].gsr);


                                        },
                                        error: function(error) {
                                            console.error('Error:', error);
                                        }
                                    });
                                }

                                // Update data every 2 seconds
                                setInterval(fetchDatas, 2000);

                                // Initial data fetch
                                fetchDatas();
                            </script>

                            <!-- Earnings (Monthly) Card Example -->
                            <div id="getaran" class="col-xl-4 col-md-4 mb-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Kontraksi Otot</div>
                                                <div id="getaran-value2" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-user-md fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- JavaScript to fetch data -->
                            <script>
                                function fetchData2() {
                                    $.ajax({
                                        url: 'fetchbar.php', // Replace with the actual PHP script name
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#getaran-value2').text(data[0].emg);

                                        },
                                        error: function(error) {
                                            console.error('Error:', error);
                                        }
                                    });
                                }

                                // Update data every 2 seconds
                                setInterval(fetchData2, 2000);

                                // Initial data fetch
                                fetchData2();
                            </script>


                        </div>
                        <!-- Content Row -->
                        <div class="comtainer-fluid">

                            <!-- Content Row -->

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-warning">Detak Jantung</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="kompre1Chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Tingkat Stress</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="kompre2Chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-success">Kontraksi Otot</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area">
                                                <canvas id="kompre3Chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="comtainer-fluid">

                            <!-- Content Row -->

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Ambil Data Sebelum</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <!-- Formulir filter tanggal -->
                                                <form method="POST" action="" class="form-inline justify-content-center">
                                                    <?php if ($datakondisi['sebelum'] == 0) { ?>
                                                        <input type="hidden" name="nilaisblm" value="1">
                                                        <input type="hidden" name="user" value="<?= $_SESSION['user']; ?>">
                                                    <?php if ($datakondisi['sesudah'] == 1) { ?>
                                                        <input type="submit" class="btn btn-primary btn-lg " name="sblm" value="START" disabled>
                                                    <?php } else { ?>
                                                        <input type="submit" class="btn btn-primary btn-lg " name="sblm" value="START">
                                                    
                                                        <?php } ?>

                                                    <?php } else { ?>
                                                        <input type="hidden" name="nilaisblm" value="0">
                                                        <input type="hidden" name="user" value="0">
                                                        <input type="submit" class="btn btn-danger btn-lg " name="sblm" value="STOP">


                                                    <?php } ?>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Ambi Data Sesudah</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <!-- Formulir filter tanggal -->
                                                <form method="POST" action="" class="form-inline justify-content-center">
                                                    <?php if ($datakondisi['sesudah'] == 0) { ?>
                                                        <input type="hidden" name="nilaisdh" value="1"> 
                                                        <input type="hidden" name="user" value="<?= $_SESSION['user']; ?>">
                                                        <?php if ($datakondisi['sebelum'] == 1) { ?>
                                                        <input type="submit" class="btn btn-primary btn-lg " name="sdh" value="START" disabled>
                                                    <?php } else { ?>
                                                        <input type="submit" class="btn btn-primary btn-lg " name="sdh" value="START">
                                                    
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="nilaisdh" value="0">
                                                        <input type="hidden" name="user" value="0">
                                                        <input type="submit" class="btn btn-danger btn-lg " name="sdh" value="STOP">


                                                    <?php } ?>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>





                </div>
                <div class="comtainer-fluid">
                    <div class="row justify-content-center">
                        <!-- Display Getaran -->
                        <div class="col-xl-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Alert</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Well done!</h4>
                                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                        <hr>
                                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
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