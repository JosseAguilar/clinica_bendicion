<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="A.A.">
	<meta name="description" content="Clinica">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable:no">
	<title>Clínica Médica "La Bendición | Login"</title>
	
	<?php require_once "Scripts.php"; ?>
</head>
<body style="background: #1c4963">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Clínica Médica "La Bendición"</div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/photo.jpg" width="230" height="250">
					</div>
					
					<form method="post" action="Login.php">
					<table>
					<tr><td align="center" rowspan="20"></td><td> <label> <strong>Usuario</strong> </label> </td></tr>
					<tr><td> <input type="text" name="txtusuario" placeholder="Ingrese su usuario" size="40" /> </td></tr>
					<tr><td> <label> <strong>Contraseña</strong> </label> </td></tr>
					<tr><td> <input type="password" name="txtpassword" placeholder="Ingrese su contraseña" size="40" /> </td></tr> 
					<tr><td> </br><input type="submit" value="Ingresar" style="width:320px; height:35px; color:white; background-color: #1b743c" color="#ff00ff" /> </td></tr>   
					</table>
					</form>
					
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>