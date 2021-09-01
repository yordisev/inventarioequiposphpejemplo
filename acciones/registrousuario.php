<?php
require_once "../conexion.php";

if (isset($_POST['Guardaru'])) {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $nombres = filter_var(strtoupper($_POST['nombres']), FILTER_SANITIZE_STRING);
    $apellidos = filter_var(strtoupper($_POST['apellidos']), FILTER_SANITIZE_STRING);
    $estado = filter_var(strtoupper($_POST['estado']), FILTER_SANITIZE_STRING);
    $errores = '';

    if (empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor llena todos los datos</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();
        if ($resultado != false) {
            $errores .= "<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
           Este Numero de serial ya esta agregado
          </div>";
        }

       $password = hash('sha512', $password); 
       $password2 = hash('sha512', $password2); 
       if($password != $password2){
           $errores .= "<div class='alert alert-info alert-dismissable'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
           <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
          Las contraseñas no Coincidede
         </div>";
       }
    }

    if ($errores == ''){
        $statement= $conexion->prepare('INSERT INTO usuarios (id, usuario, password, nombres, apellidos, estado) VALUES (null, :usuario, :password, :nombres, :apellidos, :estado)');
        $statement->execute(array(':usuario'=> $usuario, ':password'=> $password, ':nombres'=> $nombres, ':apellidos'=> $apellidos, ':estado'=> $estado));
        header("location: ../usuarios.php?alert=1");
    }
}
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
<link href="../css/AdminLTE.css" rel="stylesheet">
	<link href="../css/style_nav.css" rel="stylesheet">
	<link href="../modal/bootstrap.min.css" rel="stylesheet" type="text/css" />    

<link href="../modal/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<script src="../modal/jQuery-2.1.3.min.js"></script>
 <script src="../modal/bootstrap.min.js" type="text/javascript"></script> 
	<div class="container">
		<div class="content">
			<h2>Lista de Usuarios<a href="../registrate.php" class="btn btn-primary pull-right">Regresar</a></h2>
            <?php if(!empty($errores)): ?>
                <div class="error">
<ul>
<?php echo $errores; ?>
</ul>
                </div>
            <?php endif; ?>
          
</body>

</html>