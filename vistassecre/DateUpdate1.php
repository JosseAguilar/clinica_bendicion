<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");
		
		$idcita = $_POST["idcita"];
		$fecha = $_POST["fecha"];
		$idestado = $_POST["idestado"];
		
		if(!empty($idcita) && !empty($fecha) && !empty($idestado)){		
		
		mysqli_query($conexion, "UPDATE cita SET fecha='$_REQUEST[fecha]',idestado=$_REQUEST[idestado] 
		WHERE (idcita = $_REQUEST[idcita])")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);

			header('Location: DateRead.php');
			}
			
		else{
			header('Location: DateRead.php');
			
			}
		
?>