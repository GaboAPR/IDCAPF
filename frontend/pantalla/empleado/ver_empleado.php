<?php
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/permiso.class.php");


$obj=new empleado;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_emp,$dni_emp="",$nom_emp="",$ape_emp="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Empleado</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/empleado.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Empleado</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Identificación:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['dni_emp']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center ">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text"  class="form-control text-uppercase" value="<?php echo $datos['nom_emp']; ?>" readonly>
		</div>

	  </div>

	   <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control text-uppercase" value="<?php echo $datos['ape_emp']; ?>" readonly>
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Sexo:</label>
		</div>
		<div class="col-md-4 col-12">
		  <div class="form-check-inline">
						<label class="form-check-label">
						<?php
							$checked = ($datos['sex_emp']=="M") ? "checked":"";
							echo "<input type='radio' name='sex_emp' class='form-check-input mr-2' value='M' $checked>Masculino";
						?>	
						</label>

						<label class="form-check-label">
						<?php
							$checked = ($datos['sex_emp']=="F") ? "checked":"";
							echo "<input type='radio' name='sex_emp'  class='form-check-input mr-2' value='F' $checked>Femenino";
						?>	
						</label>
					</div>
		</div>

	  </div> 

	   <div class="row mt-2 bg-light"">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control text-uppercase" value="<?php echo $datos['ema_emp']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Número de Celular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['te1_emp']; ?>" readonly>
		</div>

	  </div> 


	  <div class="row mt-2 bg-light"">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['te2_emp']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	  <fieldset disabled>
	     <select class='form-control'>
	     <option value="X">Seleccione...</option>
		 <?php
		 $selected = ($datos['est_emp']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_emp']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";	
		 ?>
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