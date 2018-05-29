<?php
//==============================================================================
//===   banco: Tabla que guarda todos los bancos del País.   
/*
cod_ban int 			(Código del Banco)
nom_ban varchar-50 		(Nombre del Banco)
est_ban char 			(Estatus del Banco)
Valores del Estatus:
A: Activo
I: Inactivo
*/                    
//==============================================================================
//===	Campos B.D:  cod_ban, nom_ban, est_ban 
require_once("utilidad.class.php");

class banco extends utilidad
{
   public $cod_ban;
   public $nom_ban;
   public $est_ban;

//==============================================================================
   public function agregar(){

    	$sql="insert into banco(nom_ban,est_ban)values('$this->nom_ban','$this->est_ban');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update banco set nom_ban='$this->nom_ban',est_ban='$this->est_ban' where cod_ban='$this->cod_ban';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from banco where est_ban='$this->est_ban';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_ban,$nom_ban,$est_ban){

        $where="where 1=1";
        
        $filtro1 = ($cod_ban!="") ? "and cod_ban=$cod_ban":"";
        $filtro2 = ($nom_ban!="") ? "and nom_ban like '%$nom_ban%'":"";
        $filtro3 = ($est_ban!="") ? "and est_ban='$est_ban'":"";

        $sql="select * from banco $where $filtro1 $filtro2 $filtro3;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
