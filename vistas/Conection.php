<?php
	$database="clinica_bendicion";
	$user='root';
	$password='123456';


try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}


?>