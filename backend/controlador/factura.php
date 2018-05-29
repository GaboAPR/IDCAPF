<?php 
require("../clase/factura.class.php");
date_default_timezone_set('America/Caracas');
$obj_fac=new factura();
$obj_fac->fec_fac=date("Y-m-d H:i:s");
$obj_fac->fky_cliente=@$_REQUEST["fky_cliente"];
$obj_fac->con_fac=5;
$obj_fac->bas_fac=@$_REQUEST["bas_fac"];
$obj_fac->iva_fac=@$_REQUEST["iva_fac"];
$obj_fac->tot_fac=@$_REQUEST["tot_fac"];
$obj_fac->est_fac=@$_REQUEST["est_fac"];
$accion=$_REQUEST["accion"];

switch($accion)
{
	case 'agregar': 
		$res_que=$obj_fac->agregar();
		if($res_que==true)
		{
			//echo $obj_fac->fec_fac." - ".$obj_fac->fky_cliente." - ".$obj_fac->con_fac;
			$fac=$obj_fac->devolver_id($obj_fac->fec_fac, $obj_fac->fky_cliente, $obj_fac->con_fac);
			$factura=$obj_fac->extraer_dato($fac);
			echo $factura["num_fac"];
		}
		else
			echo "Error al guardar factura.";
	break;
	/*
	case 'modificar':
		$obj_fac->num_fac=1;
		$obj_fac->modificar();
		$fil_afe=$obj_fac->filas_afectadas();
		if($fil_afe>0)
			echo "Factura modificada correctamente.";
		else
			echo "Ninguna factura modificada / Error al modificar factura.";

	break;

	case 'eliminar':
		$obj_fac->num_fac=3;
		$obj_fac->eliminar();
		$fil_afe=$obj_fac->filas_afectadas();
		if($fil_afe>0)
			echo "Factura eliminada correctamente";
		else
			echo "Ninguna factura eliminada / Error al eliminar factura";
	break;
	*/
}


?>