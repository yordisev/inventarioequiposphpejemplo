<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['usuario']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username y $password
$usuario=$_POST['usuario'];
$password=$_POST['password'];

// Estableciendo la conexion a la base de datos
include("conexion.php");//Contiene de conexion a la base de datos

// Para proteger de Inyecciones SQL 
$usuario    = mysqli_real_escape_string($con,(strip_tags($usuario,ENT_QUOTES)));
$password = hash('sha512', $password);

$sql = "SELECT usuario, password FROM usuarios WHERE usuario = '" . $usuario . "' and password='".$password."';";
$query=mysqli_query($con,$sql);
$counter=mysqli_num_rows($query);
if ($counter==1){
		$_SESSION['login_user_sys']=$usuario; // Iniciando la sesion
		header("location: dasboard.php"); // Redireccionando a la pagina profile.php
	
	
} else {
$error = "El correo electrónico o la contraseña es inválida.";	
}
}
}
?>