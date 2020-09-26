<?php
$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");

		$idusuario = $_POST["idusuario"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$login = $_POST["login"];
		$idtipousuario = $_POST["idtipousuario"];
		$correo = $_POST["correo"];
		$telefono = $_POST["telefono"];
		$contrasena = $_POST["contrasena"];
				
		if(!empty($idusuario) && !empty($nombre) && !empty($apellido) && !empty($login) && !empty($idtipousuario)
			&& !empty($correo) && !empty($telefono) && !empty($contrasena)){		
		
		$query_busqueda =  "SELECT * FROM USUARIO WHERE idusuario = '".$idusuario."'";
 
		$query = mysqli_query($conexion,$query_busqueda);
 
		while ($row = $query->fetch_assoc()) {
			$idusuario_db = $row['idusuario'];			
		}
				if(!empty($idusuario_db)){
				echo "ID DE USUARIO YA EXISTE".$idusuario_db;
			
			}else{
						
		$imagen_ = "img.jpg";
		$estado_ = "Activo";
		$fechacreado_=date('Y/m/d');

		
		mysqli_query($conexion, "INSERT INTO usuario(idusuario, nombre, apellido, login, idtipousuario, correo, telefono, contrasena, imagen, estado, fechacreado) 
		VALUES ($idusuario,'$nombre','$apellido','$login',$idtipousuario,'$correo',
		$telefono,'$contrasena','$imagen_','$estado_','$fechacreado_')")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);
			}
			header('Location: UsersRead.php');
		
			///get dashboard
		}else{
		header('Location: UsersCreate.php');
			
		}
		
?>