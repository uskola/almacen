<?php
	include("funciones/verificar_inicio_sesion.php");
	//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
	
//========== VERIFICAR QUE LOS VALORES SON CORRECTOS 

if (!is_numeric($_POST["codigo"]) || $_POST["nombre"]=="" || !is_numeric($_POST["venta"]) || !is_numeric($_POST["costo"]) || !is_numeric($_POST["existencia"]) || !is_numeric($_POST["categoria"]) || $_POST["fecha"]=="")
{	

	
	echo mostrar_mensaje("No se pudo crear el producto","Por favor ingrese los campos requeridos antes de continuar!","<a href='javascript:history.go(-1)'>Regresar</a>");
	exit();
}

	$arreglo_fecha=explode("/",$_POST["fecha"]);
	if (!checkdate($arreglo_fecha[1],$arreglo_fecha[0],$arreglo_fecha[2])) 
	{
		echo mostrar_mensaje("No se pudo crear el producto","Por favor ingrese una fecha valida en el formato DD/MM/AAAA!","<a href='javascript:history.go(-1)'>Regresar</a>");
	exit();		
	}
	$fecha_mysql=$arreglo_fecha[2]."-".$arreglo_fecha[1]."-".$arreglo_fecha[0];
	
	include("conexion.php");
	
//===== Consulta para añadir el registro a la tabla
	mysql_query("INSERT INTO productos (procodigo,pronombre,proprecioventa,procostoactual,proexistencia,procategoria,proobservaciones,profecha) ".
		"VALUES (". $_POST["codigo"] .",'". $_POST["nombre"] ."',". $_POST["venta"] .",". $_POST["costo"] .",". $_POST["existencia"] .",". $_POST["categoria"] .",'". $_POST["observaciones"] ."','". $fecha_mysql ."');",$conexion);
		
	if (mysql_errno()==0)
	{ //REgresar si no ocurriò ningun error
		header("Location:productos.php");
	} else { //Mostrar el error que ocurrio
		include("funciones/encabezado.php");
		switch (mysql_errno())
		{
			case 1062:
				echo mostrar_mensaje_error("Error al crear producto.", "Ya existe un producto en la base de datos con el còdigo ". $_POST["codigo"],mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>"); break;
			case 1064:
				echo mostrar_mensaje_error("Error al crear producto.", "Hay un error en la consulta. Es posible que alguno de los campos requeridos haya quedado vacío. Por favor verificar. ",mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>"); break;
			
			default:
				echo mostrar_mensaje_error("Error al crear producto.", mysql_error(),mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");			
			}
	include("funciones/pie.php");
	}
?>