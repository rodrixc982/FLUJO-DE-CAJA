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

  <title>Gestionar la deuda</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require 'sidebar.php'; 

// Si se ha enviado el formulario para agregar una nueva deuda
if(isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $jumlah = $_POST['jumlah'];
    $tgl_hutang = $_POST['tgl_hutang'];
    $penghutang = $_POST['penghutang'];
    $alasan = $_POST['alasan'];

    // Preparar la consulta SQL para insertar datos en la tabla hutang
    $query = "INSERT INTO hutang (jumlah, tgl_hutang, penghutang, alasan) VALUES ('$jumlah', '$tgl_hutang', '$penghutang', '$alasan')";

    // Ejecutar la consulta
    if(mysqli_query($koneksi, $query)) {
        // Redireccionar a esta misma página para evitar la reenviación del formulario al recargar
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // Si hay algún error al ejecutar la consulta, mostrar un mensaje de error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

      <!-- Main Content -->
      <div id="content">
      
<?php require 'navbar.php'; ?>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabla de deudas</h1>
<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Deuda</i></button><br>
          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Deuda de la semana</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Encabezado desplegable:</div>
                      <a class="dropdown-item" href="#">Accion</a>
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
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Encabezado desplegable:</div>
                      <a class="dropdown-item" href="#">Accion</a>
                      <a class="dropdown-item" href="#">Otra acción</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Algo más aquí</a>
                    </div>
                  </div>
                </div>
             
             <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Ingreso de Caja
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Gasto de Caja
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
                <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de cuentas por pagar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
          <th>Número de secuencia</th>
                      <th>Suma</th>
                      <th>Fecha</th>
                      <th>Razón</th>
                      <th>Deudores</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
          <th>Número de secuencia</th>
                      <th>Suma</th>
                      <th>Fecha</th>
                      <th>Razón</th>
                      <th>Deudores</th>
                      <th>Acción</th>
                    </tr>
                  </tfoot>
                  <tbody>
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
          <td><?=$no++?></td>
                      <td><?=$data['jumlah']?></td>
                      <td><?=$data['tgl_hutang']?></td>
                      <td><?=$data['alasan']?></td>
                      <td><?=$data['penghutang']?></td>
            <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Modificar datos de cuentas por pagar</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-hutang.php" method="get">

<?php
$id = $data['id_hutang']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM hutang WHERE id_hutang='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_hutang" value="<?php echo $row['id_hutang']; ?>">

<div class="form-group">
<label>Suma</label>
<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
</div>

<div class="form-group">
<label>Fecha</label>
<input type="date" name="tgl_hutang" class="form-control" value="<?php echo $row['tgl_hutang']; ?>">      
</div>

<div class="form-group">
<label>Razón</label>
<input type="text" name="alasan" class="form-control" value="<?php echo $row['alasan']; ?>">      
</div>

<div class="form-group">
<label>Deudores</label>
<input type="text" name="penghutang" class="form-control" value="<?php echo $row['penghutang']; ?>">      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Cambio</button>
<a href="hapus-hutang.php?id_hutang=<?=$row['id_hutang'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Enjugar</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Fuera</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



<!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Aumentar la deuda</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="modal-body">
        Suma : 
         <input type="text" class="form-control" name="jumlah">
        Fecha : 
         <input type="date" class="form-control" name="tgl_hutang">
         Penghutang : 
         <input type="text" class="form-control" name="penghutang">
        Razón : 
         <input type="text" class="form-control" name="alasan">
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit">Agregar</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>

    </div>
  </div>


<?php               
} 
?>
  </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
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

