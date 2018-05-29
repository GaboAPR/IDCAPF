<?php
require_once("utilidad.class.php");

class auditoria extends utilidad
{
 
  public $fec_aud;
  public $ip_aud;
  public $fky_usuario;
  public $fky_opcion;
  public $sql_aud;
  public $id_aud;

 public function agregar()
 {
 	$sql="insert into 
 	      auditoria
 	      (fec_aud,
 	      	ip_aud,
 	      	fky_usuario,
 	      	fky_opcion,
 	      	sql_aud,
 	        id_aud)
 	      values
 	      ('$this->fec_aud',
 	       '$this->ip_aud',
 	        $this->fky_usuario,
 	        $this->fky_opcion,
 	       '$this->sql_aud',
 	       '$this->id_aud');";

 	return $this->ejecutar($sql);       

 }

}
?>