
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['Guardar'])) {

            $suministro  = mysqli_real_escape_string($mysqli, trim($_POST['suministro']));
            $marca  = mysqli_real_escape_string($mysqli, trim($_POST['marca']));
            $serial  = mysqli_real_escape_string($mysqli, trim($_POST['serial']));
            $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            $ticket  = mysqli_real_escape_string($mysqli, trim($_POST['ticket']));
            $funcionario  = mysqli_real_escape_string($mysqli, trim($_POST['funcionario']));
            $area  = mysqli_real_escape_string($mysqli, trim($_POST['area']));
            $fechai  = mysqli_real_escape_string($mysqli, trim($_POST['fechai']));
            $fechae  = mysqli_real_escape_string($mysqli, trim($_POST['fechae']));

            $created_user = $_SESSION['id_user'];


            $query = mysqli_query($mysqli, "INSERT INTO db_suministros(suministro,marca,serial,estado,ticket,funcionario,area,fechai,fechae) 
                                            VALUES('$suministro','$marca','$serial','$estado','$ticket','$funcionario','$area','$fechai','$fechae')")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=suministros&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['Guardar'])) {

            $suministro  = mysqli_real_escape_string($mysqli, trim($_POST['suministro']));
            $marca  = mysqli_real_escape_string($mysqli, trim($_POST['marca']));
            $serial  = mysqli_real_escape_string($mysqli, trim($_POST['serial']));
            $estado  = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            $ticket  = mysqli_real_escape_string($mysqli, trim($_POST['ticket']));
            $funcionario  = mysqli_real_escape_string($mysqli, trim($_POST['funcionario']));
            $area  = mysqli_real_escape_string($mysqli, trim($_POST['area']));
            $fechai  = mysqli_real_escape_string($mysqli, trim($_POST['fechai']));
            $fechae  = mysqli_real_escape_string($mysqli, trim($_POST['fechae']));


                $query = mysqli_query($mysqli, "UPDATE db_suministros SET  suministro       = '$suministro',
                                                                    marca      = '$marca',
                                                                    serial      = '$serial',
                                                                    estado    = '$estado',
                                                                    ticket    = '$ticket',
                                                                    funcionario       = '$funcionario',
                                                                    area      = '$area',
                                                                    fechai      = '$fechai',
                                                                    fechae    = '$fechae'
                                                              WHERE serial    = '$serial'")
                    or die('error: ' . mysqli_error($mysqli));


                if ($query) {

                    header("location: ../../main.php?module=suministros&alert=2");
                }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
			$estado = 'X';
            $query = mysqli_query($mysqli, "UPDATE db_suministros SET estado='$estado' WHERE serial='$codigo'")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=suministros&alert=3");
            }
        }
    }
}
?>