<?php session_start();
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
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
			<h2>AGREGAR EQUIPO</h2>
			
			<section>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<form class="form-horizontal" action="acciones/insertar.php" method="post">
							<div class="box-body">
								<div class="form-group">
									<div class="col-sm-3">
										<label>TIPO</label>
										<select name="tipo" class="form-control">
											<option value=""> ----- </option>
											<option value="ESCRITORIO">ESCRITORIO</option>
											<option value="PORTATIL">PORTATIL</option>
										</select>
										</div>
										<div class="col-sm-3">
										<label>MARCA</label>
										<select name="marca" class="form-control">
											<option value=""> ----- </option>
											<option value="LENOVO">LENOVO</option>
											<option value="SAMSUNG">SAMSUNG</option>
										</select>
                                    </div>
                                    <div class="col-sm-3">
										<label>MODELO</label>
										<select name="modelo" class="form-control">
											<option value=""> ----- </option>
											<option value="X1 CARBON">X1 CARBON</option>
											<option value="10MY">10MY</option>
										</select>
										</div>
										<div class="col-sm-3">
										<label>SERIAL</label>
										<input type="text" name="serial" class="form-control" placeholder="SERIAL" required>
									</div>
								</div>
								<div class="form-group">
                                <div class="col-sm-4">
										<label>PROCESADOR</label>
										<select name="procesador" class="form-control">
											<option value=""> ----- </option>
											<option value="INTEL I3">INTEL I3</option>
											<option value="INTEL I5">INTEL I5</option>
											<option value="INTEL I7">INTEL I7</option>
											<option value="AMD">AMD</option>
										</select>
										</div>
										<div class="col-sm-4">
										<label>DISCO DURO</label>
										<select name="disco" class="form-control">
											<option value=""> ----- </option>
											<option value="250 GB">250 GB</option>
											<option value="500 GB">500 GB</option>
											<option value="1 TB">1 TB</option>
										</select>
                                    </div>
                                    <div class="col-sm-4">
										<label>MEMORIA RAM</label>
										<select name="memoria" class="form-control">
											<option value=""> ----- </option>
											<option value="4 GB">4 GB</option>
											<option value="8 GB">8 GB</option>
											<option value="16 GB">16 GB</option>
										</select>
										</div>	
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label>PANTALLA</label>
										<input type="text" name="pantalla" class="form-control" placeholder="PANTALLA" required>
									</div>
                                <div class="col-sm-4">
										<label>TECLADO</label>
										<input type="text" name="teclado" class="form-control" placeholder="TECLADO" required>
										</div>
										<div class="col-sm-4">
										<label>MOUSE</label>
										<input type="text" name="mouse" class="form-control" placeholder="MOUSE" required>
                                    </div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label>PROCEDENCIA</label>
										<select name="procedencia" class="form-control">
											<option value=""> ----- </option>
											<option value="PROPIO">PROPIO</option>
											<option value="RENTADO">RENTADO</option>
										</select>
									</div>
                                <div class="col-sm-4">
										<label>SECCIONAL</label>
										<select name="seccional" class="form-control">
											<option value=""> ----- </option>
											<option value="NACIONAL">NACIONAL</option>
											<option value="ATLANTICO">ATLANTICO</option>
										</select>
										</div>
										<div class="col-sm-4">
										<label>MUNICIPIO</label>
										<select name="municipio" class="form-control">
											<option value=""> ----- </option>
											<option value="BARRANQUILLA">BARRANQUILLA</option>
											<option value="NACIONAL">NACIONAL</option>
										</select>
                                    </div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<label>FUNCIONARIO</label>
										<select class="form-control" name="funcionario" required>
                    <option value=""></option>
                    <?php
                    $query = mysqli_query($con, "SELECT funcionario FROM db_funcionarios");

                    if (isset($_POST['funcionario'])) {
                      $funcionario = $_POST['funcionario'];
                      echo $funcionario;
                    }
                    ?>
                    <?php
                    while ($db_funcionarios = mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $db_funcionarios['funcionario'] ?>"> <?php echo $db_funcionarios['funcionario'] ?> </option>
                    <?php
                    }
                    ?>
                  </select>
									</div>
                                <div class="col-sm-6">
										<label>AREA</label>
										<input type="text" name="area" class="form-control" placeholder="AREA" required>
										</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label>ESTADO</label>
										<select name="estado" class="form-control">
											<option value=""> ----- </option>
											<option value="ENTREGADO">ENTREGADO</option>
											<option value="DISPONIBLE">DISPONIBLE</option>
										</select>
									</div>
                                <div class="col-sm-4">
										<label>SISTEMA OPERATIVO</label>
										<select name="sistemaoperativo" class="form-control">
											<option value=""> ----- </option>
											<option value="WINDOWS 7">WINDOWS 7</option>
											<option value="WINDOWS 10">WINDOWS 10</option>
										</select>
										</div>
										<div class="col-sm-4">
										<label>NOMBRE DEL EQUIPO</label>
										<input type="text" name="nombrepc" class="form-control" placeholder="NOMBRE DEL EQUIPO" required>
                                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">FUNCIONARIO TIC</label>
									<div class="col-sm-4">
									<input type="text" name="entregadopor" class="form-control" placeholder="ENTREGADO POR" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-4">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
										<a href="equipos.php" class="btn btn-sm btn-danger">Cancelar</a>
									</div>
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>

		</div>
	</div>


</body>

</html>