<?php
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new cliente;
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
	<title>Listar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>

<form action="listar_cliente.php" method="POST">

	<div class="container-fluid">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Cliente</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-2 col-12 border border-white">
		  <a>Ver</a> 
		  <a>Editar</a>  
		  
		</div>

		<div class="col-md-2 col-12  border border-white">
		     <span>RFC</span>
		</div>

		<div class="col-md-2 col-12 border border-white ">
		     <span>Nombre Comercial</span>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <span>Monto Crédito</span>
		</div>
		
	 	<div class="col-md-1 col-12 border border-white">
		     <span>Días Crédito</span>
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span>Fecha Pago</span>
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span>Estatus</span>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		$num_fil=0;
		$resultado=$obj->filtrar($obj->cod_cli,$obj->rfc_cli,$obj->com_cli);
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-2 col-12 border border-white text-center">
		  <a href="<?php echo "ver_cliente.php?cod_cli=$datos[cod_cli]"?>">Ver</a> 
		  <a href="<?php echo "modificar_cliente.php?cod_cli=$datos[cod_cli]"?>">Editar</a>  
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span><?php echo $datos['rfc_cli']; ?></span>
		</div>

		<div class="col-md-2 col-12 border border-white text-uppercase">
		     <span><?php echo $datos['com_cli']; ?></span>
		</div>

		<div class="col-md-1 col-12 border border-white text-uppercase">
		     <span><?php echo $datos['cre_cli']; ?></span>
		</div>
		
	 	<div class="col-md-1 col-12 border border-white">
		      <span><?php echo $datos['dia_cli']; ?></span>
		</div>

		<div class="col-md-2 col-12 border border-white text-left text-lowercase">
		     <span><?php echo $datos['pag_cli']; ?></span>
		</div>

	    <div class="col-md-2 col-12 border border-white text-left ">
		     <span><?php 
						if($datos['est_cli']=='A') 
							echo "Activo";
							 else 
							    echo "Inactivo"; 
					?></span>
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
	  
	</div> <!-- Fin Container -->

</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>