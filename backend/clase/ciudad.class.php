<?php
//==============================================================================
//===   Estado
/*
cod_ciu int 			(Código de la Ciudad)
nom_ciu varchar-25 		(Nombre de la Ciudad)
fky_estado            (Estado)
est_ciu char 			(Estatus de la Ciudad. A: Activo, I: Inactivo)
Estatus de la ciudad:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_ciu, nom_ciu, est_ciu


require_once("utilidad.class.php");

class ciudad extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into ciudad(
            nom_ciu,
            fky_estado,
            est_ciu)
            values(
            '$this->nom_ciu',
            '$this->fky_estado',
            '$this->est_ciu'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update ciudad 
               set 
               nom_ciu='$this->nom_ciu',
               fky_estado='$this->fky_estado',
               est_ciu='$this->est_ciu'
               where 
               cod_ciu=$this->cod_ciu;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from ciudad where est_ciu='$this->est_ciu';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_ciudad(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_ciu,$nom_ciu,$est_ciu){
        

        $filtro1 = ($cod_ciu!="") ? "and cod_ciu=$cod_ciu":"";
        $filtro2 = ($nom_ciu!="") ? "and nom_ciu like '%$nom_ciu%'":"";
        $filtro3 = ($est_ciu!="") ? "and est_ciu='$est_ciu'":"";

        $sql="select c.*,e.nom_est from ciudad c,estado e where c.fky_estado=e.cod_est $filtro1 $filtro2 $filtro3;";
     

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>