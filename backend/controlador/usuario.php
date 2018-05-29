<?php 
require("../clase/usuario.class.php");
require("../clase/auditoria.class.php");
$obj_usu=new usuario;
$obj_aud=new auditoria;
$accion=$_REQUEST["accion"];
foreach ($_REQUEST as $campo => $valor) 
{
	$obj_usu->asignar_valor($campo,$valor);
}
$obj_usu->asignar_valor("cla_usu",md5($_REQUEST['cla_usu']));
$obj_usu->asignar_valor("reg_usu",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("fec_aud",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("ip_aud","127.0.0.1");
$obj_aud->asignar_valor("fky_usuario",1);
switch ($accion) {
	case 'agregar':
		$res=$obj_usu->agregar();
		if ($res==true) 
		{
			$obj_usu->mensaje("success","usuario","agregar");
			$id=$obj_usu->ultimo_id();
			if ($id>0) 
			{
				$obj_aud->asignar_valor("fky_opcion",1);
				$obj_aud->asignar_valor("sql_aud","insert");
				$obj_aud->asignar_valor("id_aud",$id);
				$obj_aud->agregar();
			}
		} else 
		{
			$obj_usu->mensaje("danger","usuario","agregar");
		}
		
		break;
	
	case 'modificar':
		$obj_usu->cod_usu=$_POST["cod_usu"];
		$obj_usu->modificar();
		$fil_afe=$obj_usu->filas_afectadas();
		if ($fil_afe>0) 
		{
			$obj_usu->mensaje("success","usuario","modificar");
			$id=$obj_usu->ultimo_id();
		} else {
			$obj_usu->mensaje("danger","usuario","modificar");
		}
		
		break;
	case 'eliminar':
		$obj_usu->cod_usu=$_POST["cod_usu"];
		$obj_usu->eliminar();
		$fil_afe->$obj_usu->filas_afectadas();
		if ($fil_afe>0) 
		{
			$obj_usu->mensaje("success","usuario","eliminar");
			$id=$obj_usu->ultimo_id();
		} else {
			$obj_usu->mensaje("danger","usuario","eliminar");
		}
		
		break;
	case 'listar':
		# code...
		break;
}
?>