<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	
	include_once 'Conection.php';

	$sentencia_select=$con->prepare('CALL R_Pacientes();'); #ORDER BY idusuario DESC
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM paciente WHERE nombre LIKE :campo OR apellido LIKE :campo OR genero LIKE :campo OR tiposangre LIKE :campo;'
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
	<title>Clínica Médica "La Bendición" | Reporte Pacientes</title>
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

	</br>
	<div class="contenedor">
		<h2>REPORTE DE PACIENTES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por nombre, apellido, genero o tipo sangre" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="PatientsCreate.php" class="btn btn__nuevo">CREAR</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id Paciente</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Género</td>
				<td>Tipo de Sangre</td>
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>Correo</td>
				<td>Fecha Creación</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idpaciente']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['genero']; ?></td>
					<td><?php echo $fila['tiposangre']; ?></td>
					<td><?php echo $fila['direccion']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['fechacreado']; ?></td>
					<td><a href="DateCreate.php?idpaciente=<?php echo $fila['idpaciente']; ?>" class="btn__update">Citar</a></td>
					<td><a href="PatientsUpdate.php?idpaciente=<?php echo $fila['idpaciente']; ?>"  class="btn__update" >Editar</a></td>
			<!--	<td><a href="PatientsDelete.php?idpaciente=<?php echo $fila['idpaciente']; ?>" class="btn__delete">Eliminar</a></td>	-->
					
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