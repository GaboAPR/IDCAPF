<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/taller.class.php");
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/estado.class.php");

$obj=new taller;
$objBanco=new banco;
$objPermiso=new permiso;
$objEstado=new estado;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Taller</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/ciudad.js" type="text/javascript"></script>
</head>
<body>

<form action="../../../backend/controlador/taller.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-11">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Agregar Taller</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_tal" id="nom_tal" required="required" maxlength="50" class="form-control" placeholder="Nombre del Taller" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Ubicación/Dirección:</label>
		</div>
		<div class="col-md-7 col-12">
		    <input type="text" name="ubi_tal" id="ubi_tal" required="required" maxlength="120" class="form-control" placeholder="Ubicación del Taller" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Responsable:</label>
		</div>
		<div class="col-md-7 col-12">
		    <input type="text" name="res_tal" id="res_tal" required="required" maxlength="50" class="form-control" placeholder="Persona Responsable del Taller" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Principal:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te1_tal" id="te1_tal" required="required" maxlength="15" class="form-control" placeholder="Teléfono Principal" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te2_tal" id="te2_tal" required="required" maxlength="15" class="form-control" placeholder="Teléfono Secundario" onkeyup="return solo_letras();">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email del Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_tal" id="ema_tal" required="required" maxlength="80" class="form-control" placeholder="Email" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Banco:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_banco" id="fky_banco" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objBanco->asignar_valor("est_ban","A");
		    $pun_ban=$objBanco->listar();
		    while(($banco=$objBanco->extraer_dato($pun_ban))>0)
		    {
		    	echo "<option value='$banco[cod_ban]'>$banco[nom_ban]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Clabe Interbancaria:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="cue_tal" id="cue_tal" required="required" maxlength="20" class="form-control" placeholder="Clave Interbancaria" onkeyup="return solo_letras();">
		</div>

	  </div>


      <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Tipo de Taller:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="tip_tal" id="tip_tal" class="form-control">
			<option value="x"">Seleccione...</option>			
			<option value="D"">Gasolina</option>
			<option value="G">Diesel</option>			
			<option value="M">Mixto</option>	
		</select>
		</div>
	   </div>

	  <div class="row mt-2 bg-light">

	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estado:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_estado" id="fky_estado" class="form-control" onchange="seleccionar_ciudad()">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objEstado->asignar_valor("est_est","A");
		    $pun_est=$objEstado->listar();
		    while(($estado=$objEstado->extraer_dato($pun_est))>0)
		    {
		    	echo "<option value='$estado[cod_est]'>$estado[nom_est]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>


		<div class="row mt-2 bg-light">
	        <div class="col-md-3 col-12 align-self-center text-left">
			     <label for="">Ciudad:</label>
			</div>
			<div class="col-md-4 col-12 text-muted" id="zona_ciudad">
			 Seleccione estado primero...
			</div>
		</div>	

	
	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_tal" id="est_tal" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Taller">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="agregar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>