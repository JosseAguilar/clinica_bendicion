<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	if(isset($_GET['idcita'])){
		$idcita=(int) $_GET['idcita'];

		$buscar_idcita=$con->prepare('SELECT * FROM cita WHERE idcita=:idcita LIMIT 1');
		$buscar_idcita->execute(array(
			':idcita'=>$idcita
		));
		$resultado=$buscar_idcita->fetch();
	}else{
		header('Location: PatientsRead.php');
	}
?>	
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Editar Cita</title>
	<link rel="stylesheet" href="../css/Estilo.css">
	<link rel="stylesheet" href="../css/Usuario.css">
</head>
<body>

	<div>
	<h3><a href="" style="color:black"> Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistas/Dashboard.php" style="color:black">Inicio</a> |
	<a href="../Salir.php" style="color:black">Salir</a>
	</h3>
	</div>

	</br></br></br></br></br>
	<div class="contenedor">
		<h2>EDITAR LA INFORMACIÓN DE LA CITA</h2>
		<form action="DateUpdate1.php" method="post">
			<div class="form-group">
				<input type="number" name="idcita" readonly value="<?php if($resultado) echo $resultado['idcita']; ?>" class="input__text">
				<input type="date" name="fecha" value="<?php if($resultado) echo $resultado['fecha']; ?>" class="input__text">
				<select name="idestado" class="input__text">
				<option value="1">Activa</option>
				<option value="2">Completa</option>
				<option value="3">Cancelada</option>
				<option value="4">Postpuesta</option></br>
				</select>
			</div>
			<div class="btn__group">
				<a href="DateRead.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

<?php
} else {
	header("location:../Index.php");
	}
 ?>