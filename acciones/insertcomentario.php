<?php
session_start();
require_once "../conexion.php";

			if (isset($_POST['insert'])) {
				$serial = mysqli_real_escape_string($con, (strip_tags($_POST["serial"], ENT_QUOTES))); //Escanpando caracteres 
				$usuario = mysqli_real_escape_string($con, (strip_tags($_POST["usuario"], ENT_QUOTES))); //Escanpando caracteres 
				$comentario = mysqli_real_escape_string($con, (strip_tags($_POST["comentario"], ENT_QUOTES))); //Escanpando caracteres 
				$fechacomentario = mysqli_real_escape_string($con, (strip_tags($_POST["fechacomentario"], ENT_QUOTES))); //Escanpando caracteres 

					$insert = mysqli_query($con, "INSERT INTO db_comentarios(serial,usuario,comentario,fechacomentario)
															VALUES('$serial','$usuario','$comentario',NOW())") or die(mysqli_error());
					if ($insert) {
						header("location: ../equipos.php?alert=6");
					} else {
						header("location: ../vistaequipo.php?alert=6");
					}
				
			}
			?>