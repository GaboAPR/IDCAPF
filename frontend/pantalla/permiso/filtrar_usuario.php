<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Usuario</title>
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<!-- .container>.row*3>.col*2 -->
<form action="asignar_permisos.php" method="POST">
<input type="hidden" value="1" name="pagina">	
	<div class="container justify-content-center">
		<div class="row mt-2">
			<div class="col bg-primary text-center text-white">	
				<h4>Buscar Usuario</h4>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-3 text-right">Email:</div>
			<div class="col-9">
				<input type="text" name="ema_usu" id="ema_usu" class="form-control" placeholder="Correo del Usuario">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col text-center">
				<input type="submit" class="btn btn-primary" value="Continuar">
			</div>
		</div>
	</div>
</form>

</body>
</html>