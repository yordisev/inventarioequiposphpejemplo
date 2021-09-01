<?php

session_start();


require_once "../conexion.php";

$errores ='';


			if (isset($_POST['add'])) {
				$tipo = mysqli_real_escape_string($con, (strip_tags($_POST["tipo"], ENT_QUOTES))); //Escanpando caracteres 
				$marca = mysqli_real_escape_string($con, (strip_tags($_POST["marca"], ENT_QUOTES))); //Escanpando caracteres 
				$modelo = mysqli_real_escape_string($con, (strip_tags($_POST["modelo"], ENT_QUOTES))); //Escanpando caracteres 
				$serial = mysqli_real_escape_string($con, (strip_tags($_POST["serial"], ENT_QUOTES))); //Escanpando caracteres 
				$procesador = mysqli_real_escape_string($con, (strip_tags($_POST["procesador"], ENT_QUOTES))); //Escanpando caracteres 
				$disco = mysqli_real_escape_string($con, (strip_tags($_POST["disco"], ENT_QUOTES))); //Escanpando caracteres 
				$memoria = mysqli_real_escape_string($con, (strip_tags($_POST["memoria"], ENT_QUOTES))); //Escanpando caracteres 
				$pantalla = mysqli_real_escape_string($con, (strip_tags($_POST["pantalla"], ENT_QUOTES))); //Escanpando caracteres 
                $teclado = mysqli_real_escape_string($con, (strip_tags($_POST["teclado"], ENT_QUOTES))); //Escanpando caracteres 
				$mouse = mysqli_real_escape_string($con, (strip_tags($_POST["mouse"], ENT_QUOTES))); //Escanpando caracteres 
				$procedencia = mysqli_real_escape_string($con, (strip_tags($_POST["procedencia"], ENT_QUOTES))); //Escanpando caracteres 
				$seccional = mysqli_real_escape_string($con, (strip_tags($_POST["seccional"], ENT_QUOTES))); //Escanpando caracteres 
				$municipio = mysqli_real_escape_string($con, (strip_tags($_POST["municipio"], ENT_QUOTES))); //Escanpando caracteres 
				$funcionario = mysqli_real_escape_string($con, (strip_tags($_POST["funcionario"], ENT_QUOTES))); //Escanpando caracteres 
				$area = mysqli_real_escape_string($con, (strip_tags($_POST["area"], ENT_QUOTES))); //Escanpando caracteres 
                $estado = mysqli_real_escape_string($con, (strip_tags($_POST["estado"], ENT_QUOTES))); //Escanpando caracteres 
                $sistemaoperativo = mysqli_real_escape_string($con, (strip_tags($_POST["sistemaoperativo"], ENT_QUOTES))); //Escanpando caracteres 
				$nombrepc = mysqli_real_escape_string($con, (strip_tags($_POST["nombrepc"], ENT_QUOTES))); //Escanpando caracteres 
				$entregadopor = mysqli_real_escape_string($con, (strip_tags($_POST["entregadopor"], ENT_QUOTES))); //Escanpando caracteres 
				$fechaentrega = mysqli_real_escape_string($con, (strip_tags($_POST["estado"], ENT_QUOTES))); //Escanpando caracteres 


				$cek = mysqli_query($con, "SELECT * FROM db_equipos WHERE serial='$serial'");
				if (mysqli_num_rows($cek) == 0) {
					$insert = mysqli_query($con, "INSERT INTO db_equipos(tipo,marca,modelo,serial,procesador,disco,memoria,pantalla,teclado,mouse,procedencia,seccional,municipio,funcionario,area,estado,sistemaoperativo,nombrepc,entregadopor)
															VALUES('$tipo','$marca','$modelo','$serial','$procesador','$disco','$memoria','$pantalla','$teclado','$mouse','$procedencia','$seccional','$municipio','$funcionario','$area','$estado','$sistemaoperativo','$nombrepc','$entregadopor')") or die(mysqli_error());
					if ($insert) {
						header("location: ../equipos.php?alert=1");
					} else {
						header("location: ../equipos.php?alert=3");
					}
				} else {
					header("location: ../equipos.php?alert=4");
				}
			}
			?>