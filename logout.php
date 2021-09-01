<?php
session_start();
if(session_destroy()) // Destruye todas las sesiones
{
header("Location: index.php"); // Redireccionando a la pagina index.php
}
?>