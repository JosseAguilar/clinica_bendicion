<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	if(isset($_GET['idpaciente'])){
		$idpaciente=(int) $_GET['idpaciente'];

		$buscar_idusuario=$con->prepare('SELECT * FROM paciente WHERE idpaciente=:idpaciente');
		$buscar_idusuario->execute(array(
			':idpaciente'=>$idpaciente
		));
		$resultado=$buscar_idusuario->fetch();
	}else{
		header('Location: PatientsRead.php');
	}
	$idcita=rand(1,100000000);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Crear Cita</title>
	<link rel="stylesheet" href="../css/Crearusuarios1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/Usuarios.css">
</head>
<body>

	<body style="background: #1c4963">

	<div>
	<h3><a href="" style="color:white">Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistassecre/Dashboard.php" style="color:white">Inicio</a> |
	<a href="../Salir.php" style="color:white">Salir</a>
	</h3>
	</div>

	</br>

	<div class="contenedor">
		<form action="DateCreate1.php" method="post"></br></br>
			<h2><i class="fa fa-calendar fa-stack-1x ">Crear Cita</i></h2></br>
			<input type="number" readonly name="idcita" value="<?php echo $idcita; ?>"></br>
			<input type="number" readonly name="idpaciente" value="<?php if($resultado) echo $resultado['idpaciente']; ?>"> </br>
			<input type="text" readonly name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>"> </br>
			<input type="text" readonly name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>"> </br>
			<input type="date" name="fecha"></br>
			<!--idestado -->
			<input type="submit" name="crearusuarios" value="Guardar">
		</form>

		<form  action="PatientsRead.php" class="dif">
			<input type="submit" name="crearusuarios" value="Cancelar">
		</form>
	
	</div>
</body>
</html>

<?php
} else {
	header("location:../Index.php");
	}
 ?>