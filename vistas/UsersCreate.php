<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	
	$idusuario=rand(1,100000000);
?>
<?php ?>
<!DOCTYPE html> 
<html>
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición | Crear Usuario"</title>
	<link rel="stylesheet" href="../css/Crearusuarios1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/Usuarios.css">
</head>
<body>

	<body style="background: #1c4963">

	<div>
	<h3><a href="" style="color:white">Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistas/Dashboard.php" style="color:white">Inicio</a> |
	<a href="../Salir.php" style="color:white">Salir</a>
	</h3>
	</div>

	</br>
	<form action="UsersCreate1.php" method="post"></br>
		<h2><i class="fa fa-user fa-stack-1x">Crear Usuario</i></h2></br>
		<input type="number" name="idusuario" readonly value="<?php echo $idusuario; ?>"></br>
		<input type="text" name="nombre" placeholder="nombre*"></br>
		<input type="text" name="apellido" placeholder="apellido*"></br>
		<input type="text" name="login" placeholder="login*"></br>
		<select name="idtipousuario">
		<option value="1">Administrador</option>
		<option value="2">Secretaria</option>
		</select></br>
		<input type="email" name="correo" placeholder="correo*"></br>
		<input type="number" name="telefono" placeholder="telefono*"></br>
		<input type="password" name="contrasena" placeholder="contraseña*"></br>
		<!--imagen / imagen-->
		<!--estado es por default / estado-->
		<!--fecha actual / fechacreado -->
		<input type="submit" name="crearusuarios" value="Guardar">
	</form>
	<form  action="Dashboard.php" class="dif">
		<input type="submit" name="crearusuarios" value="Cancelar">
	</form>
</body>
</html>

<?php
} else {
	header("location:../Index.php");
	}
 ?>
