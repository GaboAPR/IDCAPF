function validar_cliente()
{

	var ced_cli=document.getElementById("ced_cli").value
	var nom_cli=document.getElementById("nom_cli").value
	var dir_cli=document.getElementById("dir_cli").value
	var tel_cli=document.getElementById("tel_cli").value
	var est_cli=document.getElementById("est_cli").selectedIndex

	if(ced_cli=="" || nom_cli=="" || dir_cli=="" || tel_cli=="" || est_cli==0)
	{
		alert("Debe llenar los campos obligatorios")
		if(est_cli==0)
		{
			document.getElementById("est_cli").className="borde-rojo form-control"
			document.getElementById("est_cli").focus()
		}
		else
		{
			document.getElementById("est_cli").className="borde-negro form-control"
		}

		if(tel_cli=="")
		{
			document.getElementById("tel_cli").className="borde-rojo form-control"
			document.getElementById("tel_cli").focus()
		}
		else
		{
			document.getElementById("tel_cli").className="borde-negro form-control"
		}

		if(dir_cli=="")
		{
			document.getElementById("dir_cli").className="borde-rojo form-control"
			document.getElementById("dir_cli").focus()
		}
		else
		{
			document.getElementById("dir_cli").className="borde-negro form-control"
		}

		if(nom_cli=="")
		{
			document.getElementById("nom_cli").className="borde-rojo form-control"
			document.getElementById("nom_cli").focus()
		}
		else
		{
			document.getElementById("nom_cli").className="borde-negro form-control"
		}

		if(ced_cli=="")
		{
			document.getElementById("ced_cli").className="borde-rojo form-control"
			document.getElementById("ced_cli").focus()
		}
		else
		{
			document.getElementById("ced_cli").className="borde-negro form-control"
		}

		return
	}else
	{
		document.getElementById("nom_for").submit();
	}
}

function buscar_cliente(tecla)
{
	/*onkeyup:todas las teclas tienen keyCode*/
	/*onkeypress:numeros y letras tienen charCode, teclas de accion tienen keyCode*/
	var tec=tecla.keyCode
	
	if(tec==13){	
		var ced=document.getElementById("ced_cli").value
		ced=(ced!="")?ced:"0"
	
		/*Instanciamos un objeto AJAX*/
		var objAjax=new XMLHttpRequest
		objAjax.open("GET","../../../backend/controlador/cliente.php?accion=buscar&ced="+ced)
		objAjax.onreadystatechange=function()
		{
			
			if(objAjax.status==200 && objAjax.readyState==4)
			{
				var respuesta=objAjax.responseText
				var datos=respuesta.split("#")
				if (datos[0]!="" && datos[1]!="")
				{
					document.getElementById("fky_cliente").value=datos[0]
					document.getElementById("nom_cli").value=datos[1]
					document.getElementById("dir_cli").value=datos[2]
				}
				else
				{
					document.getElementById("nom_cli").value="No esta registrado"
					document.getElementById("dir_cli").value="No esta registrado"
				}
			}
		}
		objAjax.send(null)
	}
}