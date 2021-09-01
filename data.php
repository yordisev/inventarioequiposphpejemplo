<?php
require_once "conexion.php";

    $salida = "";

    $query = "SELECT * FROM db_equipos WHERE tipo NOT LIKE '' ORDER By id LIMIT 20";

    if (isset($_POST['consulta'])) {
    	$q = $con->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM db_equipos WHERE id LIKE '%$q%' OR tipo LIKE '%$q%' OR modelo LIKE '%$q%' OR serial LIKE '%$q%' OR funcionario LIKE '%$q%' OR area LIKE '%$q%' OR estado LIKE '%$q%' ";
    }

    $resultado = $con->query($query);

if ($resultado->num_rows>0) {
    	$salida.="<table id='mitabla' class='table table-bordered table-striped'>
							<thead>
								<tr id='titulo' style='color:white; background-color:#6082b4'>
									<td>No</td>
									<td>TIPO</td>
									<td>MODELO</td>
									<td>SERIAL</td>
									<td>FUNCIONARIO</td>
									<td>AREA</td>
									<td>ESTADO</td>
									<td>ACCIONES</td>
								</tr>
                            </thead>
                            <tbody>";
							
							$no = 1;
                            while ($fila = $resultado->fetch_assoc()) {
								
    		$salida.='<tr>
							<td>' . $no . '</td>
							<td>' . $fila['tipo'] . '</td>
							<td>' . $fila['modelo'] . '</td>
							<td>' . $fila['serial'] . '</td>
							<td><a href="vistaequipo.php?id=' . $fila['serial'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $fila['funcionario'] . '</a></td>
							<td>' . $fila['area'] . '</td>
							<td>' . $fila['estado'] . '</td>
							<td>
							<a href="editequipo.php?id=' . $fila['serial'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							<a href="acciones/eliminar.php?aksi=delete&nik='.$fila['serial'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$fila['serial'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								
							</td>
			</tr>';
			$no++;
        }
		$salida.="</tbody></table>";
		
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $con->close();



?>

