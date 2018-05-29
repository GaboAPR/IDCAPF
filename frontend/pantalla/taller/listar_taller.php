<?php
require("../../../backend/clase/taller.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new taller;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);


if($acceso["est_per"]=="A")
{


	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Taller</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>


<form action="listar_taller.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-11 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Taller</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-2 col-12 border border-white">
		  Ver 
		  Editar 
		  
		</div>

		<div class="col-md-3 col-12 border border-white ">
		     <span>Taller</span>
		</div>

		<div class="col-md-2 col-12 border border-white ">
		     <span>Responsable</span>
		</div>

		<div class="col-md-2 col-12 border border-white ">
		     <span>Ciudad</span>
		</div>

		<div class="col-md-2 col-12 border border-white ">
		     <span>Telefono</span>
		</div>		

		<div class="col-md-1 col-12 border border-white">
		     <span>Estatus</span>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;

		$resultado=$obj->filtrar("",$obj->nom_tal,"");
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-2 col-12 border border-white text-center">
		  <a href="<?php echo "ver_taller.php?cod_tal=$datos[cod_tal]"?>">Ver</a> 
		  <a href="<?php echo "modificar_taller.php?cod_tal=$datos[cod_tal]"?>">Editar</a>  
		</div>

		<div class="col-md-3 col-12 border border-white text-left">
		     <span><?php echo $datos['nom_tal']; ?></span>
		</div>

		<div class="col-md-2 col-12 border border-white text-left">
		     <span><?php echo $datos['res_tal']; ?></span>
		</div>

		<div class="col-md-2 col-12 border border-white text-left">
		     <span><?php echo $datos['nom_ciu']; ?></span>
		</div>

		<div class="col-md-2 col-12 border border-white text-left">
		     <span><?php echo $datos['te1_tal']; ?></span>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <span>
		     	<?php echo ($datos['est_tal']=="A") ? "Activa":"Inactiva"; ?>
		     </span>
		</div>
		
		<?php
		}

		if($num_fil==0){
		?>
		<div class="col-12 border border-white text-center">
		     <span>No hay registros</span>
		</div>
		<?php
		}	
		?>

	  </div>

	  </div>

	 </div> 
	  
	</div> <!-- Fin Container -->

</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}

?>