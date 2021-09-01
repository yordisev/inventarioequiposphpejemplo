<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Suministros</title>

	
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
			<h2>Vista Suministro</h2>

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
			<form role="form" class="form-horizontal" action="modules/suministros/proses.php?act=update" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Suministro</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="suministro" class="form-control" value="<?php echo $row['suministro']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Marca</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="marca" class="form-control" value="<?php echo $row['marca']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Serial</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="serial" class="form-control" value="<?php echo $row['serial']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Estado</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="estado" class="form-control" value="<?php echo $row['estado']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Ticket</b></label>
                <div class="col-sm-3">
                  <input disabled="disabled" type="text" name="ticket" class="form-control" value="<?php echo $row['ticket']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Funcionario</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="funcionario" class="form-control" value="<?php echo $row['funcionario']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Area</b></label>
                <div class="col-sm-4">
                  <input disabled="disabled" type="text" name="area" class="form-control" value="<?php echo $row['area']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Fecha de Ingreso</b></label>
                <div class="col-sm-3">
                  <input disabled="disabled" type="date" name="fechai" class="form-control" value="<?php echo $row['fechai']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label"><b>Fecha de Entrega</b></label>
                <div class="col-sm-3">
                  <input disabled="disabled" type="date" name="fechae" class="form-control" value="<?php echo $row['fechae']; ?>" required>
                </div>
              </div>
<center>
  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add-stock">AÑADIR COMENTARIO</a>
              <a href="suministros.php" class="btn btn-danger">Atras</a>  
</center>
              


              <table class="table table-bordered">
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=5>HISTORIAL DE COMENTARIO</th>
                </tr>
                <tr>
                  <th class="center">N</th>
                  <th class="center">SERIAL</th>
                  <th class="center">USUARIO</th>
                  <th class="center">COMENTARIO</th>
                  <th class="center">FECHA</th>
                </tr>
                <?php




                $no = 1;
                $query = mysqli_query($con, "SELECT serial, usuario, comentario, fechac  FROM db_comentarios_suministros WHERE serial='$_GET[id]'")
                  or die('error: ' . mysqli_error($con));
                while ($data = mysqli_fetch_assoc($query)) {



                  echo '
                <tr>
                  <td width="30" class="center">' . $no . '</td>
                  <td width="80" class="center">' . $data['serial'] . '</td>
                  <td width="80" class="center">' . $data['usuario'] . '</td>
                  <td width="80" class="center">' . $data['comentario'] . '</td>
                  <td width="80" class="center">' . $data['fechac'] . '</td>
                </tr>
                ';
                  $no++;
                }
                ?>
              </table>
            </div>
          </form>

          <form class="form-horizontal" action="acciones/insertcomensumi.php" method="POST">
            <!-- Modal -->
            <div id="add-stock" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Agregar Comentario</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <?php
                      $query = mysqli_query($con, "SELECT serial FROM db_suministros WHERE serial='$_GET[id]'")
                        or die('error: ' . mysqli_error($con));
                      $data  = mysqli_fetch_assoc($query);
                      ?>
                      <label class="col-sm-4 control-label"><b>SERIAL</b></label>
                      <div class="col-sm-4">
                        <input type="text" name="serial" class="form-control" value="<?php echo $row['serial']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                    
                      <label class="col-sm-4 control-label"><b>USUARIO</b></label>
                      <div class="col-sm-4">
                        <input type="text" name="usuario" class="form-control" value="<?php echo $login_session; ?>" readonly>
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
                    <button name="gcomentario" type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>

              </div>
            </div>
          </form>
			</div>
		</div>
	</div>
</body>
</html>