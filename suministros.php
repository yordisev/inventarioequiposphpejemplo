<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="tabla/bootstrap4.min.css">

	<style>
		.content {
			margin-top: 30px;
		}
	</style>

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php'); ?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Lista de Suministros<a href="addsuministros.php" class="btn btn-primary pull-right">Agregar Suministro</a></h2>

                     
			<?php

if (empty($_GET['alert'])) {
  echo "";
} elseif ($_GET['alert'] == 1) {
  echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Suministro Agregado correctamente.
	  </div>";
} elseif ($_GET['alert'] == 2) {
  echo "<div class='alert alert-warning alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Suministro modificado correcamente.
	  </div>";
} elseif ($_GET['alert'] == 3) {
  echo "<div class='alert alert-danger alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	 Error no se pudo agregar el equipo
	  </div>";
}elseif ($_GET['alert'] == 4) {
  echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Este Numero de serial ya esta agregado
	  </div>";
}elseif ($_GET['alert'] == 5) {
	echo "<div class='alert alert-danger alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		  <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
		 Equipo eliminado Correctamente
		</div>";
  }elseif ($_GET['alert'] == 6) {
	echo "<div class='alert alert-success alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		  <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
		 Comentario Agregado Correctamente
		</div>";
  }
?>
			<div class="box box-primary">
				<div class="box-body">
					<div class="table-responsive">
					<?php
					$html['Entregado'] = '<span class="label label-primary">Entregado</span>';    
					$html['Disponible'] = '<span class="label label-success">Disponible</span>';
    $salida = "";
    $query = "SELECT * FROM db_suministros";
    if (isset($_POST['consulta'])) {
    	$q = $con->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM db_suministros WHERE suministro LIKE '%$q%' OR marca LIKE '%$q%' OR serial LIKE '%$q%' OR estado LIKE '%$q%' OR ticket LIKE '$q' OR funcionario LIKE '$q' OR area LIKE '$q' ";
    }
    $resultado = $con->query($query);   
?>
                <?php
   if ($resultado->num_rows>0) {
    $salida.="<table id='dataTables1' class='table table-bordered table-striped table-hover'>
    <thead>
    <tr style='background-color:#A3CCFF'>
      <th class='center'>No.</th>
      <th class='center'>SUMINISTRO</th>
      <th class='center'>MARCA</th>
      <th class='center'>SERIAL</th>
      <th class='center'>ESTADO</th>
      <th class='center'>TICKET</th>
      <th class='center'>FUNCIONARIO</th>
      <th class='center'>AREA</th>
      <th class='center'>ACCIONES</th>
    </tr>
  </thead>

    <tbody>";
    $no = 1;
    while ($data = $resultado->fetch_assoc()) {
        $salida.='<tr>
        <td width="30" class="center">' . $no . '</td>
        <td width="80" class="center">' . $data['suministro'] . '</td>
        <td width="80" class="center">' . $data['marca'] . '</td>
        <td width="80" class="center">' . $data['serial'] . '</td>
		<td width="80" class="center">' . $html[$data['estado']] . '</td>
        <td width="80" class="center">' . $data['ticket'] . '</td>
        <td width="100" class="center"><a href="vistasuministros.php?id=' . $data['serial'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $data['funcionario'] . '</a></td>
        <td width="80" class="center">' . $data['area'] . '</td>
        <td width="80" class="center">

          <a href="editsuministro.php?id=' . $data['serial'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
          
          <a href="modules/suministros/proses.php?act=delete&id=' . $data['serial'] . '" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ' . $data['serial'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        </td>
      </tr>';
                $no++;
    }
    $salida.="</tbody></table>";
}else{
    $salida.="NO HAY DATOS :(";
}
echo $salida;

$con->close();
        ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#dataTables1').DataTable();
		});
	</script>
	<script src="tabla/jquery.min.js"></script>
	<script src="tabla/jquery2.min.js"></script>

</body>

</html>