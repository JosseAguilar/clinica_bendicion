<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	if(isset($_GET['idcita'])){
		$idcita=(int) $_GET['idcita'];

		$buscar_idcita=$con->prepare('SELECT cita.idcita, cita.idpaciente, cita.fecha, estado.estado_, paciente.nombre, paciente.apellido,
		paciente.genero, paciente.tiposangre, paciente.direccion, paciente.telefono, paciente.correo FROM cita 
		INNER JOIN estado ON estado.idestado=cita.idestado 
		INNER JOIN paciente ON cita.idpaciente=paciente.idpaciente WHERE idcita=:idcita');			
		$buscar_idcita->execute(array(
			':idcita'=>$idcita
		));
		$resultado=$buscar_idcita->fetch();
	}else{
		header('Location: DateRead.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Crear Receta</title>
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

	</br>
	<div class="contenedor">
		<h2>CREAR RECETA PARA EL PACIENTE</h2>
		
		<form action="PrescriptionCreate1.php" method="post">
			<div class="form-group">
				<input type="number" name="idcita" readonly value="<?php if($resultado) echo $resultado['idcita']; ?>" class="input__text">
				<input type="date" name="fecha" readonly value="<?php if($resultado) echo $resultado['fecha']; ?>" class="input__text">
				<input type="text" name="estado_" readonly value="<?php if($resultado) echo $resultado['estado_']; ?>" class="input__text">
			</div>
			
			<div class="form-group">
				<input type="number" name="idpaciente" readonly value="<?php if($resultado) echo $resultado['idpaciente']; ?>" class="input__text">
				<input type="text" name="nombre" readonly value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" readonly value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
				<input type="text" name="genero" readonly value="<?php if($resultado) echo $resultado['genero']; ?>" class="input__text">
			</div>
			
			<div class="form-group">
				<input type="text" name="tiposangre" readonly value="<?php if($resultado) echo $resultado['tiposangre']; ?>" class="input__text">
				<input type="text" name="direccion" readonly value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
				<input type="number" name="telefono" readonly value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
				<input type="email" name="correo" readonly value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>

			
			<div class="form-group">
				<textarea name="diagnostico" rows="13" class="input__text">Escribir Diagnostico</textarea>
				<textarea name="tratamiento" rows="13" class="input__text">Escribir Tratamiento</textarea>
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
