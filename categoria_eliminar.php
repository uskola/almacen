//cambios en categoria
<?php
	include("funciones/verificar_inicio_sesion.php");
//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
		
	if (!is_numeric($_GET["codcat"])) //Verificamos que el codigo de categoria sea un numero
	{	
		echo mostrar_mensaje_error("Imposible borrar","Por favor elimine los registros a traves de las opciones del sistema.","","<a href='javascript:history.go(-1)'>Regresar</a>");
		exit();
	}
	include("conexion.php"); //Conexion con el servidor
	//Ejecutamos el borrado
	mysql_query("DELETE FROM categorias WHERE catcodigo=". $_GET["codcat"] .";",$conexion);
	if (mysql_errno()) //Si hubo algun error
	   {
		echo mostrar_mensaje_error("Imposible borrar","Se produjo el error ". mysql_errno() ,mysql_error(),"<a href='javascript:history.go(-1)'>Regresar</a>");	   
	  } else {//Si no hubo ningun error, regresar al listado de categorias.
		mysql_close($conexion); //Cerramos la conexion
		//Verificamos si el valor de la variable num es realmente un numero
		if (is_numeric( $_GET["num"]))
			$numero_pagina=$_GET["num"]; //Asignamos el numero a la variable
		else 
			$numero_pagina=1; //Asignamos el 1, que es la pagina por defecto
		header("Location:categorias.php?num=". $numero_pagina);
	}
	
?>
