<?php session_start();
include("conexion.php");
?>
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
            <h2>Cambiar Contraseña</h2>
            <?php 
            
			$id = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM usuarios WHERE usuario='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("location: user.php?alert=4");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<div class="box box-primary">
				<div class="box-body">
					<!-- form start -->
					<form role="form" class="form-horizontal" action="acciones/edituser.php" method="post">
						<div class="form-group">
							<div class="col-sm-4">
								<label>Nombre de usuario</label>
								<input type="text" name="usuario" class="form-control" value="<?php echo $row ['usuario']; ?>" readonly>
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
								<input type="text" name="nombres" class="form-control" value="<?php echo $row ['nombres']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>Apellidos</label>
								<input type="text" name="apellidos" class="form-control" value="<?php echo $row ['apellidos']; ?>" readonly>
							</div>
							<div class="col-sm-4">
								<label>ESTADO</label>
								<select name="estado" class="form-control">
                                <option><?php echo $row ['estado']; ?></option>
									<option value="ACTIVO">ACTIVO</option>
									<option value="INACTIVO">INACTIVO</option>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-4">
								<input type="submit" class="btn btn-primary btn-submit" name="editaruser" value="Guardar">
								<a href="usuarios.php" class="btn btn-danger pull-right">Atras</a>
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