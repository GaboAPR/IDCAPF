function insertar_detalle(fila,num_fac){

	var fky_factura=num_fac
	var fky_producto=document.getElementById("fky_producto"+fila).value
	var can_det=document.getElementById("can_det"+fila).value
	var pre_det=document.getElementById("pre_det"+fila).value
	var bas_det=document.getElementById("bas_det"+fila).value
	var iva_det=document.getElementById("iva_det"+fila).value
	var tot_det=document.getElementById("tot_det"+fila).value

	var cadena="fky_factura="+fky_factura+"&fky_producto="+fky_producto+"&can_det="+can_det+"&pre_det="+pre_det+"&bas_det="+bas_det+"&iva_det="+iva_det+"&tot_det="+tot_det
	var objAjax=new XMLHttpRequest
	objAjax.open("POST","../../../backend/controlador/detalle_factura.php?accion=agregar&"+cadena)
	objAjax.onreadystatechange=function()
	{
		var respuesta=objAjax.responseText
		if(objAjax.status==200 && objAjax.readyState==4 && respuesta=="Detalle_factura guardado correctamente.")
		{
			alert(respuesta)
		}
	}
	objAjax.send(null)
	
}

function validar_factura()
{
	/*Capturamos la tabla completa*/
	var tabla=document.getElementById("tabla_detalle")
	/* Contar filas de una tabla */
	var filas=tabla.rows.length

	var num_fac=-1
	var fky_cliente=document.getElementById("fky_cliente").value
	var bas_fac=document.getElementById("bas_fac").value
	var iva_fac=document.getElementById("iva_fac").value
	var tot_fac=document.getElementById("tot_fac").value
	var est_fac="A";
	
	var objAjax=new XMLHttpRequest

	objAjax.open("POST","../../../backend/controlador/factura.php?accion=agregar&fky_cliente="+fky_cliente+"&bas_fac="+bas_fac+"&iva_fac="+iva_fac+"&tot_fac="+tot_fac+"&est_fac="+est_fac)
	objAjax.onreadystatechange=function()
	{	
		var respuesta=objAjax.responseText
		if(objAjax.status==200 && objAjax.readyState==4 && respuesta!="Error al guardar factura.")
		{
			num_fac=respuesta
			alert(respuesta)
			for(var fila=0;fila<filas-1;fila++)
			{
				insertar_detalle(fila,num_fac)
			}
		}
		else
		{
			/*...Aqui pasa algo*/
		}
	}
	objAjax.send(null)


}

function sumar_cuenta()
{	
	/*Capturamos la tabla completa*/
	var tabla=document.getElementById("tabla_detalle")
	/* Contar filas de una tabla */
	var filas=tabla.rows.length
	
	var subtotal=0
	var impuesto=0
	var total=0
	for(var fila=0;fila<filas-1;fila++)
	{
		var bas_det=document.getElementById("bas_det"+fila).value
		var iva_det=document.getElementById("iva_det"+fila).value
		var tot_det=document.getElementById("tot_det"+fila).value
		subtotal+=bas_det*1
		impuesto+=iva_det*1
		total+=tot_det*1
	}

	document.getElementById("bas_fac").value=subtotal
	document.getElementById("iva_fac").value=impuesto
	document.getElementById("tot_fac").value=total
}

function colocar_precio(fila)
{
	var precio=document.getElementById("pre_det"+fila).value
	var impuesto=document.getElementById("imp_pro"+fila).value

	var base=document.getElementById("bas_det"+fila).value=precio*
	document.getElementById("can_det"+fila).value	

	var iva=document.getElementById("iva_det"+fila).value=base*(impuesto/100)
	document.getElementById("tot_det"+fila).value=base+iva
	sumar_cuenta()
}


function agregar_fila(){
	/*Capturamos la tabla completa*/
	var tabla=document.getElementById("tabla_detalle")
	/* Contar filas de una tabla */
	var filas=tabla.rows.length

	/*Insertamos una fila con insertRow*/
	var tr=tabla.insertRow(filas)
	var columna0=tr.insertCell(0)
	var columna1=tr.insertCell(1)
	var columna2=tr.insertCell(2)
	var columna3=tr.insertCell(3)
	var columna4=tr.insertCell(4)

	var fila=filas-1
   columna0.innerHTML="<input type='text' name='fky_producto"+fila+"' id='fky_producto"+fila+"' class='form-control' onkeyup='buscar_producto("+fila+",event)' required>"
	
	columna1.innerHTML="<input type='text' class='form-control' name='nom_pro"+fila+"' id='nom_pro"+fila+"' readonly/>"
	
	columna2.innerHTML="<input type='text' class='form-control' name='can_det"+fila+"' id='can_det"+fila+"' value='1' min='1' max='999' onchange='colocar_precio("+fila+")' onkeyup='colocar_precio("+fila+")' onkeypress='return solo_numeros(event)' required>"
	
	columna3.innerHTML="<input type='text' class='form-control' name='pre_det"+fila+"' id='pre_det"+fila+"' readonly>"
	columna3.innerHTML+="<input type='hidden' name='imp_pro"+fila+"' id='imp_pro"+fila+"'>"
	
	columna4.innerHTML="<input type='text' class='form-control' name='bas_det"+fila+"' id='bas_det"+fila+"' readonly>"
	columna4.innerHTML+="<input type='hidden' name='iva_det"+fila+"' id='iva_det"+fila+"' >"
	columna4.innerHTML+="<input type='hidden' name='tot_det"+fila+"' id='tot_det"+fila+"' >"
}





