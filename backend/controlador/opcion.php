<?php 
require ("../clase/opcion.class.php");
require ("../clase/auditoria.class.php");

$obj_opc=new opcion;
$obj_aud=new auditoria;

foreach ($_REQUEST as $campo => $valor) {
	$obj_opc->asignar_valor($campo,$valor);
}

$obj_aud->asignar_valor("fec_aud",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("ip_aud","127.0.0.1");
$obj_aud->asignar_valor("fky_usuario",1);

	switch ($_REQUEST["accion"]) {

		case 'agregar':
		$res=$obj_opc->agregar();
		if ($res==true) {
			$obj_opc->mensaje("success","Opcion","agregado");
			$id=$obj_opc->ultimo_id_insertado();
			if ($id>0) {
			$obj_aud->asignar_valor("fky_opcion",1);
			$obj_aud->asignar_valor("sql_aud","insert");
			$obj_aud->asignar_valor("id_aud",$id);
			$obj_aud->agregar();
			}
		}else{
			$obj_opc->mensaje("danger","Opcion","agregado");
		}
		break;

		case 'modificar':
			break;

		case 'eliminar':
			break;

		case 'listar':
			break;
	}
 ?>