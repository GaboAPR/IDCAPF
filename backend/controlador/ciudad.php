<?php
//==============================================================================
//===   Ciudad
/*
cod_ciu int 			(Código de la Ciudad)
nom_ciu varchar-25 		(Nombre de la Ciudad)
fky_estado            (Estado)
est_ciu char 			(Estatus de la Ciudad. A: Activo, I: Inactivo)
Estatus de la ciudad:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_ciu, nom_ciu, est_ciu


require("../clase/permiso.class.php");
require("../clase/ciudad.class.php");

$obj=new ciudad;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","ciudad"); //Para Auditoria
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
				$obj->mensaje("success","Ciudad agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar la Ciudad");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_ciu);
				$obj->mensaje("success","Ciudad modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ciu);
			  	$obj->mensaje("success","Ciudad eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar la Ciudad.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ciu);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Ciudad.");
			  }
			 
		break;

		case 'select_generico':
           $puntero=$obj->select_generico($tabla="ciudad",$columna_condicion="fky_estado",$obj->valor);
           $obj->combo_generico($puntero,$nombre_combo="fky_ciudad",$seleccionado="",$columna_guardar="cod_ciu",$columna_mostrar="nom_ciu");
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>