<?php
require("../../../backend/clase/taller.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/estado.class.php");
require("../../../backend/clase/ciudad.class.php");

$obj=new taller;
$objBanco=new banco;
$objEstado=new estado;
$objPermiso=new permiso;
$objCiudad=new ciudad;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

	$resultado=$obj->filtrar($obj->cod_tal,$nom_tal="",$est_tal="");
	$taller=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Taller</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/taller.php" method="POST">

  <div class="container">
		<div class="row justify-content-center">
	<div class="col-8  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Ver Taller</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_tal" id="nom_tal" required="required" maxlength="50" class="form-control" placeholder="Nombre del Taller" onkeyup="return solo_letras();" value="<?php echo $taller['nom_tal'] ?>" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Ubicación/Dirección:</label>
		</div>
		<div class="col-md-7 col-12">
		    <input type="text" name="ubi_tal" id="ubi_tal" required="required" maxlength="120" class="form-control" placeholder="Ubicación del Taller" onkeyup="return solo_letras();" value="<?php echo $taller['ubi_tal'] ?>" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Responsable:</label>
		</div>
		<div class="col-md-7 col-12">
		    <input type="text" name="res_tal" id="res_tal" required="required" maxlength="50" class="form-control" placeholder="Persona Responsable del Taller" onkeyup="return solo_letras();" value="<?php echo $taller['res_tal'] ?>" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Principal:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te1_tal" id="te1_tal" required="required" maxlength="15" class="form-control" placeholder="Teléfono Principal" onkeyup="return solo_letras();"  value="<?php echo $taller['te1_tal'] ?>" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te2_tal" id="te2_tal" required="required" maxlength="15" class="form-control" placeholder="Teléfono Secundario" onkeyup="return solo_letras();" value="<?php echo $taller['te2_tal'] ?>" disabled>
		</div>
	  </div>


	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email del Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_tal" id="ema_tal" required="required" maxlength="80" class="form-control" placeholder="Email" onkeyup="return solo_letras();" value="<?php echo $taller['ema_tal'] ?>" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Banco:</label>
		</div>
		<div class="col-md-4 col-12">
			<fieldset disabled>
		    <select name="fky_banco" id="fky_banco" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objBanco->asignar_valor("est_ban","A");
		    $pun_ban=$objBanco->listar();
		    while(($banco=$objBanco->extraer_dato($pun_ban))>0)
		    {
		    	if($banco['cod_ban']==$taller['fky_banco'])
		    		$selected='selected';
		    	     else
		    	     	$selected='';
		    	
		    	echo "<option value='$banco[cod_ban]' $selected>$banco[nom_ban]</option>";
		    }	
		    ?>
		    </select>
		    </fieldset>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Clabe Interbancaria:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="cue_tal" id="cue_tal" required="required" maxlength="20" class="form-control" placeholder="Clave Interbancaria" onkeyup="return solo_letras();" value="<?php echo $taller['cue_tal'] ?>" disabled>
		</div>
	  </div>


    <div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Tipo de Taller:</label>
	  </div>
	  <div class="col-md-4 col-12">
	   <fieldset disabled>
		<select name="tip_tal" id="tip_tal" class="form-control">
			<option value="x">Seleccione...</option>			
			<option value="D" <?php echo $selected=($taller['tip_tal']=="D")?"selected":""; ?>>Gasolina</option>
			<option value="G" <?php echo $selected=($taller['tip_tal']=="G")?"selected":""; ?>>Diesel</option>			
			<option value="M" <?php echo $selected=($taller['tip_tal']=="M")?"selected":""; ?>>Mixto</option>	
		</select>
	   </fieldset>
	  </div>
	</div>

	<div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estado:</label>
	  </div>
	  <div class="col-md-4 col-12">
	  		<fieldset disabled>
		    <select name="fky_estado" id="fky_estado" class="form-control" onchange="seleccionar_ciudad()">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objEstado->asignar_valor("est_est","A");
		    $pun_est=$objEstado->listar();
		    while(($estado=$objEstado->extraer_dato($pun_est))>0)
		    {
		    	if($estado['cod_est']==$taller['cod_est'])
		    		$selected='selected';
		    	     else
		    	     	$selected=''; 

		    	echo "<option value='$estado[cod_est]' $selected>$estado[nom_est]</option>";
		    }	
		    ?>
		    </select>
		</fieldset>
	    </div>
	</div>


	<div class="row mt-2 bg-light">
	        <div class="col-md-3 col-12 align-self-center text-left">
			     <label for="">Ciudad:</label>
			</div>
			<div class="col-md-4 col-12 text-muted" id="zona_ciudad">
			<fieldset disabled>
			 <select name="fky_ciudad" id="fky_ciudad" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objCiudad->asignar_valor("est_ciu","A");
		    $pun_est=$objCiudad->listar();
		    while(($ciudad=$objCiudad->extraer_dato($pun_est))>0)
		    {
		    	if($ciudad['cod_ciu']==$taller['fky_ciudad'])
		    		$selected='selected';
		    	     else
		    	     	$selected=''; 

		    	echo "<option value='$ciudad[cod_ciu]' $selected>$ciudad[nom_ciu]</option>";
		    }	
		    ?>
		    </select>
		    </fieldset>
			</div>
	</div>	

	
	<div class="row mt-2 bg-light">
	      <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		  </div>
	      <div class="col-md-4 col-12">
	      <fieldset disabled>
		     <select name="est_tal" id="est_tal" class="form-control">
				<option value="A" selected="">Activo</option>
				<option value="I">Inactivo</option>	
			</select>
		</fieldset>
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