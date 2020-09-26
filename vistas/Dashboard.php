<?php
	session_start();

	if(isset($_SESSION['user'])){
	#Sesion de usuario
	
	include_once 'Conection.php';
			
	$sentencia_select=$con->prepare('CALL Citas_Hoy();'); 
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
		
?>

<!DOCTYPE html> 
<html>
<head>
	<!-- -->
    <meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición | Dashboard"</title>
	<link rel="stylesheet" href="../css/Dashboard.css">
	<link rel="stylesheet" href="../css/Estilo1.css">
	<link rel="stylesheet" href="../css/Usuario.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
		
	<center>
	<header id="Encabezado">
	</header>
	</center>
	
	<div>
	<h3><a href="" style="color:black"> Usuario:<?php echo $login=$_SESSION['user']; ?></a> |
	<a href="../vistas/Dashboard.php" style="color:black">Inicio</a> |
	<a href="../Salir.php" style="color:black">Salir</a>
	</h3>
	</div>

   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li class="active">
               <center><a href="">Clínica Médica "La Bendición"</a></center>
			   <center><img src="../img/photo.jpg" width="120" height="120"/></center>
			   <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> Usuarios</a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="UsersCreate.php">- Crear Usuarios</a></li>
                  <li><a href="UsersRead.php">- Reporte Usuarios</a></li>
               </ul>
            </li>
			<li class="active">
               <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span> Pacientes</a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="PatientsCreate.php">- Crear Pacientes</a></li>
                  <li><a href="PatientsRead.php">- Reporte Pacientes</a></li>
               </ul>
            </li>
			<li class="active">
               <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span> Citas</a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="PatientsRead.php">- Crear Citas</a></li>
                  <li><a href="DateRead.php">- Reporte Citas</a></li>
               </ul>
            </li>
			<li class="active">
               <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-line-chart fa-stack-1x "></i></span> Reportes</a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="PrescriptionRead.php">- Reporte Recetas</a></li> 
               </ul>
            </li>
         </ul>
      </div>
   </div>

	<div class="contenedor">
		</br></br>
		<h2>CITAS DE HOY</h2>
		
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
					<td><a href="PrescriptionCreate.php?idcita=<?php echo $fila['idcita']; ?>" class="btn__update">Recetar</a></td>
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
