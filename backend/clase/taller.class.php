<?php

require_once("utilidad.class.php");

class taller extends utilidad
{
   public $cod_tal;
   public $nom_tal;
   public $raz_tal;
   public $ubi_tal;
   public $te1_tal;
   public $te2_tal;
   public $ema_tal;
   public $cue_tal;
   public $tip_tal;
   public $fky_banco;
   public $fky_ciudad;
   public $est_tal;

//==============================================================================
   public function agregar(){

    	$sql="insert into taller(
        nom_tal,
        ubi_tal,
        res_tal,
        te1_tal,
        te2_tal,
        ema_tal,
        cue_tal,
        tip_tal,
        fky_banco,
        fky_ciudad,
        est_tal)
      values
      ('$this->nom_tal',
       '$this->ubi_tal',
       '$this->res_tal',
       '$this->te1_tal',
       '$this->te2_tal',
       '$this->ema_tal',
       '$this->cue_tal',
       '$this->tip_tal',
        $this->fky_banco,
        $this->fky_ciudad,
       '$this->est_tal');";

       
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update taller 
            set nom_tal='$this->nom_tal',
                ubi_tal='$this->ubi_tal',
                res_tal='$this->res_tal',
                te1_tal='$this->te1_tal',
                te2_tal='$this->te2_tal',
                ema_tal='$this->ema_tal',
                cue_tal='$this->cue_tal',
                tip_tal='$this->tip_tal',
                fky_banco=$this->fky_banco,
                fky_ciudad=$this->fky_ciudad,
                est_tal='$this->est_tal' 
            where 
                cod_tal='$this->cod_tal';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from taller where est_tal='$this->est_tal';";
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

   public function filtrar($cod_tal,$nom_tal,$est_tal){

        
        $filtro1 = ($cod_tal!="") ? "and cod_tal=$cod_tal":"";
        $filtro2 = ($nom_tal!="") ? "and nom_tal like '%$nom_tal%'":"";
        $filtro3 = ($est_tal!="") ? "and est_tal='$est_tal'":"";

        $sql="select t.*,c.nom_ciu,e.cod_est,e.nom_est from taller t,ciudad c,estado e where t.fky_ciudad=cod_ciu and c.fky_estado=e.cod_est $filtro1 $filtro2 $filtro3;"; 

        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
