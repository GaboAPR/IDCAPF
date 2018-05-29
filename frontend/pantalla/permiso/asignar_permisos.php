<?php
require("../../../backend/clase/usuario.class.php");
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/permiso.class.php");
$obj_usu=new usuario;
$obj_opc=new opcion;
$obj_per=new permiso;

$ret=$obj_usu->filtrar("",$_REQUEST["ema_usu"],"","","","");
$usuario=$obj_usu->extraer_dato($ret);

$fil_pag=10;
$pagina=$_REQUEST["pagina"];
$fil_ini=($pagina-1)*$fil_pag;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignar Permisos</title>
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="../../js/permiso.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row mt-2 bg-primary text-center text-white">
			<div class="col-1">N°</div>
			<div class="col-3">Nombre Opción</div>
			<div class="col-3">URL</div>
			<div class="col-3">Módulo</div>
			<div class="col-2">Asignar</div>
		</div>

	<?php
	  $i=1;
	  $res=$obj_opc->filtrar($fil_pag,$fil_ini);
	  while(($opcion=$obj_opc->extraer_dato($res))>0)
	  {

	  	$obj_per->fky_usuario=$usuario["cod_usu"];
	  	$obj_per->fky_opcion=$opcion["cod_opc"];
	  	$re2=$obj_per->buscar();
	  	$per=$obj_per->extraer_dato($re2);
	  	$marcar=($per["est_per"]=="A")?"checked":"";

		echo "<div class='row mt-2'>
				<div class='col-1'>$i</div>
				<div class='col-3'>$opcion[nom_opc]</div>
				<div class='col-3'>$opcion[url_opc]</div>
				<div class='col-3'>$opcion[nom_mod]</div>
				<div class='col-2 text-center'>
					<input type='checkbox' onclick='guardarPermiso($opcion[cod_opc],$usuario[cod_usu])' id='$opcion[cod_opc]' $marcar>
				</div>
		</div>";
        $i++;
	  }
	?>
	</div>

	<div class="row mt-2">
		<div class="col-4 text-right">Páginas: </div>
		<div class="col-8">
		<?php 
		     $ret=$obj_opc->contar_registros("opcion");
		     $reg_pag=$obj_opc->extraer_dato($ret);
		     $paginas=$reg_pag["total"]/$fil_pag;
		     $p="<ul class='pagination'>";
		     for($pag=1;$pag<$paginas+1;$pag++)
		     {
		     	$p.="<li class='page-item'>
		     	<a href='asignar_permisos.php?pagina=$pag&ema_usu=$_REQUEST[ema_usu]' class='page-link'>$pag</a>
		     	</li>";
		     } 
		     $p.="</ul>";
		     echo $p;
		     /*$reg_pag me dice la cantidad total de registros*/
		?>
	    </div>
	</div>

	<div id="alerta1" class="d-none">
		<div class="row mt-2">
			<div class="col-12 alert alert-success">
				<h4>Permiso Asignado Correctamente</h4>
			</div>
		</div>
	</div>
	<div id="alerta2" class="d-none">
		<div class="row mt-2">
			<div class="col-12 alert alert-warning">
				<h4>Permiso Borrado Correctamente</h4>
			</div>
		</div>	
	</div>
</body>
</html>