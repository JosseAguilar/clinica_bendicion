<?php

	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$database = "clinica_bendicion";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$login = $_POST["txtusuario"];
	$contrasena = $_POST["txtpassword"];

	$query_busquea =  "SELECT * FROM USUARIO WHERE login = '".$login."' and contrasena = '".$contrasena."'";
 
	$query = mysqli_query($conn,$query_busquea);
 
	while ($row = $query->fetch_assoc()) {
		$login_db = $row['login'];
		$contrasena_db = $row['contrasena'];
		$idtipousuario_db = $row['idtipousuario'];
		$nombre_db = $row['nombre'];
		
	}
	
	if(!empty($login_db) && !empty($contrasena_db) ){
			$_SESSION['idtipousuario']=$idtipousuario_db;
			$_SESSION['user']=$nombre_db;
			
			if($idtipousuario_db == 1)
			{
				header('Location: vistas/Dashboard.php');
				//get dashboard
			}
				else if($idtipousuario_db == 2)
				{
					header('Location: vistassecre/Dashboard.php');
					//get dashboard
				}
			
	}else{
			header('Location: Index.php');
		}
?>

