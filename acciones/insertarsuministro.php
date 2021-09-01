<?php 

session_start();


require_once "../conexion.php";

    if (isset($_POST['Guardar'])) {

        $suministro  = mysqli_real_escape_string($con, trim($_POST['suministro']));
        $marca  = mysqli_real_escape_string($con, trim($_POST['marca']));
        $serial  = mysqli_real_escape_string($con, trim($_POST['serial']));
        $estado  = mysqli_real_escape_string($con, trim($_POST['estado']));
        $ticket  = mysqli_real_escape_string($con, trim($_POST['ticket']));
        $funcionario  = mysqli_real_escape_string($con, trim($_POST['funcionario']));
        $area  = mysqli_real_escape_string($con, trim($_POST['area']));
        $fechai  = mysqli_real_escape_string($con, trim($_POST['fechai']));
        $fechae  = mysqli_real_escape_string($con, trim($_POST['fechae']));



        $query = mysqli_query($con, "INSERT INTO db_suministros(suministro,marca,serial,estado,ticket,funcionario,area,fechai,fechae) 
                                        VALUES('$suministro','$marca','$serial','$estado','$ticket','$funcionario','$area','$fechai','$fechae')")
            or die('error ' . mysqli_error($con));


        if ($query) {

            header("location: ../suministros.php?alert=1");
        }
    }

?>