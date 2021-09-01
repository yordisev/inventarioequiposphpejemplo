<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Usuarios</title>
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
			<h2>Lista de Usuarios<a href="registrate.php" class="btn btn-primary pull-right">Agregar Usuario</a></h2>
			<?php

			if (empty($_GET['alert'])) {
				echo "";
			} elseif ($_GET['alert'] == 1) {
				echo "<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	   Usuario Agregado correctamente.
	  </div>";
			} elseif ($_GET['alert'] == 2) {
				echo "<div class='alert alert-warning alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
        El usuario ya se encuentra registrado.
	  </div>";
			} elseif ($_GET['alert'] == 3) {
				echo "<div class='alert alert-danger alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
	 Error no se pudo agregar el Usuario
	  </div>";
			}
			?>
			<div class="box box-primary">
				<div class="box-body">
					<!-- form start -->
					<form role="form" class="form-horizontal" action="acciones/registrousuario.php" method="post">
						<div class="form-group">
							<div class="col-sm-4">
								<label>Nombre de usuario</label>
								<input type="text" name="usuario" class="form-control" required>
							</div>
							<div class="col-sm-4">
								<label>Contraseña</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<div class="col-sm-4">
								<label>Repite Contraseña</label>
								<input type="password" name="password2" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label>Nombres</label>
								<input type="text" name="nombres" class="form-control" required>
							</div>
							<div class="col-sm-4">
								<label>Apellidos</label>
								<input type="text" name="apellidos" class="form-control" required>
							</div>
							<div class="col-sm-4">
								<label>ESTADO</label>
								<select name="estado" class="form-control">
									<option value=""> ----- </option>
									<option value="ACTIVO">ACTIVO</option>
									<option value="INACTIVO">INACTIVO</option>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-4">
								<input type="submit" class="btn btn-primary btn-submit" name="Guardaru" value="Guardar">
								<a href="usuarios.php" class="btn btn-danger btn-reset">Atras</a>
							</div>
						</div>

						<?php if (!empty($errores)) : ?>
							<div class="error">
								<ul>
									<?php echo $errores; ?>
								</ul>
							</div>
						<?php endif; ?>
					</form>

					<center>
						<p class="box-footer">
							¿ ya tienes cuenta?
							<a href="index.php">Iniciar sesion</a>
						</p>
					</center>

				</div><!-- /.box -->

			</div>
		</div>
</body>