<?php
require_once("utilidad.class.php");
class cliente extends utilidad
{
        public $cod_cli;
        public $com_cli;
        public $rfc_cli;
        public $ref_cli;
        public $cue_cli;
        public $fil_cli;
        public $dep_cli;
        public $re1_cli;
        public $te1_cli;  
        public $di1_cli;  
        public $em1_cli;  
        public $re2_cli;  
        public $te2_cli;  
        public $di2_cli;  
        public $em2_cli;  
        public $re3_cli;  
        public $te3_cli;  
        public $di3_cli;  
        public $cre_cli;  
        public $dia_cli;            
        public $pag_cli;  
        public $pdf_cli;  
        public $est_cli;  

//==============================================================================
   public function agregar(){

    	$sql="insert into cliente(
            cod_cli,
            com_cli,
            rfc_cli,
            ref_cli,
            cue_cli,
            fil_cli,
            dep_cli,
            re1_cli,
            te1_cli,  
            di1_cli,  
            em1_cli,  
            re2_cli,  
            te2_cli,  
            di2_cli, 
            em2_cli,  
            re3_cli,  
            te3_cli,  
            di3_cli, 
            em3_cli,              
            cre_cli,  
            dia_cli,            
            pag_cli,  
            pdf_cli,  
            est_cli)
    	   values
    	     ('$this->cod_cli',
            '$this->com_cli',
            '$this->rfc_cli',
            '$this->ref_cli',
            '$this->cue_cli',
            '$this->fil_cli',
            '$this->dep_cli',
            '$this->re1_cli',
            '$this->te1_cli',  
            '$this->di1_cli',
            '$this->em1_cli',  
            '$this->re2_cli',  
            '$this->te2_cli',  
            '$this->di2_cli', 
            '$this->em2_cli',  
            '$this->re3_cli',  
            '$this->te3_cli',  
            '$this->di3_cli', 
            '$this->em3_cli',              
            '$this->cre_cli',  
            '$this->dia_cli',           
            '$this->pag_cli',  
            '$this->pdf_cli',  
            '$this->est_cli');";

            
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update cliente set 
            cod_cli='$this->cod_cli',
            com_cli='$this->com_cli',
            rfc_cli='$this->rfc_cli',
            ref_cli='$this->ref_cli',
            cue_cli='$this->cue_cli',
            fil_cli='$this->fil_cli',
            dep_cli='$this->dep_cli',
            re1_cli='$this->re1_cli',
            te1_cli='$this->te1_cli',  
            di1_cli='$this->di1_cli',
            em1_cli='$this->em1_cli',  
            re2_cli='$this->re2_cli',  
            te2_cli='$this->te2_cli',  
            di2_cli='$this->di2_cli', 
            em2_cli='$this->em2_cli',  
            re3_cli='$this->re3_cli',  
            te3_cli='$this->te3_cli',  
            di3_cli='$this->di3_cli',
            em3_cli='$this->em3_cli',               
            cre_cli='$this->cre_cli',  
            dia_cli='$this->dia_cli',           
            pag_cli='$this->pag_cli',  
            pdf_cli='$this->pdf_cli',  
            est_cli='$this->est_cli'
      where 
            cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from cliente where est_cli='$this->est_cli';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from cliente where cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update cliente set est_cli='$this->est_cli' where cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_cli,$rfc_cli,$com_cli){
        
        $where="where 1=1";

        $filtro1 = ($cod_cli!="") ? "and cod_cli=$cod_cli":"";
        $filtro2 = ($rfc_cli!="") ? "and rfc_cli='$rfc_cli'":"";
        $filtro3 = ($com_cli!="") ? "and com_cli like '%$com_cli%'":"";
       
      

   		  $sql="select * from cliente $where $filtro1 $filtro2 $filtro3";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>