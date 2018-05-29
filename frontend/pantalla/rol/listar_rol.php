<?php
require("../../../backend/clase/rol.class.php");
$obj_rol=new rol;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Rol</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">	
	<div class="row">
		<div class="col-12 bg-primary text-white text-center">Listar Rol</div>
	</div>
	<div class="row mt-2 text-center bg-primary text-white">
		<div class="col-2">Código</div>
		<div class="col-4">Nombre</div>
		<div class="col-2">Estatus</div>
		<div class="col-2">Editar</div>
		<div class="col-2">Borrar</div>
	</div>
	<?php
			$ret=$obj_rol->listar();	
			while(($rol=$obj_rol->extraer_dato($ret))>0)
			{
			?>
			<!-- .row>.col*5 -->
				<div class="row mt-2">
					<div class="col-2"><?php echo $rol['cod_rol'] ?></div>
					<div class="col-4"><?php echo $rol['nom_rol'] ?></div>
					<div class="col-2"><?php echo $rol['est_rol'] ?></div>
					<div class="col-2">Editar</div>
					<div class="col-2">Borrar</div>
				</div>
			<?php
			}
	?>	
</div>
</body>
</html>