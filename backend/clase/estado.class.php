<?php
//==============================================================================
//===   Estado
/*
cod_est int 			(Código del tipo de usuario)
nom_est varchar-25 		(Nombre el tipo de usuario)
est_est char 			(Estatus del tipo de usuario)
Estatus de los tipos de usuario:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_est, nom_est, est_est


require_once("utilidad.class.php");

class estado extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into estado(
            nom_est,
            est_est)
            values(
            '$this->nom_est',
            '$this->est_est'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update estado 
               set 
               nom_est='$this->nom_est',
               est_est='$this->est_est'
               where 
               cod_est=$this->cod_est;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from estado where est_est='$this->est_est';";
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

   public function filtrar($cod_est,$nom_est,$est_est){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_est!="") ? "and cod_est=$cod_est":"";
        $filtro2 = ($nom_est!="") ? "and nom_est like '%$nom_est%'":"";
        $filtro3 = ($est_est!="") ? "and est_est='$est_est'":"";

        $sql="select * from estado $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>