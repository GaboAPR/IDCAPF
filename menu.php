<?php
session_start();
require("backend/clase/permiso.class.php");
$obj_per=new permiso;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Platinum Fleet</title>
	<link rel="stylesheet" href="frontend/css/estilo.css">
	<link rel="stylesheet" href="frontend/bootstrap-4.0/css/bootstrap.min.css">

</head>

<body style="background-color: #45B5E2;">
<div class="contenedor" style="background-color: #FFFFFF;">
	<div class="superior text-center fondo-morado  text-white">
		<h2 class="centrar-vertical"><img src="frontend/img/logo22.png"></h2>
	</div>
	<div class="izquierda" style="background-color: #d1d3d6;">
	  <div id="acordion" role="tablist" aria-multiselectable="true">
		<ul class="mt-3">

		<?php
	$i=0;
	$mod_ant="";
	$per=$obj_per->construir_menu($_SESSION['fky_usuario']);
	while(($permiso=$obj_per->extraer_dato($per))>0)
	{

	$url=$permiso["url_mod"]."/".$permiso["url_opc"];	

		if($mod_ant!=$permiso['nom_mod'])
		{
		   if($i>0)
		    echo "</div>";	
		 
		 echo "<li class='fondo-morado text-center'>
		 <a href='#collapse$i' data-toggle='collapse' data-parent='#acordion' aria-expanded='true' aria-controls='collapse$i' class='text-white titulo'>
		 		$permiso[nom_mod]
		 </a>
		 </li>";
		 $mod_ant=$permiso['nom_mod'];

		 echo "<div id='collapse$i' class='collapse' role='tabpanel' aria-labelledby='heading$i'>";
		 $i++;
		}

		echo "<li class='menu-opcion'>
				<a href='$url' target='destino'>
					$permiso[nom_opc]
				</a>
			</li>";
		}		
		?>	
		</div>	
		<li class='bg-danger text-center'>
			<a href='index.php?accion=cerrar'>
			  Cerrar Sesión
			</a>		
		</li>																	
		</ul>
	  </div>
	</div>

	<div class="derecha">
		<iframe src="frontend/pantalla/bienvenida.html" frameborder="0" name="destino" width="100%" height="100%"></iframe>
	</div>
	<div class="inferior text-center fondo-morado text-white">
		<small  class="centrar-vert-med">Platinum Fleet S.A. de C.V. Todos los derechos reservados</small>
	</div>
</div>


    <script src="frontend/bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="frontend/bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="frontend/bootstrap-4.0/js/bootstrap.min.js"></script>

</body>
</html>