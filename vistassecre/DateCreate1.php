<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");

		$idcita = $_POST["idcita"];
		$idpaciente = $_POST["idpaciente"];
		$fecha = $_POST["fecha"];
				
		if(!empty($idcita) && !empty($idpaciente) && !empty($fecha)){
		
		#$query_busqueda =  "SELECT * FROM cita WHERE idcita = '".$idcita."'";
 
		#$query = mysqli_query($conexion,$query_busqueda);
 			
		$idestado_ = 1;
		
		mysqli_query($conexion, "INSERT INTO cita (idcita, idpaciente, fecha, idestado)
		VALUES ($_REQUEST[idcita],$_REQUEST[idpaciente],'$_REQUEST[fecha]',$idestado_)")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);

		echo "El alumno fue dado de alta.";
			
			header('Location: DateRead.php');
			
		}else{
			header('Location: PatientsRead.php');
			
		}
		
?>