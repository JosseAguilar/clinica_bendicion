<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");
		
		$idreceta = $_POST["idreceta"];
		$diagnostico = $_POST["diagnostico"];
		$tratamiento = $_POST["tratamiento"];
		
		if(!empty($idreceta) && !empty($diagnostico) && !empty($tratamiento)){		
		
		mysqli_query($conexion, "UPDATE receta SET diagnostico='$_REQUEST[diagnostico]',tratamiento='$_REQUEST[tratamiento]' 
		WHERE (idreceta = $_REQUEST[idreceta])")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);

			header('Location: PrescriptionRead.php');
			}
			
		else{
			header('Location: PrescriptionRead.php');
			 
		}
		
?>