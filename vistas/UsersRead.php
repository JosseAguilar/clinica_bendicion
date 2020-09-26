<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	
	include_once 'Conection.php';

	$sentencia_select=$con->prepare('CALL R_Usuarios();'); 
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT usuario.*, tipousuario.tipo from usuario
			INNER JOIN tipousuario ON usuario.idtipousuario=tipousuario.idtipousuario WHERE nombre LIKE :campo OR apellido LIKE :campo 
			OR estado LIKE :campo OR tipo LIKE :campo;'
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
	<title>Clínica Médica "La Bendición | Reporte Usuarios"</title>
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
		<h2>REPORTE DE USUARIOS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por nombre, apellido, tipo, estado" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="UsersCreate.php" class="btn btn__nuevo">CREAR</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>IdUsuario</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Tipo Usuario</td>
				<td>Correo</td>
				<td>Teléfono</td>
				<td>Estado</td>
				<td>Fecha Creación</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idusuario']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['tipo']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['estado']; ?></td>
					<td><?php echo $fila['fechacreado']; ?></td>
					<td><a href="UsersUpdate.php?idusuario=<?php echo $fila['idusuario']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="UsersDelete.php?idusuario=<?php echo $fila['idusuario']; ?>" class="btn__delete">Eliminar</a></td>
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