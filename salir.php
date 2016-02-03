<?php
//Codigo para salir
	session_start();
	$_SESSION["usuario"]="";
	include("funciones/mensajes.php");
	echo mostrar_mensaje("Cerrando Sistema","El Sistema se ha cerrado correctamente.","<a href='index.php'>Ir al inicio</a>");
?>