<?php
require_once("utilidad.class.php");

class producto extends utilidad
{
	public $cod_pro;
	public $nom_pro;
	public $pre_pro;
	public $inv_pro;
	public $imp_pro;
	public $min_pro;
	public $max_pro;
	public $fky_marca;
	public $est_pro;

	public function agregar()
	{
		$sql="insert into
		producto(cod_pro, nom_pro, pre_pro, inv_pro, imp_pro, min_pro, max_pro, fky_marca, est_pro)
		values
		('$this->cod_pro', '$this->nom_pro', $this->pre_pro, $this->inv_pro, $this->imp_pro, $this->min_pro, $this->max_pro,
		 $this->fky_marca, '$this->est_pro'); ";

		return $this->ejecutar($sql);
	}

	public function modificar()
	{
		$sql="update producto
		set  nom_pro='$this->nom_pro', pre_pro=$this->pre_pro, inv_pro=$this->inv_pro, imp_pro=$this->imp_pro, 
		min_pro=$this->min_pro, max_pro=$this->max_pro, fky_marca=$this->fky_marca, est_pro='$this->est_pro'
		where cod_pro='$this->cod_pro' ; ";

		return $this->ejecutar($sql);
	}

	public function eliminar()
	{
		$sql="delete from
		producto
		where
		cod_pro='$this->cod_pro'; ";

		return $this->ejecutar($sql);
	}

	public function listar()
	{
		$sql="select 
		cod_pro,nom_pro,pre_pro,est_pro,nom_mar  
		from producto, marca
		where 
		fky_marca=cod_mar and 
		est_pro='$this->est_pro' ;";

		return $this->ejecutar($sql);

	}

	public function filtrar($cod_pro,$nom_pro,$est_pro)
	{
		$filtro1=($cod_pro!="")?"cod_pro='$cod_pro'":"";
		$filtro2=($nom_pro!="")?"nom_pro='$nom_Pro'":"";
		$filtro3=($est_pro!="")?"est_pro='$est_pro'":"";

		$sql="select * from producto where $filtro1 $filtro2 $filtro3;";

		return $this->ejecutar($sql);
	}
}

?>