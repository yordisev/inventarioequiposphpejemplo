<?php

session_start();


require_once "../conexion.php";

			// escaping, additionally removing everything that could be (html/javascript-) code
            $id = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM db_equipos WHERE serial='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
            
			if(isset($_POST['save'])){
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
				
				
				$update = mysqli_query($con, "UPDATE db_equipos SET tipo = '$tipo',
				marca      = '$marca',
				modelo      = '$modelo',
				procesador    = '$procesador',
				disco    = '$disco',
				memoria       = '$memoria',
				pantalla      = '$pantalla',
				teclado      = '$teclado',
				mouse    = '$mouse',
				procedencia    = '$procedencia',
				seccional       = '$seccional',
				municipio      = '$municipio',
				funcionario      = '$funcionario',
				area    = '$area',
				estado    = '$estado',
				sistemaoperativo      = '$sistemaoperativo',
				nombrepc    = '$nombrepc',
				entregadopor    = '$entregadopor'
		  WHERE serial    = '$serial'") or die(mysqli_error());
				if($update){
					header("location: ../equipos.php?alert=2");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>