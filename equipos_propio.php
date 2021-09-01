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
			<h2>Lista de Equipos<a href="addequipo.php" class="btn btn-primary pull-right">Agregar Equipo</a></h2>

                     
			<?php

if (empty($_GET['alert'])) {
  echo "";
} elseif ($_GET['alert'] == 1) {
  echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Equipo Agregado correctamente.
	  </div>";
} elseif ($_GET['alert'] == 2) {
  echo "<div class='alert alert-warning alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Equipo modificado correcamente.
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
  }
?>
			<div class="box box-primary">
				<div class="box-body">
					<div class="table-responsive">
						<table id="mitabla" class="table table-bordered table-striped">
							<thead>
								<tr style="color:white; background-color:#6082b4">
									<th>No</th>
									<th>TIPO</th>
									<th>MODELO</th>
									<th>SERIAL</th>
									<th>FUNCIONARIO</th>
									<th>AREA</th>
									<th>ESTADO</th>
									<th>ACCIONES</th>
								</tr>
							</thead>
							<?php
							$sql = mysqli_query($con, "SELECT * FROM db_equipos ORDER BY funcionario ASC");

							if (mysqli_num_rows($sql) == 0) {
								echo '<tr><td colspan="8">No hay datos.</td></tr>';
							} else {
								$no = 1;
								while ($row = mysqli_fetch_assoc($sql)) {
									echo '
            <tbody>
						<tr>
							<td>' . $no . '</td>
							<td>' . $row['tipo'] . '</td>
							<td>' . $row['modelo'] . '</td>
							<td>' . $row['serial'] . '</td>
							<td><a href="vistaequipo.php?id=' . $row['serial'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $row['funcionario'] . '</a></td>
                            <td>' . $row['area'] . '</td>
							<td>';
									if ($row['estado'] == 'ENTREGADO') {
										echo '<span class="label label-success">ENTREGADO</span>';
									} else if ($row['estado'] == 'DISPONIBLE') {
										echo '<span class="label label-info">DISPONIBLE</span>';
									} else if ($row['estado'] == '3') {
										echo '<span class="label label-warning">Outsourcing</span>';
									}
									echo '
							</td>
							<td>

								<a href="editequipo.php?id=' . $row['serial'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="acciones/eliminar.php?aksi=delete&nik='.$row['serial'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['serial'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
            </tr>
            </tbody>
						';
									$no++;
								}
							}
							?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#mitabla').DataTable();
		});
	</script>
	<script src="tabla/jquery.min.js"></script>
	<script src="tabla/jquery2.min.js"></script>

</body>

</html>