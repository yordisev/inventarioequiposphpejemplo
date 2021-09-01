
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
$query = mysqli_query($con, "SELECT count(seccional) as numero FROM db_equipos WHERE seccional='NACIONAL'")
  or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(seccional) as propios FROM db_equipos WHERE seccional='NACIONAL' AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
 <?php
$query = mysqli_query($con, "SELECT count(seccional) as rentados FROM db_equipos WHERE seccional='NACIONAL' AND procedencia='RENTADO'")
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
                                <div class="caja" style="background:#4773D6">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-tasks"></i>
                                    <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-tasks"></i>
                                    <h3 style="color:white; margin-top: -6px;">Nacional</h3>
                                    <a href="reportenacional.php" style="color:white;background: #4773D6" title="Dar Click" data-toggle="tooltip">MAS INFORMACION</a>
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button data-toggle="modal" data-target="#nacionalpropios" style="color:white;background: #4773D6;margin-right: 20px;">
                                                PROPIOS <span><?php echo $data1['propios']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button data-toggle="modal" data-target="#nacionalrentados" style="color:white;background: #4773D6">
                                                RENTADOS <span><?php echo $data2['rentados']; ?></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <?php

$query = mysqli_query($con, "SELECT count(*) as numero FROM db_equipos WHERE seccional='ATLANTICO' OR seccional='META' OR seccional='CESAR' OR seccional='CORDOBA' OR seccional='GUAJIRA' OR seccional='MAGDALENA' OR seccional='SUCRE' OR seccional='BOLIVAR'")
  or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(*) as propios FROM db_equipos WHERE procedencia='PROPIO' AND seccional='META' OR seccional='ATLANTICO'AND procedencia='PROPIO' OR seccional='CESAR'AND procedencia='PROPIO' OR seccional='CORDOBA'AND procedencia='PROPIO' OR seccional='MAGDALENA'AND procedencia='PROPIO' OR seccional='GUAJIRA'AND procedencia='PROPIO' OR seccional='SUCRE'AND procedencia='PROPIO' OR seccional='BOLIVAR'AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT count(*) as rentados FROM db_equipos WHERE procedencia='RENTADO' AND seccional='META' OR seccional='ATLANTICO'AND procedencia='RENTADO' OR seccional='CESAR'AND procedencia='RENTADO' OR seccional='CORDOBA'AND procedencia='RENTADO' OR seccional='MAGDALENA'AND procedencia='RENTADO' OR seccional='GUAJIRA'AND procedencia='RENTADO' OR seccional='SUCRE'AND procedencia='RENTADO' OR seccional='BOLIVAR'AND procedencia='RENTADO'")
  or die('Error ' . mysqli_error($con));
$data2 = mysqli_fetch_assoc($query);
?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="caja" style="background:#3DEE3A">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-hdd"></i>
                                    <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-hdd"></i>
                                    <h3 style="color:white; margin-top: -6px;">Seccionales</h3>
                                    <a href="" style="color:white;background: #3DEE3A" title="Dar Click" data-toggle="tooltip">MAS INFORMACION</a>
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button style="color:white;background: #3DEE3A;margin-right: 20px;">
                                                PROPIOS <span><?php echo $data1['propios']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button style="color:white;background: #3DEE3A">
                                                RENTADOS <span><?php echo $data2['rentados']; ?></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <?php

$query = mysqli_query($con, "SELECT count(tipo) as numero FROM db_equipos WHERE procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT COUNT(*) as porta FROM db_equipos WHERE tipo='PORTATIL' AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
 <?php
$query = mysqli_query($con, "SELECT COUNT(*) as escrit FROM db_equipos WHERE tipo='ESCRITORIO' AND procedencia='PROPIO'")
  or die('Error ' . mysqli_error($con));
$data2 = mysqli_fetch_assoc($query);
?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="caja" style="background:#E6EE3A">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-th-list"></i>
                                <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-th-list"></i>
                                    <h3 style="color:white; margin-top: -6px;">General Propios</h3>
                                    <a href="" style="color:white;background: #E6EE3A" title="Dar Click" data-toggle="tooltip">MAS INFORMACION</a>
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button style="color:white;background: #E6EE3A;margin-right: 20px;">
                                                PORTATIL <span><?php echo $data1['porta']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button style="color:white;background: #E6EE3A">
                                                ESCRITORIO <span><?php echo $data2['escrit']; ?></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <?php

$query = mysqli_query($con, "SELECT count(tipo) as numero FROM db_equipos WHERE procedencia='RENTADO'")
    or die('Error ' . mysqli_error($con));
$data = mysqli_fetch_assoc($query);
?>
<?php                    
$query = mysqli_query($con, "SELECT COUNT(*) as porta FROM db_equipos WHERE tipo='PORTATIL' AND procedencia='RENTADO'")
  or die('Error ' . mysqli_error($con));
$data1 = mysqli_fetch_assoc($query);
?>
<?php
$query = mysqli_query($con, "SELECT COUNT(*) as escrit FROM db_equipos WHERE tipo='ESCRITORIO' AND procedencia='RENTADO'")
  or die('Error ' . mysqli_error($con));
$data2 = mysqli_fetch_assoc($query);
?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="caja" style="background:#EE533A">
                                <i style="font-size:30px;color:white;" class="glyphicon glyphicon-user"></i>
                                <i style="color:white;font-size: 38px;font-weight: bold;"><?php echo $data['numero']; ?></i>
                                    <i style="font-size:30px;color:white;" class="glyphicon glyphicon-user"></i>
                                    <h3 style="color:white; margin-top: -6px;">General Rentados</h3>
                                    <a href="" style="color:white;background: #EE533A" title="Dar Click" data-toggle="tooltip">MAS INFORMACION</a>
                                </div>
                                <div class="form-group">
                                        <div class="media-left">
                                            <button style="color:white;background: #EE533A;margin-right:20px;">
                                                PORTATIL <span><?php echo $data1['porta']; ?></span>
                                            </button>
                                        </div>

                                        <div class="media-right">
                                            <button style="color:white;background: #EE533A">
                                                ESCRITORIO <span><?php echo $data2['escrit']; ?></span>
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
@@@@@@@@@@@@@@@@@@ MODAL DE EQUIPOS NACIONAL PROPIOS @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalpropios" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">EQUIPOS NACIONAL PROPIOS</h4>
                  </div>
                  <div class="modal-body">
                  <table class="table table-striped table-dark">
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>EQUIPOS NACIONAL PROPIOS</th>
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
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND procedencia='PROPIO'")
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
                    <form action="modules/suministros/proses.php?act=export_data" method="post">
<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
</form>
                  </div>
                </div>

              </div>
            </div>
          </form>
           <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@ MODAL DE EQUIPOS NACIONAL RENTADOS @@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
  <form class="form-horizontal">
            <!-- Modal -->
            <div id="nacionalrentados" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="background-color:#fe052f;color:#fff">×</button>
                    <h4 class="modal-title">EQUIPOS NACIONAL RENTADOS</h4>
                  </div>
                  <div class="modal-body">
                  <table class='table table-bordered'>
                <tr style='background-color:#A3CCFF'>
                  <th class='text-center' colspan=8>EQUIPOS NACIONAL RENTADOS</th>
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
                $query = mysqli_query($con, "SELECT * FROM db_equipos WHERE seccional='NACIONAL' AND procedencia='RENTADO'")
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

