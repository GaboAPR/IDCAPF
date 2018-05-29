<?php 
require_once ("utilidad.class.php");
class modulo extends utilidad
{
public $cod_mod;	
public $nom_mod;
public $url_mod;
public $est_mod;

	public function agregar()
	{
		$sql="insert into 
		modulo(nom_mod,url_mod,est_mod) 
		values
		('$this->nom_mod','$this->url_mod','$this->est_mod');";
		return $this->ejecutar($sql);
	}
	public function modificar()
	{
		$sql="update modulo
		set 
		nom_mod='$this->nom_mod',url_mod='$this->url_mod', est_mod='$this->est_mod'
		where
		cod_mod=$this->cod_mod;";
		return $this->ejecutar($sql);
	}
	public function eliminar()
	{
		$sql="delete from
		modulo
		where
		cod_mod=$this->cod_mod;";
		return $this->ejecutar($sql);
	}
	public function listar()
	{
		$sql="select * from modulo;";
		return $this->ejecutar($sql);
	}
}
 ?>
