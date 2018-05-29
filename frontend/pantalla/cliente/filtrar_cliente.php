<?php
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new cliente;
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
	<title>Filtrar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_cliente.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar Cliente</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-2 col-12 align-self-center">
		     <label for="">RFC:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="rfc_cli" id="rfc_cli"  maxlength="15" class="form-control" placeholder="RFC" onkeyup="return solo_numeros();">
		</div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre Comercial:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="com_cli" id="com_cli"  maxlength="25" class="form-control" placeholder="Nombre Comercial" onkeyup="return solo_letras();">
		</div>

	  </div>	   
	


	  <div class="row mt-2 bg-light" >
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Cliente">
		</div>
	   </div>	  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="filtrar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>