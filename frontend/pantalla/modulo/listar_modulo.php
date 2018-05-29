<?php 
require ("../../../backend/clase/modulo.class.php");
$obj_mod=new modulo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Módulo</title>
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 bg-primary text-white text-center">Listar Módulo</div>
		</div>
		<div class="row mt-2 text-center bg-primary text-white">
			<div class="col-1">Código</div>
			<div class="col-2">Nombre</div>
			<div class="col-4">Url</div>
			<div class="col-1">Estatus</div>
			<div class="col-2">Editar</div>
			<div class="col-2">Borrar</div>
		</div>
			<?php
			$ret=$obj_mod->listar();
			while(($modulo=$obj_mod->extraer_dato($ret))>0)
			{
			?>
				<div class="row mt-2">
					<div class="col-1"><?php echo $modulo['cod_mod']?></div>
					<div class="col-2"><?php echo $modulo['nom_mod'] ?></div>
					<div class="col-4"><?php echo $modulo['url_mod']?></div>
					<div class="col-1">
						<?php echo ($modulo['est_mod']=="A")?"Activo":"Inactivo";?>		
					</div>
					<div class="col-2">Modificar</div>
					<div class="col-2">Eliminar</div>
				</div>
			<?php
			}
			?>
	</div>
	
</body>
</html>