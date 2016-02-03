<?php

//Este archivo verifica que el usuario haya iniciado sesion
//Se incluye en todas las paginas, excepto el index.php
session_start();
if ($_SESSION["usuario"]=="")
	{
	include("funciones/mensajes.php");
	echo mostrar_mensaje_error("Acesso denegado","No ha ingresado en el sistema.","","<a href='index.php'>Ir al inicio</a>");
	exit();
}
?>