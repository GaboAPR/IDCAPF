<?php
session_start();
if(@$_GET["accion"]=="cerrar")
{
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ingresar al Sistema</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="frontend/css/estilo.css">
	<link rel="stylesheet" href="frontend/bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
<div class="contenedor" width="100%" height="100%">
	<div class="superior text-center fondo-morado  text-white">
		<h2 class="centrar-vertical"><img src="frontend/img/logo22.png"></h2>
	</div>
<form action="backend/controlador/inicio_sesion.php" method="POST">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-6">
				<br>
				<br>
				<br>
				<div class="row mt-2">
					<div class="col fondo-morado text-white text-center">
						<h4>Iniciar Sesión</h4>
					</div>
				</div>
				<div class="row bg-light mt-2">
					<div class="col-4">Email:</div>
					<div class="col-8">
						<input type="text" name="ema_usu" placeholder="Correo Electrónico" class="form-control">
					</div>
				</div>
				<div class="row bg-light mt-2">
					<div class="col-4">Clave:</div>
					<div class="col-8">
						<input type="password" name="cla_usu" placeholder="Clave" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col text-center">
						<input type="submit" value="Iniciar Sesión" class="btn fondo-morado">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="inferior text-center fondo-morado text-white">
	<small class="centrar-vert-med">Platinum Fleet S.A. de C.V. Todos los derechos reservados</small>
</div>	
</div>
</body>
</html>