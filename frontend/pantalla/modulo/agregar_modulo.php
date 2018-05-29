<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		Agregar Módulo
	</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<!-- .container>.row*4>.col*2 
 Ctrl+Shift*G para agregar etiqueta
	-->
	<form action="../../../backend/controlador/modulo.php" method="POST">
		<input type="hidden" name="accion" value="agregar">
		<div class="container">
			<div class="row mt-2 mb-2">
				<div class="col-12 bg-primary text-white text-center">
					<h4>Agregar Módulo</h4>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8">
					<input type="text" name="nom_mod" id="nom_mod" placeholder="Nombre del Módulo" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Url del Módulo:</div>
				<div class="col-8">
					<input type="text" name="url_mod" id="url_mod" placeholder="modulo/" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_mod" id="est_mod" class="form-control">
						<option value="X">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12 text-center">
					<input type="submit" class="btn btn-primary" value="Guardar Módulo">
				</div>
			</div>
		</div>
	</form>
</body>
</html>