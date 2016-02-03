<?php
	include("funciones/verificar_inicio_sesion.php");
	//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
include("conexion.php");
	//Elimina la imagen del servidor
	$resultado=@unlink("archivos_subidos/". $_GET["imagen"]);
	if ($resultado)
	{
	 echo mostrar_mensaje("Resultado","La imagen del producto fue eliminada","<a href='productos.php'>Regresar al listado de productos</a>"); 
 
	}else {
	echo mostrar_mensaje_error("Error al eliminar imagen.", "La imagen no fue encontrada o no pudo ser eliminada","","<a href='javascript:history.go(-1)'>Regresar</a>");			
	}
	 //Elimina el nombre de la imagen de la Base de datos
	 if (!file_exists("archivos_subidos/". $_GET["imagen"])) //SI despues de borrado el archivo NO EXISTE, quitar de la BD
	 	mysql_query("UPDATE productos SET proimagen=null WHERE procodigo=". $_GET["codpro"].";",$conexion);
?>
