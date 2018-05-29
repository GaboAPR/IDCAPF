<?php 
require '../../../backend/clase/usuario.class.php';
$obj_usu=new usuario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 bg-primary text-white text-center">Listar Usuario</div>
		</div>
		<div class="row mt-2">
			<div class="col">Código</div>
			<div class="col">Email</div>
			<div class="col">Clave</div>
			<div class="col">Registro</div>
			<div class="col">Nombre</div>
			<div class="col">Apellido</div>
			<div class="col">Rol</div>
			<div class="col">Estatus</div>
			<div class="col">Modificar</div>
			<div class="col">Eliminar</div>
		</div>
			<?php  
			$ret=$obj_usu->listar();
			while ($usuario=$obj_usu->extraer_dato($ret)>0)
			{
			?>
			<div class="row mt-2">
				<div class="col"><?php echo $usuario['cod_usu'] ?></div>
				<div class="col"><?php echo $usuario['ema_usu'] ?></div>
				<div class="col"><?php echo $usuario['cla_usu'] ?></div>
				<div class="col"><?php echo $usuario['reg_usu'] ?></div>
				<div class="col"><?php echo $usuario['nom_usu'] ?></div>
				<div class="col"><?php echo $usuario['ape_usu'] ?></div>
				<div class="col"><?php echo $usuario['fky_rol'] ?></div>
				<div class="col"><?php echo $usuario['est_usu'] ?></div>
				<div class="col">Modificar</div>
				<div class="col">Eliminar</div>
			</div>
			<?php
			}
			?>
			
	</div>
</body>
</html>