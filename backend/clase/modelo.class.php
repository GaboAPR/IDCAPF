<?php

require_once("utilidad.class.php"); 

class modelo extends utilidad
{
   public $cod_mod; 
   public $nom_mod; 
   public $fky_marca; 
   public $est_mod; 


//==============================================================================
   public function agregar(){

    	$sql="insert into modelo(
            nom_mod, 
            fky_marca, 
            est_mod)
            values(
            '$this->nom_mod', 
            '$this->fky_marca', 
            '$this->est_mod'     
            );";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update modelo set 
              nom_mod='$this->nom_mod', 
              fky_marca=$this->fky_marca, 
              est_mod='$this->est_mod'
              where
              cod_mod=$this->cod_mod;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from modelo where cod_mod=$this->cod_mod;";
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

   public function filtrar($cod_mod,$nom_mod,$est_mod){
        
        $filtro1 = ($cod_mod!="") ? "and cod_mod=$cod_mod":"";
        $filtro2 = ($nom_mod!="") ? "and nom_mod like '%$nom_mod%'":"";
        $filtro3 = ($est_mod!="") ? "and est_mod='$est_mod'":"";

        $sql="select m.*,mm.nom_mar
              from modelo m,marca mm
              where 
              m.fky_marca=mm.cod_mar  
              $filtro1 $filtro2 $filtro3;"; 

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>