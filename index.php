<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/uang.png">
  <title>Flujo de Caja- Admin</title>

  <!-- Fuentes personalizadas para esta plantilla-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
require ('koneksi.php');
require ('sidebar.php');

$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
$karyawan = mysqli_num_rows($karyawan);

$pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT jumlah FROM pengeluaran where tgl_pengeluaran = CURDATE()");
$pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

$pemasukan_hari_ini = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan where tgl_pemasukan = CURDATE()");
$pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);

$pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan");
while ($masuk = mysqli_fetch_array($pemasukan)) {
    $arraymasuk[] = $masuk['jumlah'];
}
// Asegúrate de que $arraymasuk esté definido y sea un array antes de usarlo
if(isset($arraymasuk) && is_array($arraymasuk)) {
    // Suma los elementos del array
    $jumlahmasuk = array_sum($arraymasuk);
} else {
    // Maneja el caso en que $arraymasuk no esté definido o no sea un array
    $jumlahmasuk = 0; // o cualquier otro valor predeterminado que desees
}

$pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
while ($keluar = mysqli_fetch_array($pengeluaran)) {
    $arraykeluar[] = $keluar['jumlah'];
}
$jumlahkeluar = array_sum($arraykeluar);

$uang = $jumlahmasuk - $jumlahkeluar;

// Para datos del gráfico de área
$sekarang = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE()");
$sekarang = mysqli_fetch_array($sekarang);

$satuhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 1 DAY");
$satuhari = mysqli_fetch_array($satuhari);

$duahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 2 DAY");
$duahari = mysqli_fetch_array($duahari);

$tigahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 3 DAY");
$tigahari = mysqli_fetch_array($tigahari);

$empathari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 4 DAY");
$empathari = mysqli_fetch_array($empathari);

$limahari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 5 DAY");
$limahari = mysqli_fetch_array($limahari);

$enamhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 6 DAY");
$enamhari = mysqli_fetch_array($enamhari);

