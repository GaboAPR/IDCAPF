<?php 
 	require ("../../../backend/clase/modulo.class.php");
 	$obj_mod=new modulo;
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Opcion</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="../../../backend/controlador/opcion.php" method="POST">
		<input type="hidden" name="accion" id="accion" value="agregar">
		<div class="container">
			<div class="row">
				<div class="col-12 bg-primary text-white text-center">Agregar Opcion</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8"><input type="text" name="nom_opc" id="nom_opc" placeholder="Nombre de la opcion" class="form-control"></div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Modulo</div>
				<div class="col-8">
					<select name="fky_modulo" id="fky_modulo" class="form-control">
					<?php 
							$ret=$obj_mod->listar();
							while(($mod=$obj_mod->extraer_dato($ret))>0)
							{
								echo "<option value='$mod[cod_mod]'> 
								      $mod[nom_mod] 
								     </option>";
							}
					?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">URL:</div>
				<div class="col-8">
					<input type="text" name="url_opc" id="url_opc" placeholder="URL de la opcion" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_opc" id="est_opc" class="form-control">
						<option value="">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12 text-center">
					<input type="submit" class="btn btn-primary" value="Guardar Opcion">
				</div>
			</div>
		</div>
	</form>
</body>
</html>