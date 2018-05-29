<?php
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new banco;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_ban,$nom_ban="",$est_ban="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Banco</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/banco.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Banco</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_ban" id="nom_ban" required="required" maxlength="50" class="form-control text-capitalize" placeholder="Nombre del Banco" onkeyup="return solo_numeros();" 
		    value="<?php echo $datos['nom_ban']; ?>">
		</div>

	  </div> 


	  <div class="row mt-2 bg-light">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	     <select name='est_ban' id='est_ban' class='form-control'>
		 <?php
		 $selected = ($datos['est_ban']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_ban']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Banco">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_ban" id="cod_ban" value="<?php echo $datos['cod_ban']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>