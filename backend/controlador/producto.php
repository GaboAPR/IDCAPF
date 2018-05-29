<?php 
require("../clase/producto.class.php");

$obj_pro=new producto;
$obj_pro->cod_pro=@$_REQUEST["cod_pro"];
$obj_pro->nom_pro=@$_REQUEST["nom_pro"];
$obj_pro->pre_pro=@$_REQUEST["pre_pro"];
$obj_pro->inv_pro=@$_REQUEST["inv_pro"];
$obj_pro->imp_pro=@$_REQUEST["imp_pro"];
$obj_pro->min_pro=@$_REQUEST["min_pro"];
$obj_pro->max_pro=@$_REQUEST["max_pro"];
$obj_pro->fky_marca=@$_REQUEST["fky_marca"];
$obj_pro->est_pro=@$_REQUEST["est_pro"];
$accion=$_REQUEST["accion"];

switch($accion)
{
	case 'agregar':
		echo "<link rel='stylesheet' href='../../frontend/bootstrap-4.0/css/bootstrap.min.css'>";
		$res_que=$obj_pro->agregar();
		if($res_que==true)
			echo 
			"<div class='alert alert-success text-center'>
				<p>Producto guardado correctarmente.</p>
			</div>";
		else
			echo 
			"<div class='alert alert-danger text-center'>
				<p>Error al guardar producto.</p>
			</div>";
	break;

	case 'modificar':
		echo "<link rel='stylesheet' href='../../frontend/bootstrap-4.0/css/bootstrap.min.css'>";
		$obj_pro->cod_pro=$_POST["cod_pro"];
		$obj_pro->modificar();
		$fil_afe=$obj_pro->filas_afectadas();
		if($fil_afe>0)
			echo 
			"<div class='alert alert-success text-center'>
				<p>Producto modificado correctamente.</p>
			</div>";
		else
			echo 
			"<div class='alert alert-danger text-center'>
				<p>Ningún producto modificado / Error al modificar producto.</p>
			</div>";
	break;

	case 'eliminar':
		echo "<link rel='stylesheet' href='../../frontend/bootstrap-4.0/css/bootstrap.min.css'>";
		$obj_pro->cod_pro=$_POST["cod_pro"];
		$obj_pro->eliminar();
		$fil_afe=$obj_pro->filas_afectadas();
		if($fil_afe>0)
			echo 
			"<div class='alert alert-success text-center'>
				<p>Producto eliminado correctarmente.</p>
			</div>";
		else
			echo 
			"<div class='alert alert-danger text-center'>
				<p>Ningún producto eliminado/ Error al eliminar producto.</p>
			</div>";
	break;

	case 'buscar':
		$pro=$obj_pro->filtrar($_GET["cod"],$nom_pro="",$est_pro="");
		$producto=$obj_pro->extraer_dato($pro);
		echo $producto["nom_pro"]."#".$producto["pre_pro"]."#".$producto["imp_pro"];
	break;
}

?>