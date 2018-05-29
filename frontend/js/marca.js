function validar_marca()
{
	var nom_mar=document.getElementById("nom_mar").value
	var est_sel=document.getElementById("est_mar").selectedIndex

	if(nom_mar=="")
	{
		alert("Debe llenar el nombre de la marca")
		document.getElementById("nom_mar").className="borde-rojo form-control"
		document.getElementById("nom_mar").focus()
		return
	}else
	{
		document.getElementById("nom_mar").className="borde-negro form-control"
	}

	if(est_sel==0)
	{
		alert("Debe seleccionar el estatus de la Marca")
		document.getElementById("est_mar").className="form-control borde-rojo"
		document.getElementById("nom_mar").focus()
		return
	}else
	{
		document.getElementById("est_mar").className="form-control borde-negro"
	}

	document.getElementById("nom_for").submit()
}
