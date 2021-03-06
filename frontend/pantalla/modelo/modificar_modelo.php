<?php
require("../../../backend/clase/modelo.class.php");
require("../../../backend/clase/marca.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new modelo;
$objMarca=new marca;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_mod,$nom_mod="",$est_mod="");
$modelo=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Modelo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/modelo.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Modelo</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Marca:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_marca" id="fky_marca" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objMarca->asignar_valor("est_mar","A");
		    $pun_mar=$objMarca->listar();
		    while(($marca=$objMarca->extraer_dato($pun_mar))>0)
		    {
		    	$selected=($marca["cod_mar"]==$modelo["fky_marca"])?"selected":""; 
		    	echo "<option value='$marca[cod_mar]' $selected>$marca[nom_mar]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_mod" id="nom_mod" required="required" maxlength="35" class="form-control" placeholder="Nombre del Modelo" onkeyup="return solo_letras();" value="<?php echo $modelo['nom_mod']?>">
		</div>

	  </div>	

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_mod" id="est_mod" class="form-control">
		<?php
		    $selected=($modelo["est_mod"]=="A")?"selected":"";
		  	echo "<option value='A' $selected>Activa</option>";
		    $selected=($modelo["est_mod"]=="I")?"selected":"";		  	
			echo "<option value='I' $selected>Inactiva</option>";	
		?>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Modelo">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="modificar">	
<input type="hidden" name="cod_mod" id="cod_mod" value="<?php echo $modelo["cod_mod"];?>">		
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>