<?php 
require("../clase/detalle_factura.class.php");

$obj_det=new detalle_factura();
$obj_det->fky_factura=$_REQUEST["fky_factura"];
$obj_det->fky_producto=$_REQUEST["fky_producto"];
$obj_det->can_det=$_REQUEST["can_det"];
$obj_det->pre_det=$_REQUEST["pre_det"];
$obj_det->bas_det=$_REQUEST["bas_det"];
$obj_det->iva_det=$_REQUEST["iva_det"];
$obj_det->tot_det=$_REQUEST["tot_det"];

$accion=$_REQUEST["accion"];

switch($accion)
{
	case 'agregar':
		$res_que=$obj_det->agregar();
		if($res_que==TRUE)
			echo "Detalle_factura guardado correctamente.";
		else
			echo "Error al guardar detalle_factura.";
		
	break;
	/*
	case 'modificar':
		$obj_det->cod_det=1;
		$obj_det->modificar();
		$fil_afe=$obj_det->filas_afectadas();
		if($fil_afe>0)
			echo "Detalle_factura modificado correctamente.";
		else
			echo "Ningun detalle de factura modificado/ Error al modificar.";
	break;

	case 'eliminar':
		$obj_det->cod_det=1;
		$obj_det->eliminar();
		$fil_afe=$obj_det->filas_afectadas();
		if($fil_afe>0)
			echo "Detalla_Factura eliminado correctamente.";
		else
			echo "Ningun detalle_factura eliminado / Error al eliminar.";
	break;
	*/
}

?>