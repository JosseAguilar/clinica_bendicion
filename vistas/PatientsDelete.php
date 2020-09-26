<?php 

	include_once 'Conection.php';
	if(isset($_GET['idpaciente'])){
		$idpaciente=(int) $_GET['idpaciente'];
		$delete=$con->prepare('DELETE FROM paciente WHERE idpaciente=:idpaciente');
		$delete->execute(array(
			':idpaciente'=>$idpaciente
		));
		header('Location: PatientsRead.php');
	}else{
		header('Location: Patients.php');
	}
 ?>