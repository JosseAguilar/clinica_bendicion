<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	
	$idpaciente=rand(1,100000000);
?>

<!DOCTYPE html> 
<html>
<head>

	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición" | Crear Paciente</title>
	<link rel="stylesheet" href="../css/Crearusuarios1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/Usuarios.css">

</head>
<body>
		
	<body style="background: #1c4963">

	<div>
	<h3><a href="" style="color:white">Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistassecre/Dashboard.php" style="color:white">Inicio</a> |
	<a href="../Salir.php" style="color:white">Salir</a>
	</h3>
	</div>

	</br>
	<form action="PatientsCreate1.php" method="post"></br>
		<h2><i class="fa fa-user fa-stack-1x ">Crear Paciente</i></h2></br>
		<input type="number" name="idpaciente" readonly value="<?php echo $idpaciente; ?>"></br>
		<input type="text" name="nombre" placeholder="nombre*"></br>
		<input type="text" name="apellido" placeholder="apellido*"></br>
		<select name="genero">
		<option value="Masculino">Masculino</option>
		<option value="Femenino">Femenino</option>
		</select></br>
		<select name="tiposangre">
		<option value="S/E">Tipo Sangre</option>
		<option value="O-">O-</option>
		<option value="O+">O+</option>
		<option value="A-">A-</option>
		<option value="A+">A+</option>
		<option value="B-">B-</option>
		<option value="B+">B+</option>
		<option value="AB-">AB-</option>
		</select></br>
		<input type="text" name="direccion" placeholder="direccion*"></br>
		<input type="number" name="telefono" placeholder="telefono*"></br>
		<input type="email" name="correo" placeholder="correo*"></br>
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
