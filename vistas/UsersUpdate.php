<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	if(isset($_GET['idusuario'])){
		$idusuario=(int) $_GET['idusuario'];

		$buscar_idusuario=$con->prepare('SELECT * FROM usuario WHERE idusuario=:idusuario LIMIT 1');
		$buscar_idusuario->execute(array(
			':idusuario'=>$idusuario
		));
		$resultado=$buscar_idusuario->fetch();
	}else{
		header('Location: UsersRead.php');
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Editar Usuario</title>
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

	<div class="contenedor">
		</br>
		<h2>EDITAR INFORMACIÓN DE USUARIO</h2>
		<form action="UsersUpdate1.php" method="post">
			<div class="form-group">
				<input type="number" readonly name="idusuario" value="<?php if($resultado) echo $resultado['idusuario']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
				<select name="estado" class="input__text">
					<option value="Activo">Activo</option>
					<option value="Inactivo">Inactivo</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
				<input type="number" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
				<input type="text" name="login" value="<?php if($resultado) echo $resultado['login']; ?>" class="input__text">
				<input type="password" name="contrasena" value="<?php if($resultado) echo $resultado['contrasena']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="UsersRead.php" class="btn btn__danger">Cancelar</a>
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