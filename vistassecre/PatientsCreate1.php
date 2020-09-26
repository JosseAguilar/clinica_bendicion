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
		
		if(!empty($idpaciente) && !empty($nombre) && !empty($apellido) && !empty($genero) && !empty($tiposangre)
			&& !empty($direccion) && !empty($telefono) && !empty($correo)){
		
		$query_busqueda =  "SELECT * FROM USUARIO WHERE idpaciente = '".$idpaciente."'";
 
		$result = mysqli_query($conexion,$query_busqueda);
 
		$fechacreado_=date('Y/m/d');
		
		mysqli_query($conexion, "INSERT INTO paciente(idpaciente, nombre, apellido, genero, tiposangre, direccion, telefono, correo, fechacreado) 
		VALUES ($_REQUEST[idpaciente],'$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[genero]','$_REQUEST[tiposangre]','$_REQUEST[direccion]',
		$_REQUEST[telefono],'$_REQUEST[correo]','$fechacreado_')")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);
	
		header('Location: PatientsRead.php');
		
		}else{
		header('Location: PatientsCreate.php');
			
		}
?>