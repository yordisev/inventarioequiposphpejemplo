<?php session_start();
include("conexion.php");
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
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar equipo</h2>

			<?php
			$id = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM db_suministros WHERE serial='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			
			<div class="box box-primary">
			<form role="form" class="form-horizontal" action="acciones/editarsuministro.php" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Suministro</label>
                <div class="col-sm-4">
                  <select name="suministro" class="form-control">
                    <option value="<?php echo $row['suministro']; ?>"><?php echo $row['suministro']; ?></option>
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
                  <select name="marca" class="form-control">
                    <option value="<?php echo $row['marca']; ?>"><?php echo $row['marca']; ?></option>
                    <option value="Logitech">Logitech</option>
                    <option value="Samsung">Samsung</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Serial</label>
                <div class="col-sm-4">
                  <input type="text" name="serial" class="form-control" value="<?php echo $row['serial']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Estado</label>
                <div class="col-sm-4">
                  <select name="estado" class="form-control">
                    <option value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
                    <option value="Entregado">Entregado</option>
                    <option value="Disponible">Disponible</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Ticket</label>
                <div class="col-sm-3">
                  <input type="text" name="ticket" class="form-control" value="<?php echo $row['ticket']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Funcionario</label>
                <div class="col-sm-4">
                  <select  name="funcionario" class="form-control">
                    <option value="<?php echo $row['funcionario']; ?>"><?php echo $row['funcionario']; ?></option>
                    <?php
                    $query = mysqli_query($con, "SELECT DISTINCT funcionario FROM db_equipos");

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
                  <select name="area" class="form-control">
                    <option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
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
                  <input type="date" name="fechai" class="form-control" value="<?php echo $row['fechai']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de Entrega</label>
                <div class="col-sm-3">
                  <input type="date" name="fechae" class="form-control" value="<?php echo $row['fechae']; ?>" required>
                </div>
              </div>
              <!-- /.box body -->

              <div class="box-footer">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="editar" value="Guardar">
                    <a href="suministros.php" class="btn btn-default btn-reset">Cancelar</a>
                  </div>
                </div>
              </div><!-- /.box footer -->
            </div>
          </form>
			</div>
		</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>