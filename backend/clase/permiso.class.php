<?php
require_once("utilidad.class.php");
class permiso extends utilidad
{   public $cod_per;
	public $fky_usuario;
	public $fky_opcion;
	public $est_per;

	public function agregar()
	{
		$sql="insert into permiso
		      (fky_usuario,fky_opcion,est_per) 
		      values
		      ($this->fky_usuario,$this->fky_opcion,'$this->est_per')";
	
		return $this->ejecutar($sql);
	}

	public function buscar()
	{
		$sql="select est_per 
		      from permiso 
		      where 
		      fky_usuario=$this->fky_usuario and 
		      fky_opcion=$this->fky_opcion";

		return $this->ejecutar($sql);

	}

	public function construir_menu($usuario)
	{
	   	 $sql="select p.*,m.nom_mod,m.url_mod,o.nom_opc,o.url_opc
				from 
					permiso p,modulo m, opcion o
				where
					p.fky_usuario=$usuario and
					p.fky_opcion=o.cod_opc and
					o.fky_modulo=m.cod_mod and
					p.est_per='A' 
				order by 
					m.nom_mod,o.nom_opc";

		return $this->ejecutar($sql);
	}

	public function validar_acceso($id_opc,$fky_usuario)
	{
		$sql="select est_per 
		      from  permiso
		      where 
		      fky_opcion=$id_opc and
		      fky_usuario=$fky_usuario";

		      return $this->ejecutar($sql);
	}

}
?>