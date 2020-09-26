<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	

	include_once 'Conection.php';

	if(isset($_GET['idpaciente'])){
		$idpaciente=(int) $_GET['idpaciente'];

		$buscar_idpaciente=$con->prepare('SELECT * FROM paciente WHERE idpaciente=:idpaciente LIMIT 1');
		$buscar_idpaciente->execute(array(
			':idpaciente'=>$idpaciente
		));
		$resultado=$buscar_idpaciente->fetch();
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
	<title>Clínica Médica "La Bendición" | Editar Paciente</title>
	<link rel="stylesheet" href="../css/Estilo.css">
	<link rel="stylesheet" href="../css/Usuario.css">
</head>
<body>

	<div>
	<h3><a href="" style="color:black"> Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistassecre/Dashboard.php" style="color:black">Inicio</a> |
	<a href="../Salir.php" style="color:black">Salir</a>
	</h3>
	</div>

	</br></br></br></br></br>
	<div class="contenedor">
		<h2>EDITAR INFORMACIÓN DEL PACIENTE</h2>
		<form action="PatientsUpdate1.php" method="post">
			<div class="form-group">
				<input type="number" readonly name="idpaciente" value="<?php if($resultado) echo $resultado['idpaciente']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
				<select name="genero" class="input__text">
				<option value="Masculino">Masculino</option>
				<option value="Femenino">Femenino</option>
				</select>
				
				<select name="tiposangre" class="input__text">
					<option value="S/E">Tipo Sangre</option>
					<option value="O-">O-</option>
					<option value="O+">O+</option>
					<option value="A-">A-</option>
					<option value="A+">A+</option>
					<option value="B-">B-</option>
					<option value="B+">B+</option>
					<option value="AB-">AB-</option>
				</select>
			</div>
			<div class="form-group">
			</div>
			<div class="form-group">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
				<input type="number" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
				<input type="email" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="PatientsRead.php" class="btn btn__danger">Cancelar</a>
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
