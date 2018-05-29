/*
charcode 48='1'
charcode 57='9'
charcode 44=','
charcode 46='.'
charcode 45='-'
charcode 43='+'
keycode 37='flecha izquierda'
keycode 39='flecha derecha'
keycode 9='tabulador' 
keycode 8='borrar'
keycode 46='supr'
*/

function solo_numeros(tecla)
{
	//alert("la tecla sleccionada fue: "+tecla.keyCode)
	//alert("la tecla sleccionada fue: "+tecla.charCode)
	var tec=tecla.charCode
	var tec2=tecla.keyCode
	
	if(tec>=48 && tec<=57 || (tec==46 || tec2==8 || tec2==37 || tec2==39 || tec2==9 || tec2==46))
	{
		return true
	}
	else
	{
		return false
	}
}

function solo_letras(tecla)
{
 	alert("la tecla sleccionada fue (K): "+tecla.keyCode)
	alert("la tecla sleccionada fue (C): "+tecla.charCode)
}


function formato_cedula(tecla)
{
	var tec=tecla.charCode
	var tec2=tecla.keyCode

	if(tec>=48 && tec<=57 || (tec==69 || tec==101 || tec==102 || tec==70 || tec==105 || tec==73 || tec==82 || tec==114 || tec==86 || tec==118 || tec==45 || tec==46 || tec2==8 || tec2==37 || tec2==39 || tec2==9 || tec2==46))
	{
		return true
	}
	else
	{
		return false
	}
}

function formato_telefono(tecla)
{

	var tec=tecla.charCode
	var tec2=tecla.keyCode

	if(tec>=48 && tec<=57 || (tec==43 ||tec==45 || tec2==8 || tec2==37 || tec2==39 || tec2==9 || tec2==46))
	{
		return true
	}
	else
	{
		return false
	}
}


