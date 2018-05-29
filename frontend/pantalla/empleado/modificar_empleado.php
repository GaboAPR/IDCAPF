<?php
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new Empleado;
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
	<title>Modificar Empleado</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/Empleado.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Empleado</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Cédula:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="dni_emp" id="dni_emp" required="required" maxlength="15" class="form-control" placeholder="Cédula del Empleado" onkeyup="return solo_numeros();" 
		    value="<?php echo $datos['dni_emp']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_emp" id="nom_emp" required="required" maxlength="25" class="form-control text-uppercase" placeholder="Nombre del Empleado" onkeyup="return solo_letras();" value="<?php echo $datos['nom_emp']; ?>">
		</div>

	  </div>

	   <div class="row mt-2 bg-light"">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ape_emp" id="ape_emp" required="required" maxlength="25" class="form-control text-uppercase" placeholder="Apellido del Empleado" onkeyup="return solo_letras();" value="<?php echo $datos['ape_emp']; ?>">
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
							echo "<input type='radio' name='sex_emp' id='sex_emp1' class='form-check-input mr-2' value='M' $checked>Masculino";
						?>	
						</label>

						<label class="form-check-label">
						<?php
							$checked = ($datos['sex_emp']=="F") ? "checked":"";
							echo "<input type='radio' name='sex_emp' id='sex_emp2' class='form-check-input mr-2' value='F' $checked>Femenino";
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
		    <input type="text" name="ema_emp" id="ema_emp" required="required" maxlength="80" class="form-control text-uppercase" placeholder="Email del Empleado" onkeyup="return solo_email();" value="<?php echo $datos['ema_emp']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Número de Celular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te1_emp" id="te1_emp" required="required" maxlength="15" class="form-control" placeholder="Preferiblemente con Whatsapp" onkeyup="return solo_numeros();" value="<?php echo $datos['te1_emp']; ?>">
		</div>

	  </div> 


	  <div class="row mt-2 bg-light"">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te2_emp" id="te2_emp" maxlength="15" class="form-control" placeholder="Teléfono Secundario" onkeyup="return solo_numeros();" value="<?php echo $datos['te2_emp']; ?>">
		</div>

	  </div> 

	
	  <div class="row mt-2 bg-light"">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	     <select name='est_emp' id='est_emp' class='form-control'>
		 <?php
		 $selected = ($datos['est_emp']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_emp']=='S') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";	
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Empleado">
		</div>
	   </div>	  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_emp" id="cod_emp" value="<?php echo $datos['cod_emp']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>