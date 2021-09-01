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
            <form role="form" class="form-horizontal" action="acciones/insertarsuministro.php" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Suministro</label>
                <div class="col-sm-4">
                  <select class="form-control" name="suministro"  autocomplete="off" required>
                    <option value=""></option>
                    <option value="Telefono">Telefono</option>
                    <option value="Teclado">Teclado</option>
                    <option value="Mouse">Mouse</option>
                    <option value="Convertidor">Convertidor</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Marca</label>
                <div class="col-sm-4">
                  <select  class="form-control" name="marca"  autocomplete="off" required>
                    <option value=""></option>
                    <option value="Logitech">Logitech</option>
                    <option value="Samsung">Samsung</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Serial</label>
                <div class="col-sm-4">
                  <input type="text" name="serial" class="form-control" placeholder="Serial" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Estado</label>
                <div class="col-sm-4">
                  <select class="form-control" name="estado"  autocomplete="off" required>
                    <option value=""></option>
                    <option value="Entregado">Entregado</option>
                    <option value="Disponible">Disponible</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Ticket</label>
                <div class="col-sm-3">
                  <input type="text" name="ticket" class="form-control" placeholder="Ticket" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Funcionario</label>
                <div class="col-sm-4">
                  <select class="form-control" name="funcionario"  autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query = mysqli_query($con, "SELECT funcionario FROM db_equipos");

                    if (isset($_POST['funcionario'])) {
                      $funcionario = $_POST['funcionario'];
                      echo $funcionario;
                    }
                    ?>
                    <?php
                    while ($db_equipos = mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $db_equipos['funcionario'] ?>"> <?php echo $db_equipos['funcionario'] ?> </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Area</label>
                <div class="col-sm-4">
                  <select class="form-control" name="area"  autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query = mysqli_query($con, "SELECT DISTINCT area FROM db_equipos");

                    if (isset($_POST['area'])) {
                      $area = $_POST['area'];
                      echo $area;
                    }
                    ?>
                    <?php
                    while ($db_equipos = mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $db_equipos['area'] ?>"> <?php echo $db_equipos['area'] ?> </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de ingreso</label>
                <div class="col-sm-3">
                  <input type="date" name="fechai" class="form-control" placeholder="Fecha de ingreso" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de Entrega</label>
                <div class="col-sm-3">
                  <input type="date" name="fechae" class="form-control" placeholder="Fecha de Entrega" required>
                </div>
              </div>
              <!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                    <a href="?module=suministros" class="btn btn-default btn-reset">Cancelar</a>
                  </div>
                </div>
              </div><!-- /.box footer -->
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