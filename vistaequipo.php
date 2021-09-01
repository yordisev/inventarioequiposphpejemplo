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


	<style>
		.content {
			margin-top: 30px;
		}
	</style>

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php"); ?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar equipo</h2>

			<?php
			$id = mysqli_real_escape_string($con, (strip_tags($_GET["id"], ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM db_equipos WHERE serial='$id'");
			if (mysqli_num_rows($sql) == 0) {
				header("Location: index.php");
			} else {
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<?php

			if (empty($_GET['alert'])) {
				echo "";
			} elseif ($_GET['alert'] == 1) {
				echo "<div class='alert alert-danger alert-dismissable'>
		   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		   <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
		  Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.
		 </div>";
			} elseif ($_GET['alert'] == 2) {
				echo "<div class='alert alert-success alert-dismissable'>
		   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		   <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
		 Has salido con éxito.
		 </div>";
			}
			?>

			<div class="box box-primary">
				<form class="form-horizontal" action="acciones/editar.php" method="post">
					<div class="box-body">
						<div class="form-group">
							<div class="col-sm-3">
								<label>TIPO</label>
								<input type="text" name="tipo" class="form-control" value="<?php echo $row['tipo']; ?>" readonly>
							</div>
							<div class="col-sm-3">
								<label>MARCA</label>
								<input type="text" name="marca" class="form-control" value="<?php echo $row['marca']; ?>" readonly>
							</div>
							<div class="col-sm-3">
								<label>MODELO</label>
								<input type="text" name="modelo" class="form-control" value="<?php echo $row['modelo']; ?>" readonly>
							</div>
							<div class="col-sm-3">
								<label>SERIAL</label>
								<input type="text" name="serial" class="form-control" value="<?php echo $row['serial']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label>PROCESADOR</label>
								<input type="text" name="procesador" class="form-control" value="<?php echo $row['procesador']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>DISCO DURO</label>
								<input type="text" name="disco" class="form-control" value="<?php echo $row['disco']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>MEMORIA RAM</label>
								<input type="text" name="memoria" class="form-control" value="<?php echo $row['memoria']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label>PANTALLA</label>
								<input type="text" name="pantalla" class="form-control" value="<?php echo $row['pantalla']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>TECLADO</label>
								<input type="text" name="teclado" class="form-control" value="<?php echo $row['teclado']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>MOUSE</label>
								<input type="text" name="mouse" class="form-control" value="<?php echo $row['mouse']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label>PROCEDENCIA</label>
								<input type="text" name="procedencia" class="form-control" value="<?php echo $row['procedencia']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>SECCIONAL</label>
								<input type="text" name="seccional" class="form-control" value="<?php echo $row['seccional']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>MUNICIPIO</label>
								<input type="text" name="municipio" class="form-control" value="<?php echo $row['municipio']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<label>FUNCIONARIO</label>
								<input type="text" name="funcionario" class="form-control" value="<?php echo $row['funcionario']; ?>" readonly>
							</div>
							<div class="col-sm-6">
								<label>AREA</label>
								<input type="text" name="area" class="form-control" value="<?php echo $row['area']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label>ESTADO</label>
								<input type="text" name="estado" class="form-control" value="<?php echo $row['estado']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>SISTEMA OPERATIVO</label>
								<input type="text" name="sistemaoperativo" class="form-control" value="<?php echo $row['sistemaoperativo']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>NOMBRE DEL EQUIPO</label>
								<input type="text" name="nombrepc" class="form-control" value="<?php echo $row['nombrepc']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">FUNCIONARIO TIC</label>
							<div class="col-sm-4">
								<input type="text" name="entregadopor" class="form-control" value="<?php echo $row['entregadopor']; ?>" readonly>
							</div>
						</div>
					</div>
				</form>

			</div>
			<div class="box-footer">
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#add-stock">AÑADIR COMENTARIO</a>
						<a href="equipos.php" class="btn btn-danger">Atras</a>
					</div>
				</div>
			</div><!-- /.box footer -->
			<table class="table table-bordered table-striped table-hover">
				<tr style="color:white; background-color:#6082b4">
					<th class='text-center' colspan=5>HISTORIAL DE COMENTARIO</th>
				</tr>
				<tr class='text-center' style="color:white; background-color:#6082b4">
					<th class="center">N</th>
					<th class="center">SERIAL</th>
					<th class="center">USUARIO</th>
					<th class="center">COMENTARIO</th>
					<th class="center">FECHA DE COMENTARIO</th>
				</tr>
				<?php




				$no = 1;
				$query = mysqli_query($con, "SELECT serial, usuario, comentario, fechacomentario  FROM db_comentarios WHERE serial='$_GET[id]'")
					or die('error: ' . mysqli_error($con));
				while ($data = mysqli_fetch_assoc($query)) {
					echo '
                      <tr>
                        <td width="30" class="center">' . $no . '</td>
                        <td width="80" class="center">' . $data['serial'] . '</td>
                        <td width="80" class="center">' . $data['usuario'] . '</td>
						<td width="80" class="center">' . $data['comentario'] . '</td>
						<td width="80" class="center">' . $data['fechacomentario'] . '</td>
                      </tr>
                      ';
					$no++;
				}
				?>
			</table>
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@ MODAL DE COMENTARIO @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<form class="form-horizontal" action="acciones/insertcomentario.php" method="POST">
				<!-- Modal -->
				<div id="add-stock" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div style="color:white; background-color:#6082b4" class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h4 class="modal-title">Agregar Comentario</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<!-- <label class="col-sm-4 control-label"><b>SERIAL</b></label> -->
									<div class="col-sm-4">
										<input type="hidden" name="serial" class="form-control" value="<?php echo $row['serial']; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<!-- <label class="col-sm-4 control-label"><b>USUARIO</b></label> -->
									<div class="col-sm-4">
										<input type="hidden" name="usuario" class="form-control" value="<?php echo $login_session; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<textarea rows="5" cols="80" name="comentario" required></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button name="insert" type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>