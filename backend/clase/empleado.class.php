<?php
require_once("utilidad.class.php");
class empleado extends utilidad
{
	public $cod_emp;
	public $dni_emp;
	public $nom_emp;
	public $ape_emp;
	public $sex_emp; 
	public $ema_emp; 
	public $te1_emp; 
	public $te2_emp;
	public $est_emp; 

//==============================================================================
   public function agregar(){

    	$sql="insert into empleado(
            dni_emp, 
            nom_emp, 
            ape_emp, 
            sex_emp, 
            ema_emp, 
            te1_emp, 
            te2_emp,
            est_emp)
    	   values
    	     ('$this->ide_emp', 
            '$this->nom_emp', 
            '$this->ape_emp', 
            '$this->sex_emp', 
            '$this->ema_emp', 
            '$this->te1_emp', 
            '$this->te2_emp',
            '$this->est_emp');";

           
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update empleado set 
      dni_emp='$this->dni_emp', 
      nom_emp='$this->nom_emp', 
      ape_emp='$this->ape_emp', 
      sex_emp='$this->sex_emp', 
      ema_emp='$this->ema_emp', 
      te1_emp='$this->te1_emp', 
      te2_emp='$this->te2_emp', 
      est_emp='$this->est_emp' 
      where 
      cod_emp=$this->cod_emp;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from empleado where est_emp='$this->est_emp';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from empleado where cod_emp=$this->cod_emp;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update empleado set est_emp='$this->est_emp' where cod_emp=$this->cod_emp;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_emp,$dni_emp,$nom_emp,$ape_emp){
        
        $where="where 1=1";

        $filtro1 = ($cod_emp!="") ? "and cod_emp=$cod_emp":"";
        $filtro2 = ($dni_emp!="") ? "and dni_emp='$dni_emp'":"";
        $filtro3 = ($nom_emp!="") ? "and nom_emp like '%$nom_emp%'":"";
        $filtro4 = ($ape_emp!="") ? "and ape_emp like '%$ape_emp%'":"";        
      

   		  $sql="select * from empleado $where $filtro1 $filtro2 $filtro3 $filtro4";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>