<?php
	//Incluir el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");
	//Incluir el archivo que permite la conexión al servidor y escoger la BD
include("conexion.php");
	//Consultar la BD para ver si el usuario y clave son correctos
$rst=mysql_query("SELECT * FROM usuarios WHERE usrlogin='". $_REQUEST["usuario"] ."' and usrclave='". $_REQUEST["clave"] ."';",$conexion);
	//Averiguar cuántos registros devolvió la consulta anterior.
$numero_reg=mysql_num_rows($rst);
	//Si el número de registros es mayor que CERO, damos la bienvenida
if ($numero_reg>0)
{
	//Cerrar la conexión
	mysql_close($conexion); 
	session_start();
	$_SESSION["usuario"]=$_REQUEST["usuario"];
	header("Location:opciones.php");
	exit();
} else { //Si no es mayor que CERO es porque los datos no son correctos
	//Mostrar el mensaje usando la funcion del archivo errores.php
	echo mostrar_mensaje_error("Acceso denegado","Usuario o clave no v&aacute;lidos. Por favor int&eacute;ntelo nuevamente.","","<a href='javascript:history.go(-1)'>Volver</a>");
}	
	//Cerramos la conexión
mysql_close($conexion); 

?>