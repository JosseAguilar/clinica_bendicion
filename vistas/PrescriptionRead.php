<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	$sentencia_select=$con->prepare('CALL R_Recetas();'); 
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT cita.idcita, cita.fecha, paciente.nombre, paciente.apellido, 
			receta.idreceta, receta.diagnostico, receta.tratamiento FROM cita 
			INNER JOIN paciente ON paciente.idpaciente=cita.idpaciente 
			INNER JOIN receta ON receta.idcita=cita.idcita WHERE nombre LIKE :campo OR apellido LIKE :campo
			OR cita.idcita LIKE :campo OR cita.fecha LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
	
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Reporte Receta</title>
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
		<h2>REPORTE DE RECETAS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por idcita, nombre, apellido, fecha" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="DateRead.php" class="btn btn__nuevo">CREAR</a>
			</form>
		</div>
		<table>	

			<tr class="head">
				<td>Id Cita</td>
				<td>Fecha</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Diagnóstico</td>
				<td>Receta</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
			<tr>
				<td><?php echo $fila['idcita']; ?></td>
				<td><?php echo $fila['fecha']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php echo $fila['apellido']; ?></td>
				<td><?php echo $fila['diagnostico']; ?></td>
				<td><?php echo $fila['tratamiento']; ?></td>
				<td><a href="PrescriptionReadComplete.php?idcita=<?php echo $fila['idcita']; ?>" class="btn__update">Visualizar</a></td>
				<td><a href="PrescriptionUpdate.php?idreceta=<?php echo $fila['idreceta']; ?>"  class="btn__update" >Editar</a></td>
			</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>

<?php
} else {
	header("location:../Index.php");
	}
 ?>
