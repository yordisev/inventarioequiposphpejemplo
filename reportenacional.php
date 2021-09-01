
<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="es">

<link href="../css/AdminLTE.css" rel="stylesheet">
	<link href="../css/style_nav.css" rel="stylesheet">
	<link href="../modal/bootstrap.min.css" rel="stylesheet" type="text/css" />    

<link href="../modal/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<script src="../modal/jQuery-2.1.3.min.js"></script>
 <script src="../modal/bootstrap.min.js" type="text/javascript"></script> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan MySQLi</title>

    <style>
        .content {
            margin-top: 30px;
        }
    </style>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php require("nav.php"); ?>
    </nav>
    <div class="container">
    <div class="content">
            <h2>Datos del empleados &raquo; Agregar datos</h2>
            <?php
$query = mysqli_query($con, "SELECT count(seccional) as numero FROM db_equipos WHERE seccional='NACIONAL' AND tipo='PORTATIL'")
  or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(seccional) as propios FROM db_equipos WHERE seccional='NACIONAL' AND tipo='PORTATIL' AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
 <?php
$query = mysqli_query($con, "SELECT count(seccional) as rentados FROM db_equipos WHERE seccional='NACIONAL' AND tipo='PORTATIL' AND procedencia='RENTADO'")
  or die('Error ' . mysqli_error($con));
$data2 = mysqli_fetch_assoc($query);
?>
            <div class="right_col" role="main">
            <div class="box box-primary">
			<div class="box-body">
                <!-- page content -->
                 
                    <div class="form-group">
                                    <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="caja">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-tasks"></i>
                                    <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-tasks"></i>
                                    <h3 style="color:white; margin-top: -6px;">Portatiles</h3>
                                   
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button data-toggle="modal" data-target="#nacionalpropiosp" style="color:white;background: #229dd6;margin-right: 36px;">
                                                PROPIOS <span><?php echo $data1['propios']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button data-toggle="modal" data-target="#nacionalrentadosp" style="color:white;background: #229dd6">
                                                RENTADOS <span><?php echo $data2['rentados']; ?></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <?php

$query = mysqli_query($con, "SELECT count(seccional) as numero FROM db_equipos WHERE seccional='NACIONAL' AND tipo='ESCRITORIO'")
  or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(seccional) as propios FROM db_equipos WHERE seccional='NACIONAL' AND tipo='ESCRITORIO' AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(seccional) as rentados FROM db_equipos WHERE seccional='NACIONAL' AND tipo='ESCRITORIO' AND procedencia='RENTADO'")
  or die('Error ' . mysqli_error($con));
$data2 = mysqli_fetch_assoc($query);
?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="caja">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-hdd"></i>
                                    <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-hdd"></i>
                                    <h3 style="color:white; margin-top: -6px;">PC-Escritorio</h3>
                                   
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button data-toggle="modal" data-target="#nacionalpropiose" style="color:white;background: #229dd6;margin-right: 36px;">
                                                PROPIOS <span><?php echo $data1['propios']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button data-toggle="modal" data-target="#nacionalrentadose" style="color:white;background: #229dd6">
                                                RENTADOS <span><?php echo $data2['rentados']; ?></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <!-- content -->
                        <br><br>
           
            </div><!-- /page content -->
    </div>
        
        </div>
    </div>
    </div>
