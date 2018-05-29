<?php 
require("../clase/modulo.class.php");
require("../clase/auditoria.class.php");
$obj_mod=new modulo;
$obj_aud=new auditoria;

foreach ($_REQUEST as $campo => $valor) 
{
	$obj_mod->asignar_valor($campo,$valor);
}

$obj_aud->asignar_valor("fec_aud",date("Y-m-d h:i:s"));
$obj_aud->asignar_valor("ip_aud","127.0.0.1");
$obj_aud->asignar_valor("fky_usuario",1);

switch ($_REQUEST["accion"]) 
{
	case 'agregar':
		$res=$obj_mod->agregar();
		if ($res==true) 
		{
			$obj_mod->mensaje("success","modulo","agregar");
			$id=$obj_mod->ultimo_id();
			if ($id>0) //Guardamos en Auditoria
			{
				$obj_aud->asignar_valor("fky_opcion",1);
				$obj_aud->asignar_valor("sql_aud","insert");
				$obj_aud->asignar_valor("id_aud",$id);
				$obj_aud->agregar();
			}
		}
		else
			{
				$obj_mod->mensaje("danger","modulo","agregar");
			}
		break;

	case 'modificar':
		$obj_mod->cod_mod=$_POST["cod_mod"];
		$obj_mod->modificar();
		$fil_afe=$obj_mod->filas_afectadas();
		if ($fil_afe>0) {
			$obj_mod->mensaje("success","modulo","modificar");
			$id=$obj_mod->ultimo_id();
		} else {
			$obj_mod->mensaje("danger","modulo","modificar");
		}
		
		break;
	case 'eliminar':
		$obj_mod->cod_mod=$_POST["cod_mod"];
		$obj_mod->eliminar();
		$fil_afe=$obj_mod->filas_afectadas();
		if ($fil_afe>0) {
			$obj_mod->mensaje("success","modulo","eliminar");
			$id=$obj_mod->ultimo_id();
		} else {
			$obj_mod->mensaje("danger","modulo","eliminar");
		}
		
		break;
	case 'listar':
		#
		break;
}
 ?>