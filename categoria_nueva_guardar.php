<?php
	include("funciones/verificar_inicio_sesion.php");
	//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
	
	include("conexion.php");
	
//===== Consulta para añadir el registro a la tabla
	mysql_query("INSERT INTO categorias (catcodigo,catnombre) ".
		"VALUES (". $_POST["codigo"] .",'". $_POST["nombre"] ."');",$conexion);
	
	if (mysql_errno()==0)
	{ //Regresar si no ocurrió ningun error
		header("Location:categorias.php");
	} else { //Mostrar el error que ocurrio
		include("funciones/encabezado.php");
		switch (mysql_errno())
		{
			case 1062:
				echo mostrar_mensaje_error("Error al crear categoria.", "Ya existe un cliente en la base de datos con el còdigo ". $_POST["codigo"],mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>"); break;
			case 1064:
				echo mostrar_mensaje_error("Error al crear categoria.", "Hay un error en la consulta. Es posible que alguno de los campos requeridos haya quedado vacío. Por favor verificar. ",mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>"); break;
			
			default:
				echo mostrar_mensaje_error("Error al crear categoria.", mysql_error(),mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");			
			}
	include("funciones/pie.php");
	}
?>