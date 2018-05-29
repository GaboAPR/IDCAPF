function buscar_producto(fila,tecla) 
{
	var tec=tecla.keyCode
	if(tec==13){
		var cod=document.getElementById("fky_producto"+fila).value
		var cod=(cod!="")?cod:"0"
		var objAjax=new XMLHttpRequest
		objAjax.open("GET","../../../backend/controlador/producto.php?accion=buscar&cod="+cod)
		objAjax.onreadystatechange=function()
		{
	
			if(objAjax.status==200 && objAjax.readyState==4)
			{
				var respuesta=objAjax.responseText
				var datos=respuesta.split("#")
				if(datos[0]!="" && datos[1]!="" && datos[2]!="")
				{
					//var impuesto=parseInt(datos[2])
					document.getElementById("nom_pro"+fila).value=datos[0]
					document.getElementById("pre_det"+fila).value=datos[1]
					var impuesto=document.getElementById("imp_pro"+fila).value=datos[2]
	
					var base=document.getElementById("bas_det"+fila).value=datos[1]*
					document.getElementById("can_det"+fila).value
	
					var iva=document.getElementById("iva_det"+fila).value=base*(impuesto/100)
					document.getElementById("tot_det"+fila).value=base+iva
					sumar_cuenta()
				}
				else
				{
					document.getElementById("nom_pro"+fila).value="Sin Registro"
					document.getElementById("pre_det"+fila).value=""
					document.getElementById("bas_det"+fila).value=""
					document.getElementById("can_det"+fila).value=1
					document.getElementById("iva_det"+fila).value=""
					document.getElementById("tot_det"+fila).value=""
					sumar_cuenta()
				}
			}
		}
		objAjax.send(null)
	}
}

function validar_producto()
{
	var cod_pro=document.getElementById("cod_pro").value
	var nom_pro=document.getElementById("nom_pro").value
	var pre_pro=document.getElementById("pre_pro").value
	var inv_pro=document.getElementById("inv_pro").value
	var imp_pro=document.getElementById("imp_pro").value
	var min_pro=document.getElementById("min_pro").value
	var max_pro=document.getElementById("max_pro").value

	var fky_marca=document.getElementById("fky_marca").selectedIndex
	var est_pro=document.getElementById("est_pro").selectedIndex

	if (cod_pro=="" || nom_pro=="" || pre_pro=="" || inv_pro=="" || min_pro=="" || max_pro=="" || 
		fky_marca==0 || est_pro==0)
	{
		alert("Debe llenar los campos obligatorios")
		if(est_pro==0)
		{
			document.getElementById("est_pro").className="borde-rojo form-control"
			document.getElementById("est_pro").focus()
		}
		else
		{
			document.getElementById("est_pro").className="borde-negro form-control"
		}

		if(fky_marca==0)
		{
			document.getElementById("fky_marca").className="borde-rojo form-control"
			document.getElementById("fky_marca").focus()
		}
		else
		{
			document.getElementById("fky_marca").className="borde-negro form-control"
		}

		if(max_pro=="")
		{
			document.getElementById("max_pro").className="borde-rojo form-control"
			document.getElementById("max_pro").focus()
		}
		else
		{
			document.getElementById("max_pro").className="borde-negro form-control"
		}

		if(min_pro=="")
		{
			document.getElementById("min_pro").className="borde-rojo form-control"
			document.getElementById("min_pro").focus()
		}
		else
		{
			document.getElementById("min_pro").className="borde-negro form-control"
		}

		if(imp_pro=="")
		{
			document.getElementById("imp_pro").className="borde-rojo form-control"
			document.getElementById("imp_pro").focus()
		}
		else
		{
			document.getElementById("imp_pro").className="borde-negro form-control"
		}

		if(inv_pro=="")
		{
			document.getElementById("inv_pro").className="borde-rojo form-control"
			document.getElementById("inv_pro").focus()
		}
		else
		{
			document.getElementById("inv_pro").className="borde-negro form-control"
		}

		if(pre_pro=="")
		{
			document.getElementById("pre_pro").className="borde-rojo form-control"
			document.getElementById("pre_pro").focus()
		}
		else
		{
			document.getElementById("pre_pro").className="borde-negro form-control"
		}

		if(nom_pro=="")
		{
			document.getElementById("nom_pro").className="borde-rojo form-control"
			document.getElementById("nom_pro").focus()
		}
		else
		{
			document.getElementById("nom_pro").className="borde-negro form-control"
		}

		if(cod_pro=="")
		{
			document.getElementById("cod_pro").className="borde-rojo form-control"
			document.getElementById("cod_pro").focus()
		}
		else
		{
			document.getElementById("cod_pro").className="borde-negro form-control"
		}


		return
	}else
	{
		document.getElementById("nom_for").submit();
	}
}


