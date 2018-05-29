/*Recibimos la opcion y el usuario seleccionados
 como parámetro*/
function guardarPermiso(opcion,usuario)
{
 document.getElementById("alerta1").className="d-none"
 document.getElementById("alerta2").className="d-none"	

if(document.getElementById(opcion).checked==true)
	accion="agregar"
else
   accion="eliminar"	

/*Instanciamos un objeto AJAX*/
 var objAjax=new XMLHttpRequest;   
 /*Creamos un puente entre cliente y servidor*/
 objAjax.open("GET","../../../backend/controlador/permiso.php?accion="+accion+"&opcion="+opcion+"&usuario="+usuario)
 objAjax.onreadystatechange=function(){
    /*Cuando tengamos respuesta correcta del servidor*/
 	if(objAjax.status==200 && objAjax.readyState==4)
 	{
 		var respuesta=objAjax.responseText

 		if(respuesta==1 && accion=="agregar")
 			{
 			 document.getElementById("alerta1").className="d-block"
 			 document.getElementById("alerta2").className="d-none"
 			}else
 				if(respuesta==1 && accion=="eliminar")
 					{
  					 document.getElementById("alerta1").className="d-none"
 					 document.getElementById("alerta2").className="d-block"		
 					}

 	}

 }
 objAjax.send(null)

}