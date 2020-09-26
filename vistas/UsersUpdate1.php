<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");
		
		$idusuario = $_POST["nombre"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$estado = $_POST["estado"];
		$correo = $_POST["correo"];
		$telefono = $_POST["telefono"];
		$login = $_POST["login"];
		$contrasena = $_POST["contrasena"];
		
		if(!empty($nombre) && !empty($apellido) && !empty($estado) && !empty($correo) && !empty($telefono) && !empty($login) && !empty($contrasena)){		
		
		mysqli_query($conexion, "UPDATE usuario SET nombre='$_REQUEST[nombre]',apellido='$_REQUEST[apellido]',login='$_REQUEST[login]',
		correo='$_REQUEST[correo]',telefono=$_REQUEST[telefono],contrasena='$_REQUEST[contrasena]',estado='$_REQUEST[estado]' 
		WHERE idusuario=$_REQUEST[idusuario]")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);
			
			header('Location: UsersRead.php');
			}	
		else{
			header('Location: UsersRead.php');
		}
		
?>