$tujuhhari = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan WHERE tgl_pemasukan = CURDATE() - INTERVAL 7 DAY");
$tujuhhari = mysqli_fetch_array($tujuhhari);
?>
<!-- Contenido principal -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Alternar barra lateral (barra superior) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <h1> Bienvenido, <?=$_SESSION['nama']?></h1>

        <?php require 'user.php'; ?>

    </nav>
    <!-- Fin de la barra superior -->

    <!-- Contenido de la página de inicio -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Descargar informe</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ingreso De Dinero a Caja
                                    (Hoy)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">S/.<?php
                                    if ($pemasukan_hari_ini !== null && isset($pemasukan_hari_ini['0'])) {
                                        echo number_format($pemasukan_hari_ini['0'], 2, ',', '.');
                                    } else {
                                        echo '0,00';
                                    }
                                    ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    &nbsp CANTIDAD DE INGRESO : S/.
                    <?php
                    echo number_format($jumlahmasuk, 2, ',', '.');
                    ?>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Gasto de Caja
                                    (Hoy)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">S/.<?php
                                    if ($pengeluaran_hari_ini !== null && isset($pengeluaran_hari_ini['0'])) {
                                        echo number_format($pengeluaran_hari_ini['0'], 2, ',', '.');
                                    } else {
                                        echo '0,00';
                                    }
                                    ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    &nbsp CANTIDAD DE GASTO : S/.
                    <?php
                    echo number_format($jumlahkeluar, 2, ',', '.');
                    ?>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dinero restante
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">S/.<?php
                                            echo number_format($uang, 2, ',', '.');
                                            ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="progress progress-sm mr-2">
                            <?php
                            if ($uang < 1) {
                                $warna = 'danger';
                                $value = 0;
                            } else if ($uang >= 1 && $uang < 1000000) {
                                $warna = 'warning';
                                $value = 1;
                            } else {
                                $warna = 'info';
                                $value = $uang / 10000;
                            };

                            ?>
                            <div class="progress-bar bg-<?= $warna ?>" role="progressbar"
                                 style="width: 100%" aria-valuenow="<?= $value ?>" aria-valuemin="0"
                                 aria-valuemax="100"><span><?= $value ?> % </span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registro de Productos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawan ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Ganancias de Caja de  esta semana</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Encabezado desplegable:</div>
                                <a class="dropdown-item" href="#">Acción</a>
                                <a class="dropdown-item" href="#">Otra acción</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Algo más aquí</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Comparación</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Encabezado desplegable:</div>
                                <a class="dropdown-item" href="#">Acción</a>
                                <a class="dropdown-item" href="#">Otra acción</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Algo más aquí</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Ingreso de Dinero a Caja
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i> Gasto de Caja
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cuadro comparativo de ingresos a Caja</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Hoy <span
                                    class="float-right"><?php
                                    if ($sekarang !== null && isset($sekarang['jumlah'])) {
                                        echo 'S/. ' . number_format($sekarang['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($sekarang !== null && isset($sekarang['jumlah'])) {
                                     echo number_format(($sekarang['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($sekarang !== null && isset($sekarang['jumlah'])) {
                                     echo number_format(($sekarang['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Ayer <span
                                    class="float-right"><?php
                                    if ($satuhari !== null && isset($satuhari['jumlah'])) {
                                        echo 'S/. ' . number_format($satuhari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($satuhari !== null && isset($satuhari['jumlah'])) {
                                     echo number_format(($satuhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($satuhari !== null && isset($satuhari['jumlah'])) {
                                     echo number_format(($satuhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">2 Hace días <span
                                    class="float-right"><?php
                                    if ($duahari !== null && isset($duahari['jumlah'])) {
                                        echo 'Rp. ' . number_format($duahari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($duahari !== null && isset($duahari['jumlah'])) {
                                     echo number_format(($duahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($duahari !== null && isset($duahari['jumlah'])) {
                                     echo number_format(($duahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">3 Hace días <span
                                    class="float-right"><?php
                                    if ($tigahari !== null && isset($tigahari['jumlah'])) {
                                        echo 'Rp. ' . number_format($tigahari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($tigahari !== null && isset($tigahari['jumlah'])) {
                                     echo number_format(($tigahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($tigahari !== null && isset($tigahari['jumlah'])) {
                                     echo number_format(($tigahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">4 Hace días <span
                                    class="float-right"><?php
                                    if ($empathari !== null && isset($empathari['jumlah'])) {
                                        echo 'Rp. ' . number_format($empathari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($empathari !== null && isset($empathari['jumlah'])) {
                                     echo number_format(($empathari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($empathari !== null && isset($empathari['jumlah'])) {
                                     echo number_format(($empathari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">5 Hace días <span
                                    class="float-right"><?php
                                    if ($limahari !== null && isset($limahari['jumlah'])) {
                                        echo 'Rp. ' . number_format($limahari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($limahari !== null && isset($limahari['jumlah'])) {
                                     echo number_format(($limahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($limahari !== null && isset($limahari['jumlah'])) {
                                     echo number_format(($limahari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Hace 6 día(s) <span
                                    class="float-right"><?php
                                    if ($enamhari !== null && isset($enamhari['jumlah'])) {
                                        echo 'Rp. ' . number_format($enamhari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($enamhari !== null && isset($enamhari['jumlah'])) {
                                     echo number_format(($enamhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($enamhari !== null && isset($enamhari['jumlah'])) {
                                     echo number_format(($enamhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Hace 7 día(s) <span
                                    class="float-right"><?php
                                    if ($tujuhhari !== null && isset($tujuhhari['jumlah'])) {
                                        echo 'Rp. ' . number_format($tujuhhari['jumlah'], 2, ',', '.');
                                    } else {
                                        echo 'S/. 0,00';
                                    }
                                    ?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php
                                 if ($tujuhhari !== null && isset($tujuhhari['jumlah'])) {
                                     echo number_format(($tujuhhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.') . '%';
                                 } else {
                                     echo '0%';
                                 }
                                 ?>"
                                 aria-valuenow="<?php
                                 if ($tujuhhari !== null && isset($tujuhhari['jumlah'])) {
                                     echo number_format(($tujuhhari['jumlah'] * 100) / $jumlahmasuk, 2, ',', '.');
                                 } else {
                                     echo '0';
                                 }
                                 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <!-- Color System -->
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                Información
                                <div class="text-white-50 small">#4e73df</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-success text-white shadow">
                            <div class="card-body">
                                Éxito
                                <div class="text-white-50 small">#1cc88a</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Advertencia
                                <div class="text-white-50 small">#f6c23e</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body">
                                Peligro
                                <div class="text-white-50 small">#e74a3b</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Acercarse</h6>
                    </div>
                    <div class="card-body">
                        <p>Así es como se ve el panel de control del desarrollador en acción. Muy bien, ¿eh?</p>
                        <p class="mb-0">¡Siéntete libre de explorar y jugar con los datos!</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="text-center my-auto">
            <span>Crisftw <a href="https://startbootstrap.com/">un producto de Rodrixc Tianz Company</a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para partir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
