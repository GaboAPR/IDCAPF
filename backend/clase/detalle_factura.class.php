<?php 
require_once("utilidad.class.php");

class detalle_factura extends utilidad
{
	public $cod_det;
	public $fky_factura;
	public $fky_producto;
	public $can_det;
	public $pre_det;
	public $bas_det;
	public $iva_det;
	public $tot_det;

	public function agregar()
	{
		$sql="insert into
		detalle_factura(fky_factura, fky_producto, can_det, pre_det, bas_det, iva_det, tot_det)
		values
		($this->fky_factura, '$this->fky_producto', $this->can_det, $this->pre_det, $this->bas_det, $this->iva_det,
		$this->tot_det);";

		return $this->ejecutar($sql);
	}
	/*
	public function modificar()
	{
		$sql="update detalle_factura 
		set 
		fky_factura=$this->fky_factura, fky_producto='$this->fky_producto', can_det=$this->can_det, 
		pre_det=$this->pre_det, bas_det=$this->bas_det, iva_det=$this->iva_det, tot_det=$this->tot_det
		where 
		cod_det=$this->cod_det; ";

		return $this->ejecutar($sql);
	}

	public function eliminar()
	{
		$sql="delete from detalle_factura
		where
		cod_det=$this->cod_det;";

		return $this->ejecurtar($sql);
	}*/
}
?>