<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Rol</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/rol.php" method="POST">
<input type="hidden" name="accion" value="agregar">
	
	<div class="container">
		<div class="row mt-2 mb-2">
			<div class="col-12 bg-primary text-white text-center">
				Agregar Rol
		    </div>
		</div>
		<div class="row">
			<div class="col-4">Nombre:</div>
			<div class="col-8">
				<input type="text" name="nom_rol" placeholder="Nombre del Rol" class="form-control">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-4">Estatus:</div>
			<div class="col-8">
				<select name="est_rol" id="est_rol" class="form-control">
					<option value="">Seleccione...</option>
					<option value="A">Activo</option>
					<option value="I">Inactivo</option>
				</select>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-12 text-center">
				<!-- Comentario-->
				<input type="submit" class="btn btn-primary" value="Guardar Rol">
			</div>
		</div>
	</div>
</form>
	
</body>
</html>