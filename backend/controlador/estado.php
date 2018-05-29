<?php
//==============================================================================
//===   estado: 
/*
cod_est int 			(Código del Estado)
nom_est varchar-25 		(Nombre el Estado)
est_est char 			(Estatus del Estado)
Estatus de los Estados:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_est, nom_est, est_est

require("../clase/permiso.class.php");
require("../clase/estado.class.php");

$obj=new estado;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","estado"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':    
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Estado agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Estado");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_est);
				$obj->mensaje("success","Estado modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_est);
			  	$obj->mensaje("success","Estado eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar el Estado.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_est);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Estado.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>