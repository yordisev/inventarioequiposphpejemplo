<?php 

session_start();


require_once "../conexion.php";

 if (isset($_POST['editar'])) {

            $suministro  = mysqli_real_escape_string($con, trim($_POST['suministro']));
            $marca  = mysqli_real_escape_string($con, trim($_POST['marca']));
            $serial  = mysqli_real_escape_string($con, trim($_POST['serial']));
            $estado  = mysqli_real_escape_string($con, trim($_POST['estado']));
            $ticket  = mysqli_real_escape_string($con, trim($_POST['ticket']));
            $funcionario  = mysqli_real_escape_string($con, trim($_POST['funcionario']));
            $area  = mysqli_real_escape_string($con, trim($_POST['area']));
            $fechai  = mysqli_real_escape_string($con, trim($_POST['fechai']));
            $fechae  = mysqli_real_escape_string($con, trim($_POST['fechae']));


                $query = mysqli_query($con, "UPDATE db_suministros SET  suministro       = '$suministro',
                                                                    marca      = '$marca',
                                                                    serial      = '$serial',
                                                                    estado    = '$estado',
                                                                    ticket    = '$ticket',
                                                                    funcionario       = '$funcionario',
                                                                    area      = '$area',
                                                                    fechai      = '$fechai',
                                                                    fechae    = '$fechae'
                                                              WHERE serial    = '$serial'")
                    or die('error: ' . mysqli_error($con));


                if ($query) {

                    header("location: ../suministros.php?alert=2");
                }
        }
?>