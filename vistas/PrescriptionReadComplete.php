<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario


	include_once 'Conection.php';

	if(isset($_GET['idcita'])){
		$idcita=(int) $_GET['idcita'];

		$buscar_idcita=$con->prepare('SELECT cita.*, paciente.nombre, paciente.apellido, paciente.genero, 
		paciente.tiposangre, paciente.direccion, paciente.telefono, paciente.correo, receta.diagnostico, receta.tratamiento FROM cita 
		INNER JOIN paciente ON cita.idpaciente=paciente.idpaciente
		INNER JOIN receta ON receta.idcita=cita.idcita WHERE receta.idcita=:idcita AND cita.idpaciente=paciente.idpaciente');
		$buscar_idcita->execute(array(
			':idcita'=>$idcita
		));
		$resultado=$buscar_idcita->fetch();
	}else{
		header('Location: PrescriptionRead.php');
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Detalles de Receta</title>
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

	</br></br>
	<div class="contenedor">
		<h2>DETALLES DE RECETA</h2>
		
		<form action="" method="post">
			<div class="form-group">
				<input type="number" name="idcita" readonly value="<?php if($resultado) echo $resultado['idcita']; ?>" class="input__text">
				<input type="date" name="fecha" readonly value="<?php if($resultado) echo $resultado['fecha']; ?>" class="input__text">
				<input type="text" name="idestado" readonly value="<?php if($resultado) echo $resultado['idestado']; ?>" class="input__text">
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
				<textarea name="diagnostico" rows="16" readonly class="input__text"><?php if($resultado) echo $resultado['diagnostico']; ?></textarea>
				<textarea name="tratamiento" rows="16" readonly class="input__text"><?php if($resultado) echo $resultado['tratamiento']; ?></textarea>
			</div>
			
			<div class="btn__group">
				<a href="PrescriptionRead.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="guardar" value="Imprimir" class="btn btn__primary">
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