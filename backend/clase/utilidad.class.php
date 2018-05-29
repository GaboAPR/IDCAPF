<?php
//==============================================================================
//===   utilidad: en este archivo se guardarán las funciones genéricas de todo el sistema.                         
//==============================================================================

class utilidad
{
    private $servidor="localhost";
    private $usuario="root";
    private $clave="";
    private $base_datos="febrero";
    public  $mysqli;
    public  $sql;
    private $tab_aud;
    private $fky_usuario;
    private $acc_aud;
    public  $ruta_contenido_backend="../../frontend/material/";
    public  $ruta_ingreso_backend="../../frontend/ingreso/";    
    public  $ruta_contenido_frontend="../../material/";


//=== Función que se ejecuta automáticamente cuando se instancia a utilidad o un hijo de utilidad    
    public function __construct()
    {
    	$this->conectar();
    }// Fin de __construct()


//=== conectar: función para conectar a la base de datos.
   public function conectar(){

   		$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base_datos);

   } // Fin de conectar()


//=== desconectar: Función para desconectar de la base de datos.
   public function desconectar(){
   		$this->mysqli->close();
   } //Fin de la función desconectar()



//=== asignar_valor: función genérica que sirve para asignar el valor en un atributo cualquiera.
   public function asignar_valor($atributo,$valor){

   		$this->$atributo=$valor;
   } // Fin de Asignar Valor


//=== obtener_valor: función genérica que sirve para obtener el valor en un atributo cualquiera.
   public function obtener_valor($atributo){
   		return $this->$atributo;
   } // Fin de Asignar Valor

//=== ejecutar: función para ejecutar una acción en la base de datos.
	public function ejecutar($sql){

    
		$this->sql=$sql; 
		return $this->mysqli->query($sql);
	}// Fin de la función ejecutar()  

//== extraer_dato: función para extraer los registros de cualquier query	 
	public function extraer_dato($pun_bds){
		//return mysql_fetch_assoc($pun_bds);
		return $pun_bds->fetch_assoc();
	}// Fin de la función extraer_dato() 


	public function mensaje($color,$mensaje)
	{

		echo "<link  rel='stylesheet' href='../../frontend/bootstrap-4.0/css/bootstrap.min.css'>";
		echo "<div class='alert alert-$color mt-3'>
					<strong>$mensaje</strong> 
			  </div>";
	}

	public function ultimo_id_insertado()
	{

		return mysqli_insert_id($this->mysqli);
	} 

  public function ultimo_id()
  {

    return mysqli_insert_id($this->mysqli);
  } 

  public function error_nro()
  {
    return $this->mysqli->errno;
  }

  public function filas_afectadas(){
    return $this->mysqli->affected_rows;
  }



	public function auditoria($prk_aud){
		$this->sql=str_replace("'","",$this->sql); 
    	$sql="insert into auditoria(tab_aud, fec_aud, acc_aud, prk_aud, fky_usuario,sql_aud)values('$this->tab_aud', '".date('Y-m-d h:i:s')."', '$this->acc_aud', '$prk_aud','$this->fky_usuario','$this->sql');";
    	return $this->ejecutar($sql);
   }//Auditoria

   public function subir_archivo($url_original,$tmp_name,$carpeta,$nombre_final)
   {
         $tmp = explode(".",$url_original);
         $extension = end($tmp);
         return move_uploaded_file($tmp_name, $carpeta.$nombre_final.".".$extension);

   }

   public function formatear_numero($numero)
   {
      return number_format($numero,0,",",".");
   }

   public function voltear_fecha($fecha)
   {
     $fec_aux=explode("-",$fecha);
     $dia=$fec_aux[2];
     $mes=$fec_aux[1];
     $ano=$fec_aux[0];
     return $dia."/".$mes."/".$ano;
   }

   public function formato_hora($hora)
   {
       return date_format($hora, 'h:i:');

   }

   function voltear_timestamp($fecha)
   {
     $aux=explode(" ",$fecha);
     $fec=$this->voltear_fecha($aux[0]);
     //$hor=$this->formato_hora($aux[1]);
     return $fec;
   }

   function formatear_hora($hora)
   {
     return substr($hora,0,5);
   } 

   function select_generico($tabla,$columna_condicion,$valor_condicion)
   {
      $sql="select * from $tabla where $columna_condicion='$valor_condicion'";
      return $this->ejecutar($sql);
   }

   function combo_generico($puntero,$nombre_combo,$seleccionado,$columna_guardar,$columna_mostrar)
   {
       echo "<select name='$nombre_combo' id='$nombre_combo' class='form-control'>";
       $i=0;
       while(($datos=$this->extraer_dato($puntero))>0)
       {
          echo "<option value='$datos[$columna_guardar]'>$datos[$columna_mostrar]</option>";
          $i++;
       }
       if($i==0)
         echo "<option value=X'>No Hay Registros</option>";
      
       echo "</select>";

   }

  public function contar_registros($tabla)
  {
    $sql="select count(*) as total from $tabla";
    return $this->ejecutar($sql);
  }


}//Fin de la Clase

?>