<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario


	include_once 'Conection.php';

	if(isset($_GET['idreceta'])){
		$idreceta=(int) $_GET['idreceta'];

		$buscar_idreceta=$con->prepare('SELECT * FROM receta WHERE idreceta=:idreceta LIMIT 1');
		$buscar_idreceta->execute(array(
			':idreceta'=>$idreceta
		));
		$resultado=$buscar_idreceta->fetch();
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
	<title>Clínica Médica "La Bendición" | Editar Receta</title>
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
		<h2>EDITAR INFORMACIÓN DE LA RECETA</h2>
		<form action="PrescriptionUpdate1.php" method="post">
			<div class="form-group">
				<input type="number" name="idreceta" style="text-align: center" readonly value="<?php if($resultado) echo $resultado['idreceta']; ?>" class="input__text">
				<textarea name="diagnostico" style="line-height: 20px" rows="15" class="input__text"><?php if($resultado) echo $resultado['diagnostico']; ?></textarea>
				<textarea name="tratamiento" style="line-height: 20px" rows="15" class="input__text"><?php if($resultado) echo $resultado['tratamiento']; ?></textarea>
			</div>
			<div class="btn__group">
				<a href="PrescriptionRead.php" class="btn btn__danger">Cancelar</a>
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
