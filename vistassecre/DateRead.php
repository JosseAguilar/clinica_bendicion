<?php

	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario

	include_once 'Conection.php';

	$sentencia_select=$con->prepare('CALL R_Citas();'); 
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT cita.idcita, cita.fecha, estado.estado_, cita.idpaciente, paciente.nombre, paciente.apellido,
			paciente.genero, paciente.direccion, paciente.telefono, paciente.correo FROM cita 
			INNER JOIN estado ON estado.idestado=cita.idestado 
			INNER JOIN paciente ON cita.idpaciente=paciente.idpaciente WHERE nombre LIKE :campo OR apellido LIKE :campo
			OR estado_ LIKE :campo OR idcita LIKE :campo OR cita.idpaciente LIKE :campo OR genero LIKE :campo OR fecha LIKE :campo
			OR cita.fecha LIKE :campo;'
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
	<title>Clínica Médica "La Bendición" | Reporte Cita</title>
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

	<div class="contenedor">
		<h2>REPORTE DE CITAS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="PatientsRead.php" class="btn btn__nuevo">CREAR</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id Cita</td>
				<td>Fecha</td>
				<td>Estado</td>
				<td>Id Paciente</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Género</td>
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>Correo</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idcita']; ?></td>
					<td><?php echo $fila['fecha']; ?></td>
					<td><?php echo $fila['estado_']; ?></td>
					<td><?php echo $fila['idpaciente']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['genero']; ?></td>
					<td><?php echo $fila['direccion']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><a href="DateUpdate.php?idcita=<?php echo $fila['idcita']; ?>"  class="btn__update" >Editar</a></td>
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
