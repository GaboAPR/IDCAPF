<?php 
require_once ("utilidad.class.php");

class opcion extends utilidad
{
	public $cod_opc;
	public $nom_opc;
	public $fky_modulo;
	public $url_opc;
	public $est_opc;



	public function agregar()
	{
		$sql="insert into opcion(nom_opc,fky_modulo,url_opc,est_opc) values('$this->nom_opc',$this->fky_modulo,'$this->url_opc','$this->est_opc');";
		return $this->ejecutar($sql);
	}
	public function modificar()
	{
		$sql="update opcion 
		set
		nom_opc='$this->nom_opc',
		fky_modulo='$this->fky_modulo',
		url_opc='$this->url_opc',
		est_opc='$this->est_opc'
		where
		cod_opc=$this->cod_opc;";
		return $this->ejecutar($sql);
	}
	public function eliminar()
	{
		$sql="delete from opcion where cod_opc=$this->cod_opc;";
		return $this->ejecutar($sql);
	}
	public function listar()
	{
		$sql="select * from opcion;";
		return $this->ejecutar($sql);
	}

	public function filtrar($num_fil,$fil_ini)
	{
		$sql="select o.*,m.nom_mod from opcion o, modulo m where o.fky_modulo=m.cod_mod 
		    order by m.nom_mod,o.nom_opc limit $fil_ini,$num_fil";
		return $this->ejecutar($sql);
	}	
	
}


 ?>