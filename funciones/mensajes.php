<?php
//Funciones para mostrar mensajes

//Mensaje de error
function mostrar_mensaje_error($titulo,$descripcion,$numero="",$enlace="")
{
	$mensaje="<table width='400' border='1' align='center' cellspacing='0'>\n";
	$mensaje.="<tr bgcolor='#000000'><td>\n";
	$mensaje.="<font color='yellow' size='2' face='Arial'><strong>Error ". $numero."</strong>: $titulo";
	$mensaje.="</td></tr>\n";
	$mensaje.="<tr><td>\n";
	$mensaje.="<font color='red' size='2' face='Arial'>$descripcion \n";
	if ($enlace!="")
		$mensaje.="<div align='center'>$enlace</div> \n";
	$mensaje.="</td></tr>\n";
	$mensaje.="</table>\n";	
	return $mensaje;
}
//Mensaje normal
function mostrar_mensaje($titulo,$descripcion,$enlace="")
{
	$mensaje="<table width='400' border='1' align='center' cellspacing='0'>\n";
	$mensaje.="<tr bgcolor='#000000'><td>\n";
	$mensaje.="<font color='yellow' size='2' face='Arial'><strong>Mensaje</strong>: $titulo";
	$mensaje.="</td></tr>\n";
	$mensaje.="<tr><td>\n";
	$mensaje.="<font color='red' size='2' face='Arial'>$descripcion \n";
	if ($enlace!="")
		$mensaje.="<div align='center'>$enlace</div> \n";
	$mensaje.="</td></tr>\n";
	$mensaje.="</table>\n";	
	return $mensaje;
}
?>
