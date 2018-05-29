function seleccionar_ciudad()
{
	var est=document.getElementById('fky_estado').value
	var objAjax=new XMLHttpRequest;
	objAjax.open("GET","../../../backend/controlador/ciudad.php?accion=select_generico&valor="+est)
	objAjax.onreadystatechange=function()
	{

	 if(objAjax.status==200 && objAjax.readyState==4)
	 	{
	 		document.getElementById("zona_ciudad").innerHTML=objAjax.responseText
	 	}

	}
	objAjax.send(null)		
}