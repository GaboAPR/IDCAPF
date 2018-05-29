<?php 
require ("../../../backend/clase/rol.class.php");
$obj_rol=new rol;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		Agregar Usuario
	</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="../../../backend/controlador/usuario.php" method="POST">
		<input type="hidden" name="accion" value="agregar">
			<div class="container">
				<div class="row mt-2 mb-2">
					<div class="col-12 bg-primary text-white text-center">
						<h4>Agregar Usuario</h4>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-4">Email:</div>
					<div class="col-8">
						<input type="text" name="ema_usu" id="ema_usu" placeholder="email@email.com" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-4">Clave:</div>
					<div class="col-8">
						<input type="password" name="cla_usu" id="cla_usu" placeholder="Clave" class="form-control">
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-4">Nombre:</div>
					<div class="col-8">
						<input type="text" name="nom_usu" id="nom_usu" placeholder="Nombre" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-4">Apellido:</div>
					<div class="col-8">
						<input type="text" name="ape_usu" id="ape_usu" placeholder="Apellido" class="form-control">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-4">Rol:</div>
					<div class="col-8">
						<select name="fky_rol" id="fky_rol" class="form-control">
							<option value="X">Seleccione...</option>
							<?php
							$ret=$obj_rol->listar();
							while (($rol=$obj_rol->extraer_dato($ret))>0)
							{
								echo "<option value='$rol[cod_rol]'>$rol[nom_rol]</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-4">Estatus:</div>
					<div class="col-8">
						<select name="est_usu" id="est_usu" class="form-control">
							<option value="X">Seleccione...</option>
							<option value="A">Activo</option>
							<option value="I">Inactivo</option>
						</select>
					</div>
				</div>
				<div class="row mt-2 text-center">
					<div class="col">
						<input type="submit" class="btn btn-primary" value="Guardar Usuario">
					</div>
				</div>
			</div>
	</form>
</body>
</html>