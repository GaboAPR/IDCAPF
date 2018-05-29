<?php
//==============================================================================
//===   marca  
/*
cod_mar int       (Código del marca)
nom_mar varchar-50    (Nombre del marca)
est_mar char      (Estatus del marca)
Valores del Estatus:
A: Activo
I: Inactivo
*/                    
//==============================================================================
//=== Campos B.D:  cod_mar, nom_mar, est_mar 
require_once("utilidad.class.php");

class marca extends utilidad
{
   public $cod_mar;
   public $nom_mar;
   public $est_mar;

//==============================================================================
   public function agregar(){

    	$sql="insert into marca(nom_mar,est_mar)values('$this->nom_mar','$this->est_mar');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update marca set nom_mar='$this->nom_mar',est_mar='$this->est_mar' where cod_mar='$this->cod_mar';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from marca where est_mar='$this->est_mar';";
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

   public function filtrar($cod_mar,$nom_mar,$est_mar){

        $where="where 1=1";
        
        $filtro1 = ($cod_mar!="") ? "and cod_mar=$cod_mar":"";
        $filtro2 = ($nom_mar!="") ? "and nom_mar like '%$nom_mar%'":"";
        $filtro3 = ($est_mar!="") ? "and est_mar='$est_mar'":"";

        $sql="select * from marca $where $filtro1 $filtro2 $filtro3;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
