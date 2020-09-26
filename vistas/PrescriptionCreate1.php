<?php

$conexion = mysqli_connect("localhost","root","123456","clinica_bendicion")or
die("PROBLEMAS CON LA CONEXION");
		
		$idreceta=rand(1,100000000);
		$diagnostico = $_POST["diagnostico"];
		$tratamiento = $_POST["tratamiento"];
		$idusuario = 1410131310;
		$idcita = $_POST["idcita"];
				
		if(!empty($diagnostico) && !empty($tratamiento)){
		
		#$query_busqueda =  "SELECT * FROM cita WHERE idcita = '".$idcita."'";
 
		#$query = mysqli_query($conexion,$query_busqueda);
		
		mysqli_query($conexion, "INSERT INTO receta (idreceta, diagnostico, tratamiento,  idcita, idusuario)
		VALUES ($idreceta,'$_REQUEST[diagnostico]','$_REQUEST[tratamiento]',$_REQUEST[idcita],$idusuario)")
		or die("Problemas en el select" . mysqli_error($conexion));
		
		mysqli_close($conexion);

			header('Location: PrescriptionRead.php');
			
		}else{
			header('Location: DateRead.php');
		}
		
?>