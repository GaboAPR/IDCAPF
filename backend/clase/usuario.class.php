<?php 
require_once 'utilidad.class.php';
class usuario extends utilidad
 {
public $cod_usu; 	
public $ema_usu;
public $cla_usu;
public $reg_usu;
public $nom_usu;
public $ape_usu;
public $fky_rol;
public $est_usu;

 	public function agregar()
 	{
		$sql="insert into 
		usuario(ema_usu,cla_usu,reg_usu,nom_usu,ape_usu,fky_rol,
		est_usu)
		values
		('$this->ema_usu','$this->cla_usu','$this->reg_usu','$this->nom_usu','$this->ape_usu',$this->fky_rol,'$this->est_usu');";
		return $this->ejecutar($sql); 	
 	}
	public function modificar()
	{
		$sql="update usuario
		set
		ema_usu='$this->ema_usu',cla_usu='$this->cla_usu',reg_usu='$this->reg_usu',nom_usu='$this->nom_usu',ape_usu='$this->ape_usu',fky_rol=$this->fky_rol,est_usu='$this->est_usu'
		where
		cod_usu=$this->cod_usu;";
		return $this->ejecutar($sql);
	}
	public function eliminar()
	{
		$sql="delete from 
		usuario
		where
		cod_usu=$this->cod_usu;";
		return $this->ejecutar($sql);
	}
	public function listar()
	{
		$sql="select
		ema_usu,cla_usu,reg_usu,nom_usu,ape_usu,est_usu,nom_rol
		from usuario, rol
		where
		fky_rol=cod_rol and est_usu='$this->est_usu'";
		return $this->ejecutar($sql);
	} 	
 
	public function iniciar_sesion()
	{
		$sql="select cod_usu,est_usu 
		from 
		usuario 
		where 
		ema_usu='$this->ema_usu' and 
		cla_usu='$this->cla_usu';";

		return $this->ejecutar($sql);

	} 

	public function filtrar($cod_usu,$ema_usu,$nom_usu,$ape_usu,$fky_rol,$est_usu)
	{

		$filtro1=($cod_usu!="")?" and cod_usu=$cod_usu":"";
		$filtro2=($ema_usu!="")?" and ema_usu='$ema_usu'":"";
		$filtro3=($nom_usu!="")?" and nom_usu like '%$nom_usu%'":"";
		$filtro4=($ape_usu!="")?" and ape_usu like '%$ape_usu%'":"";
		$filtro5=($fky_rol!="")?" and fky_rol=$fky_rol":"";
		$filtro6=($est_usu!="")?" and est_usu='$est_usu'":"";

		$sql="select u.*,r.nom_rol
			  from usuario u, rol r
			  where
			  u.fky_rol=r.cod_rol
			  $filtro1
			  $filtro2
			  $filtro3
			  $filtro4
			  $filtro5
			  $filtro6";
		return $this->ejecutar($sql);
	}

 } 
 ?>