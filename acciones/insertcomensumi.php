
<?php
session_start();
require_once "../conexion.php";

if (isset($_POST['gcomentario'])) {

$serial  = mysqli_real_escape_string($con, trim($_POST['serial']));
$usuario  = mysqli_real_escape_string($con, trim($_POST['usuario']));
$comentario  = mysqli_real_escape_string($con, trim($_POST['comentario']));
$fechac  = mysqli_real_escape_string($con, trim($_POST['fechac']));


$query = mysqli_query($con, "INSERT INTO db_comentarios_suministros(serial,usuario,comentario,fechac) 
                                VALUES('$serial','$usuario','$comentario',NOW())")
    or die('error ' . mysqli_error($con));


    if ($query) {
        header("location: ../suministros.php?alert=6");
    } else {
        header("location: ../vistaequipo.php?alert=6");
    }
}
?>
