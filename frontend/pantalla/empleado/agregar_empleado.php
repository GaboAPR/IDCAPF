<?php
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/permiso.class.php");


$obj=new empleado;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Empleado</title>
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

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Identificación:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ide_emp" id="ide_emp" required="required" maxlength="15" class="form-control" placeholder="Documento del Empleado" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_emp" id="nom_emp" required="required" maxlength="25" class="form-control" placeholder="Nombre del Empleado" onkeyup="return solo_letras();">
		</div>

	  </div>

	   <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ape_emp" id="ape_emp" required="required" maxlength="25" class="form-control" placeholder="Apellido del Empleado" onkeyup="return solo_letras();">
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Sexo:</label>
		</div>
		<div class="col-md-4 col-12">
		  <div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" name="sex_emp" id="sex_emp1" class="form-check-input mr-2" value="M">Masculino
						</label>

						<label class="form-check-label">
							<input type="radio" name="sex_emp" id="sex_emp2" class="form-check-input mr-2" value="F">Femenino
						</label>
					</div>
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_emp" id="ema_emp" required="required" maxlength="80" class="form-control" placeholder="Email del Empleado" onkeyup="return solo_email();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Principal:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te1_emp" id="te1_emp" required="required" maxlength="15" class="form-control" placeholder="Preferiblemente con Whatsapp" onkeyup="return solo_numeros();">
		</div>

	  </div> 


	  <div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te2_emp" id="te2_emp" maxlength="15" class="form-control" placeholder="Teléfono Secundario" onkeyup="return solo_numeros();">
		</div>

	  </div> 


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_emp" id="est_emp" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Empleado">
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