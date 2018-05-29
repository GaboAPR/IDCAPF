<?php
session_start();
require("../clase/usuario.class.php");
$obj_usu=new usuario;

$obj_usu->asignar_valor("ema_usu",$_POST["ema_usu"]);
$obj_usu->asignar_valor("cla_usu",md5($_POST["cla_usu"]));
$ret=$obj_usu->iniciar_sesion();
$usuario=$obj_usu->extraer_dato($ret);

if($usuario["est_usu"]=="A")
{
	$_SESSION["fky_usuario"]=$usuario["cod_usu"];
	header("Location: ../../menu.php");
}else
{
   $obj_usu->mensaje("danger","Usuario","Iniciar Sesión"); 
}	


?>