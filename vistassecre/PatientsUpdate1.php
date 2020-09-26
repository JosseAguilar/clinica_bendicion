<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");
		
		$idpaciente = $_POST["idpaciente"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$genero = $_POST["genero"];
		$tiposangre = $_POST["tiposangre"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		
		if(!empty($nombre) && !empty($apellido) && !empty($genero) && !empty($tiposangre) && !empty($direccion) && !empty($telefono) && !empty($correo)){		
		
		mysqli_query($conexion, "UPDATE paciente SET nombre='$_REQUEST[nombre]',apellido='$_REQUEST[apellido]',genero='$_REQUEST[genero]',
		tiposangre='$_REQUEST[tiposangre]',direccion='$_REQUEST[direccion]',telefono=$_REQUEST[telefono],correo='$_REQUEST[correo]'
		WHERE idpaciente=$_REQUEST[idpaciente]")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);
		
		header('Location: PatientsRead.php');
			}
			
		else{
			
		header('Location: PatientsaRead.php');
		}
		
?>