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

  <title>Panel de control - Administrador</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require ('sidebar.php'); ?>   
     <!-- Main Content -->
      <div id="content">

<?php require ('navbar.php'); ?> 

		        <!-- Begin Page Content -->
        <div class="container-fluid">
   <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">FUENTE DE INGRESO DE CAJA</h6>
                </div>
                <div class="card-body">
				<?php
				$namasumber1 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 1 ");
				$sumbern1= mysqli_fetch_assoc($namasumber1);
				
				$namasumber2 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 2 ");
				$sumbern2= mysqli_fetch_assoc($namasumber2);
				
				$namasumber3 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 3 ");
				$sumbern3= mysqli_fetch_assoc($namasumber3);
				
				$namasumber4 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 4 ");
				$sumbern4= mysqli_fetch_assoc($namasumber4);
				
				$namasumber5 = mysqli_query($koneksi,"SELECT * FROM `sumber` where id_sumber= 5 ");
				$sumbern5= mysqli_fetch_assoc($namasumber5);
				
				$hasil1=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 1");
				while ($jumlah1=mysqli_fetch_array($hasil1)){
				$arrayhasil1[] = $jumlah1['jumlah'];
				}
				if(isset($arrayhasil1) && is_array($arrayhasil1)) {
    // Suma los elementos del array
    $jumlahhasil1 = array_sum($arrayhasil1);
} else {
    // Maneja el caso en que $arrayhasil1 no esté definido o no sea un array
    $jumlahhasil1 = 0; // o cualquier otro valor predeterminado que desees
}
				
				$hasil2=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 2");
				while ($jumlah2=mysqli_fetch_array($hasil2)){
				$arrayhasil2[] = $jumlah2['jumlah'];
				}
				// Asegúrate de que $arrayhasil2 esté definido y sea un array antes de usarlo
if(isset($arrayhasil2) && is_array($arrayhasil2)) {
    // Suma los elementos del array
    $jumlahhasil2 = array_sum($arrayhasil2);
} else {
    // Maneja el caso en que $arrayhasil2 no esté definido o no sea un array
    $jumlahhasil2 = 0; // O cualquier otro valor predeterminado que desees
}
				
				$hasil3=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 3");
				while ($jumlah3=mysqli_fetch_array($hasil3)){
				$arrayhasil3[] = $jumlah3['jumlah'];
				}
				// Asegúrate de que $arrayhasil3 esté definido y sea un array antes de usarlo
if(isset($arrayhasil3) && is_array($arrayhasil3)) {
    // Suma los elementos del array
    $jumlahhasil3 = array_sum($arrayhasil3);
} else {
    // Maneja el caso en que $arrayhasil3 no esté definido o no sea un array
    $jumlahhasil3 = 0; // o cualquier otro valor predeterminado que desees
}
				
				$hasil4=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 4");
				while ($jumlah4=mysqli_fetch_array($hasil4)){
				$arrayhasil4[] = $jumlah4['jumlah'];
				}
				if(isset($arrayhasil4) && is_array($arrayhasil4)) {
    // Suma los elementos del array
    $jumlahhasil4 = array_sum($arrayhasil4);
} else {
    // Maneja el caso en que $arrayhasil4 no esté definido o no sea un array
    $jumlahhasil4 = 0; // o cualquier otro valor predeterminado que desees
}
				
				$hasil5=mysqli_query($koneksi,"SELECT * FROM pemasukan where id_sumber = 5");
				while ($jumlah5=mysqli_fetch_array($hasil5)){
				$arrayhasil5[] = $jumlah5['jumlah'];
				}
				// Asegúrate de que $arrayhasil5 esté definido y sea un array antes de usarlo
