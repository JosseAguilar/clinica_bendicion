<?php 

	include_once 'Conection.php';
	if(isset($_GET['idusuario'])){
		$idusuario=(int) $_GET['idusuario'];
		$delete=$con->prepare('DELETE FROM usuario WHERE idusuario=:idusuario');
		$delete->execute(array(
			':idusuario'=>$idusuario
		));
		header('Location: UsersRead.php');
	}else{
		header('Location: UsersRead.php');
	}
 ?>