<?php 
require_once("utilidad.class.php");

class factura extends utilidad
{
	public $num_fac;
	public $fec_fac;
	public $fky_cliente;
	public $con_fac;
	public $bas_fac;
	public $iva_fac;
	public $tot_fac;
	public $est_fac;

	public function agregar()
	{
		$sql="insert into
		factura(fec_fac, fky_cliente, con_fac, bas_fac, iva_fac, tot_fac, est_fac) 
		values
		('$this->fec_fac', $this->fky_cliente, $this->con_fac, $this->bas_fac, $this->iva_fac, $this->tot_fac, 
		'$this->est_fac'); ";

		return $this->ejecutar($sql);
	}
	/*
	public function modificar()
	{
		$sql="update factura
		set
		fec_fac='$this->fec_fac', fky_cliente=$this->fky_cliente, con_fac=$this->con_fac, bas_fac=$this->bas_fac, 
		iva_fac=$this->iva_fac, tot_fac=$this->tot_fac, est_fac='$this->est_fac'
		where
		num_fac=$this->num_fac; ";

		return $this->ejecutar($sql);
	}

	public function eliminar()
	{
		$sql="delete from factura
		where
		num_fac=$this->num_fac; ";

		return $this->ejecutar($sql);
	}
	*/
	public function listar()
	{
		$sql="select * from factura where est_fac='A';";

		return $this->ejecutar($sql);
	}

	public function devolver_id($fec_fac, $fky_cliente, $con_fac)
	{
		
		$filtro1=($fec_fac!="")?"fec_fac='$fec_fac'":"";
		$filtro2=($fky_cliente!="")?"fky_cliente='$fky_cliente'":"";
		$filtro3=($con_fac!="")?"con_fac='$con_fac'":"";

		$sql="select * from factura where $filtro1 and $filtro2 and $filtro3;";
		return $this->ejecutar($sql);
	}

}

?>