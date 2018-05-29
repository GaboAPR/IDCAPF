<?php
require("../clase/rol.class.php");
require("../clase/auditoria.class.php");
$obj_rol=new rol;
$obj_aud=new auditoria;

foreach ($_REQUEST as $campo => $valor) {
	$obj_rol->asignar_valor($campo,$valor);
}

$obj_aud->asignar_valor("fec_aud",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("ip_aud","127.0.0.1");
$obj_aud->asignar_valor("fky_usuario",1);

switch($_REQUEST["accion"]) 
{
  
  case 'agregar':
		$res=$obj_rol->agregar();
		if($res==true)
		{
			$obj_rol->mensaje("success","Rol","agregar");
			$id=$obj_rol->ultimo_id();
			if($id>0) //Guardamos en auditoria
              {
              	$obj_aud->asignar_valor("fky_opcion",1);
              	$obj_aud->asignar_valor("sql_aud","insert");
              	$obj_aud->asignar_valor("id_aud",$id);
              	$obj_aud->agregar();
              }			
		}else
		{
			$obj_rol->mensaje("danger","Rol","agregar");	
		}
		break;

  case 'modificar':

  		break;

  case 'listar':
  		
  		break;				
	
  case 'eliminar':

  		break;	
}
?>