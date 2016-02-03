<?php
//Conexión a la BD
$conexion=@mysql_connect("localhost","root","");
if (mysql_error())
{
	include_once("funciones/mensajes.php");
	echo mostrar_mensaje_error("Imposible conectarse a servidor",mysql_error(),mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");
	exit();
}
mysql_select_db("almacen",$conexion); 	
?>