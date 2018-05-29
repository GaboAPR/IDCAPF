<?php
require("../clase/permiso.class.php");
$obj_per=new permiso;


switch($_REQUEST['accion'])
{
	case 'agregar':
	$obj_per->fky_usuario=$_REQUEST["usuario"];
	$obj_per->fky_opcion=$_REQUEST["opcion"];
	$obj_per->est_per="A";
	$res=$obj_per->agregar();
	echo $res;
	break;

	case 'eliminar':
	$obj_per->fky_usuario=$_REQUEST["usuario"];
	$obj_per->fky_opcion=$_REQUEST["opcion"];
	$obj_per->est_per="I";
	$res=$obj_per->eliminar();
	echo $res;	
	break;

}


?>