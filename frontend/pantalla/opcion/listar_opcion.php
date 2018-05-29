<?php 
require ("../../../backend/clase/opcion.class.php");
require ("../../../backend/clase/modulo.class.php");

$obj_opc=new opcion;
$obj_mod=new modulo;

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Listar Opcion</title>
 	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/estilo.css">
 </head>
 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-12 bg-primary text-white text-center">Listar Opcion</div>
 		</div>
 			<div class="row mt-2 bg-primary text-white">
 				<div class="col-1 text-center">Codigo:</div>
 				<div class="col-2 text-center">Nombre:</div>
 				<div class="col-2 text-center">Modulo:</div>
 				<div class="col-3 text-center">URL:</div>
 				<div class="col-2 text-center">Estado:</div>
 				<div class="col-1 text-center">Editar:</div>
 				<div class="col-1 text-center">Borrar:</div>
 			</div>
 			<?php 
 			$ret=$obj_opc->filtrar();
 			while (($opcion=$obj_opc->extraer_dato($ret))>0) {
 				?>
 				<div class="row mt-2">
 					<div class="col-1 text-center"><?php echo $opcion['cod_opc']; ?></div>
 					<div class="col-2 text-left"><?php echo $opcion['nom_opc']; ?></div>
 					<div class="col-2 text-left">
 					<?php
 						echo $opcion['nom_mod'];
 					 ?></div>
 					<div class="col-3 text-left"><?php echo $opcion['url_opc']; ?></div>
 					<div class="col-2 text-center">
 						<?php 
 		echo ($opcion['est_opc']=="A")?"Activo":"Inactivo"; 
 						?>						
 						</div>
 					<div class="col-1 text-center">Editar</div>
 					<div class="col-1 text-center">Borrar</div>
 				</div>
 				<?php
 			}
 			 ?>
 	</div>
 </body>
 </html>