</body>

   <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@ MODAL DE EQUIPOS NACIONAL PROPIOS PORTATILES @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalpropiosp" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">NACIONAL PORTATILES PROPIOS</h4>
                  </div>
                  <div class="modal-body">
                  <table class='table table-bordered'>
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>NACIONAL PORTATILES PROPIOS</th>
                </tr>
                <tr>
                  <th class="center">N</th>
                  <th class="center">TIPO</th>
                  <th class="center">SERIAL</th>
                  <th class="center">FUNCIONARIO</th>
                  <th class="center">AREA</th>
                  <th class="center">SECCIONAL</th>
                </tr>
                <?php
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND tipo='PORTATIL' AND procedencia='PROPIO'")
                  or die('error: ' . mysqli_error($con));
                while ($data = mysqli_fetch_assoc($query)) {

                  echo '
                <tr>
                  <td width="30" class="center">' . $no . '</td>
                  <td width="80" class="center">' . $data['tipo'] . '</td>
                  <td width="80" class="center">' . $data['serial'] . '</td>
                  <td width="80" class="center">' . $data['funcionario'] . '</td>
                  <td width="80" class="center">' . $data['area'] . '</td>
                  <td width="80" class="center">' . $data['seccional'] . '</td>
                </tr>
                ';
                  $no++;
                }
                ?>
              </table>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
          </form>

          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@ MODAL DE EQUIPOS NACIONAL PORTATIL RENTADOS @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalrentadosp" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">NACIONAL PORTATILES RENTADOS</h4>
                  </div>
                  <div class="modal-body">
                  <table class='table table-bordered'>
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>NACIONAL PORTATILES RENTADOS</th>
                </tr>
                <tr>
                <th class="center">N</th>
                  <th class="center">TIPO</th>
                  <th class="center">SERIAL</th>
                  <th class="center">FUNCIONARIO</th>
                  <th class="center">AREA</th>
                  <th class="center">SECCIONAL</th>
                </tr>
                <?php
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND tipo='PORTATIL' AND procedencia='RENTADO'")
                  or die('error: ' . mysqli_error($con));
                while ($data = mysqli_fetch_assoc($query)) {

                  echo '
                <tr>
                <td width="30" class="center">' . $no . '</td>
                <td width="80" class="center">' . $data['tipo'] . '</td>
                <td width="80" class="center">' . $data['serial'] . '</td>
                <td width="80" class="center">' . $data['funcionario'] . '</td>
                <td width="80" class="center">' . $data['area'] . '</td>
                <td width="80" class="center">' . $data['seccional'] . '</td>
                </tr>
                ';
                  $no++;
                }
                ?>
              </table>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
          </form>

          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@ MODAL DE EQUIPOS NACIONAL PROPIOS ESCRITORIO @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalpropiose" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">NACIONAL PROPIOS ESCRITORIO</h4>
                  </div>
                  <div class="modal-body">
                  <table class='table table-bordered'>
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>NACIONAL PROPIOS ESCRITORIO</th>
                </tr>
                <tr>
                  <th class="center">N</th>
                  <th class="center">TIPO</th>
                  <th class="center">SERIAL</th>
                  <th class="center">FUNCIONARIO</th>
                  <th class="center">AREA</th>
                  <th class="center">SECCIONAL</th>
                </tr>
                <?php
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND tipo='ESCRITORIO' AND procedencia='PROPIO'")
                  or die('error: ' . mysqli_error($con));
                while ($data = mysqli_fetch_assoc($query)) {

                  echo '
                <tr>
                  <td width="30" class="center">' . $no . '</td>
                  <td width="80" class="center">' . $data['tipo'] . '</td>
                  <td width="80" class="center">' . $data['serial'] . '</td>
                  <td width="80" class="center">' . $data['funcionario'] . '</td>
                  <td width="80" class="center">' . $data['area'] . '</td>
                  <td width="80" class="center">' . $data['seccional'] . '</td>
                </tr>
                ';
                  $no++;
                }
                ?>
              </table>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
          </form>

          <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@  MODAL DE EQUIPOS NACIONAL RENTADOS ESCRITORIO @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalrentadose" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">NACIONAL RENTADOS ESCRITORIO</h4>
                  </div>
                  <div class="modal-body">
                  <table class='table table-bordered'>
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>NACIONAL RENTADOS ESCRITORIO</th>
                </tr>
                <tr>
                <th class="center">N</th>
                  <th class="center">TIPO</th>
                  <th class="center">SERIAL</th>
                  <th class="center">FUNCIONARIO</th>
                  <th class="center">AREA</th>
                  <th class="center">SECCIONAL</th>
                </tr>
                <?php
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND tipo='ESCRITORIO' AND procedencia='RENTADO'")
                  or die('error: ' . mysqli_error($con));
                while ($data = mysqli_fetch_assoc($query)) {

                  echo '
                <tr>
                <td width="30" class="center">' . $no . '</td>
                <td width="80" class="center">' . $data['tipo'] . '</td>
                <td width="80" class="center">' . $data['serial'] . '</td>
                <td width="80" class="center">' . $data['funcionario'] . '</td>
                <td width="80" class="center">' . $data['area'] . '</td>
                <td width="80" class="center">' . $data['seccional'] . '</td>
                </tr>
                ';
                  $no++;
                }
                ?>
              </table>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>

              </div>
            </div>
          </form>