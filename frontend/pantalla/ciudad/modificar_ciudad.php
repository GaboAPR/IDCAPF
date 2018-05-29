<?php
require("../../../backend/clase/ciudad.class.php");
require("../../../backend/clase/estado.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new ciudad;
$objEstado=new estado;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

	$resultado=$obj->filtrar($obj->cod_ciu,$nom_ciu="",$est_ciu="");
	$datos=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Ciudad</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/ciudad.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Ciudad</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_ciu" id="nom_ciu" required="required" maxlength="50" class="form-control" placeholder="Nombre de la Ciudad" value="<?php echo $datos['nom_ciu']; ?>">
		</div>

	  </div>


	 <div class="row mt-2 bg-light">
		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Estado:</label>
		</div>	 	
	 <div class="col-md-8 col-12">
			   <select name="fky_estado" id="fky_estado" class="form-control">
			   <option>Seleccione...</option>
			   <?php
			   $objEstado->est_est="A";
			   $est=$objEstado->listar();
			   while(($estado=$obj->extraer_dato($est))>0)
			   {	
			   		if($estado['cod_est']==$datos['fky_estado'])
			   			$selected='selected';
			   		     else
			   		     	$selected='';

			   		echo "<option value='$estado[cod_est]' $selected>$estado[nom_est]</option>";
			   }
			   ?>
			   </select>
		  </div>
	</div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_ciu" id="est_ciu" class="form-control">
			 <?php
			 $selected = ($datos['est_ciu']=='A') ? "selected":"";
			 echo "<option value='A' $selected>Activo</option>";
			 $selected = ($datos['est_ciu']=='I') ? "selected":"";
			 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Ciudad">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="modificar">	
<input type="hidden" name="cod_ciu" id="cod_ciu" value="<?php echo $datos['cod_ciu'] ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>