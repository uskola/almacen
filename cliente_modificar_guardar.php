<?php
error_reporting(E_ALL ^ E_NOTICE );
//Verificar la conexiòn
	include("funciones/verificar_inicio_sesion.php");
//Incluimos el archivo con las funciones para mostrar mensajes
	include("funciones/mensajes.php");	

//Verificamos si todos los campos requeridos, tienen valores
if (!is_numeric($_REQUEST["codigo"]) || $_REQUEST["nombre"]=="" || $_REQUEST["representante"]=="")
{
	echo mostrar_mensaje("No se pudo modificar el cliente","Por favor ingrese los campos requeridos antes de guardar los cambios!","<a href='javascript:history.go(-1)'>Regresar</a>");
	exit();
}		
	include("conexion.php");


echo "<body onunload=\"opener.location=('clientes.php')\">";

//Actualizar el registro con UPDATE

	mysql_query("UPDATE clientes SET clicodigo='". $_POST["codigo"] ."', clinombre='". $_POST["nombre"] ."',clirepresentante='". $_POST["representante"] ."',clifechamod=now(),cliusuario='". $_SESSION["usuario"] ."' WHERE clicodigo='". $_GET["codcli"] ."';",$conexion);

//Capturamos posibles errores que se puedan presentar.			
	if (mysql_errno()) //Si hubo algun error
	   {

	    switch (mysql_errno())
	    	{
	    	case 1062: echo mostrar_mensaje_error("Error al modificar cliente.", "Ya existe un cliente en la base de datos con el còdigo ". $_POST["codigo"],mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");break;
			case 1064: echo mostrar_mensaje_error("Error al modificar cliente.", "Hay un error en la consulta. Es posible que alguno de los campos requeridos haya quedado vacío. Por favor verificar. ",mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");break;
	    	case 1054: echo mostrar_mensaje_error("El valor no es apropiado para el campo.", "Es posible que haya ingresado una letra en un campo numérico. Por favor verifique.","<a href='javascript:history.go(-1)'>Regresar</a>");break;	    	
	    	default: 
				echo mostrar_mensaje_error("Error al modificar cliente.", mysql_error(),mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");	
	    	}
	    } else {			//Si no hubo ningun error, regresar al listado de clientes a la pagina en la que estaba el registro modificado.
			if ($mensaje_error=="") //Si no hubo error al subir imagen

			  echo mostrar_mensaje("Cambios guardados","Los cambios fueron guardados sin problemas.","<a href='javascript:void(0);' onclick='window.close();'>Cerrar ventana</a>");
			  //header("Location:clientes.php?num=". $_GET["num"]); 
			 else 
				 echo mostrar_mensaje("No se pudo subir la imagen",$mensaje_error,"<a href='javascript:history.go(-1)'>Regresar</a>");  //Muestra el error al subir imagen
		}
echo "</body>";
	
?>