if(isset($arrayhasil5) && is_array($arrayhasil5)) {
    // Suma los elementos del array
    $jumlahhasil5 = array_sum($arrayhasil5);
} else {
    // Maneja el caso en que $arrayhasil5 no esté definido o no sea un array
    $jumlahhasil5 = 0; // o cualquier otro valor predeterminado que desees
}
				
				$sumber1 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='1'");
				$sumber1text = mysqli_num_rows($sumber1);
				$sumber1 = mysqli_num_rows($sumber1);
				$sumber1 = $sumber1 * 10;
				
				$sumber2 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='2'");
				$sumber2text = mysqli_num_rows($sumber2);
				$sumber2 = mysqli_num_rows($sumber2);
				$sumber2 = $sumber2 * 10;
				
				$sumber3 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='3'");
				$sumber3text = mysqli_num_rows($sumber3);
				$sumber3 = mysqli_num_rows($sumber3);
				$sumber3 = $sumber3 * 10;
				
				$sumber4 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='4'");
				$sumber4text = mysqli_num_rows($sumber4);
				$sumber4 = mysqli_num_rows($sumber4);
				$sumber4 = $sumber4 * 10;
				
				$sumber5 = mysqli_query($koneksi,"SELECT id_sumber FROM pemasukan where id_sumber ='5'");
				$sumber5text = mysqli_num_rows($sumber5);
				$sumber5 = mysqli_num_rows($sumber5);
				$sumber5 = $sumber5 * 10;
				
				
				
					$no=1;
				echo '
                  <h4 class="small font-weight-bold">'.$sumbern1['nama'].'<span class="float-right">S/. '.number_format($jumlahhasil1,2,',','.').'</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumber1.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber1text.'  PRODUCTOS REGISTROS</div>
                  </div>
				  <h4 class="small font-weight-bold">'.$sumbern2['nama'].'<span class="float-right">S/. '.number_format($jumlahhasil2,2,',','.').'</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumber2.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber2text.' SERVICIOS REGISTRADOS</div>
                  </div>
				  <h4 class="small font-weight-bold">'.$sumbern4['nama'].'<span class="float-right">S/. '.number_format($jumlahhasil4,2,',','.').'</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width:'.$sumber4.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber4text.' INGRESO NO OPERACIONALES </div>
                  </div>';
				  ?>
                </div>
              </div>
			  </div>
			  
			  
			              <div class="col-lg-6">
			                <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Nota 1</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
				  <?php $catatan1 = mysqli_query($koneksi, "SELECT catatan FROM catatan where id_catatan= 1");
                  $catatan1 = mysqli_fetch_array($catatan1);
				  echo $catatan1['catatan'];
				  ?>
				  </div>
                </div>
              </div>
			                <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                  <h6 class="m-0 font-weight-bold text-primary">Nota 2</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
                  <?php $catatan2 = mysqli_query($koneksi, "SELECT * FROM catatan where id_catatan= 2");
                  $catatan2 = mysqli_fetch_array($catatan2);
				  echo $catatan2['catatan'];
				  ?></div>
                </div>
              </div>
			  </div>
			  
			  
			  
			           <!-- DataTales Example -->
					   <div class="col-xl-8 col-lg-7">
					   <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Añadir</i></button><br>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">CAJA ENTRANTE DE DINERO</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID de ingresos</th>
                      <th>Fecha</th>
                      <th>Dinero</th>
                      <th>Fuente</th>
					  <th>Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID de ingresos</th>
                      <th>Fecha</th>
                      <th>Suma</th>
                      <th>Fuente</th>
                      <th>Acción</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM pemasukan");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['id_pemasukan']?></td>
                      <td><?=$data['tgl_pemasukan']?></td>
                      <td>S/. <?=number_format($data['jumlah'],2,',','.');?></td>
                      <td><?=$data['id_sumber']?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_pemasukan']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Cambiar datos de ingresos</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-pemasukan.php" method="get">

<?php
$id = $data['id_pemasukan']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

<div class="form-group">
<label>Id</label>
<input type="text" name="id_pemasukan" class="form-control" value="<?php echo $row['id_pemasukan']; ?>" disabled>      
</div>

<div class="form-group">
<label>Fecha</label>
<input type="date" name="tgl_pemasukan" class="form-control" value="<?php echo $row['tgl_pemasukan']; ?>">      
</div>

<div class="form-group">
<label>Suma</label>
<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
</div>

<div class="form-group">
<label>Fuente</label>
<?php
if ($row['id_sumber'] == 1){
	$querynama1 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=1");
	$querynama1 = mysqli_fetch_array($querynama1);
} else if ($row['id_sumber'] == 2){
	$querynama2 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=2");
	$querynama2 = mysqli_fetch_array($querynama2);
} else if ($row['id_sumber'] == 3){
	$querynama3 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=3");
	$querynama3 = mysqli_fetch_array($querynama3);
} else if ($row['id_sumber'] == 4){
	$querynama4 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=4");
	$querynama4 = mysqli_fetch_array($querynama4);
}
 else if ($row['id_sumber'] == 5){
	$querynama5 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=5");
	$querynama5 = mysqli_fetch_array($querynama5);
}
?>

<select class="form-control" name='id_sumber'>
<?php 
$queri = mysqli_query($koneksi, "SELECT * FROM sumber");
	$no = 1;
	$noo = 1;
while($querynama = mysqli_fetch_array($queri)){

echo '<option value="'.$no++.'">'.$noo++.'.'.$querynama["nama"].'</option>';
}
?>
</select>     
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Guardar</button>
<a href="hapus-pemasukan.php?id_pemasukan=<?=$row['id_pemasukan'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Eliminar</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
          <h4 class="modal-title">Agregar ingresos</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-pendapatan.php" method="get">
        <div class="modal-body">
		Fecha : 
         <input type="date" class="form-control" name="tgl_pemasukan">
		Suma : 
         <input type="number" class="form-control" name="jumlah">
		Fuente : 
         <select class="form-control" name="sumber">
		 <option value="1" >1. INGRESO CON PRODUCTOS</option>
		 <option value="2" >2. INGRESO CON SERVICIOS</option>
		 <option value="3" >3. INGRESO NO OPERACIONALES</option>
		 </select>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
		<button type="submit" class="btn btn-success" >Agregar</button>
		</form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>