<?php
error_reporting(E_ALL ^ E_NOTICE );
//Verificar la conexiòn
	include("funciones/verificar_inicio_sesion.php");
//Incluimos el archivo con las funciones para mostrar mensajes
	include("funciones/mensajes.php");	

//Verificamos si todos los campos requeridos, tienen valores
if (!is_numeric($_REQUEST["codigo"]) || $_REQUEST["nombre"]=="" || !is_numeric($_REQUEST["venta"]) || !is_numeric($_REQUEST["costo"]) || !is_numeric($_REQUEST["existencia"]) || !is_numeric($_REQUEST["categoria"]))
{
	echo mostrar_mensaje("No se pudo modificar el producto","Por favor ingrese los campos requeridos antes de guardar los cambios!","<a href='javascript:history.go(-1)'>Regresar</a>");
	exit();
}		
	include("conexion.php");
	
//=========== SUBIR IMAGEN DEL PRODUCTO ======================
$tamano_archivo = $HTTP_POST_FILES['imagen']['size']; 
$tipo_archivo = $HTTP_POST_FILES['imagen']['type']; 
//Guardamos el mismo valor del campo proimagen en caso de que no se suba imagen. De lo contrario se guardarìa una cadena vacía, que borraría el nombre de la imagen anterior si existe
$nombre_imagen="proimagen";
//Si se escogió algún archivo como imagen del producto, continuamos con la subida del archivo
if ($HTTP_POST_FILES['imagen']['name']!="")
{
//Verifica tamaño y extensión del archivo para asegurarse que sea imagen y que no exceda el límite establecido 500 KB
 if (!((strpos($tipo_archivo, "gif")=="" || strpos($tipo_archivo, "jpeg")=="" || strpos($tipo_archivo, "jpg")=="" ) && ($tamano_archivo < 500000))) { 
 	   $mensaje_error= "La extensión o el tamaño del archivo que intenta subir no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .jpeg<br><li>se permiten archivos de 500 Kb máximo.</td></tr></table>"; 
	   }else{ 
	   //Verificamos que exista la carpeta imagenes donde se han de subir las imagenes de los productos
	   if (file_exists("archivos_subidos"))
	   	  {//Si no se pudo mover el archivo a la carpeta imagenes, se muestra un mensaje
  	   		  if (!move_uploaded_file($HTTP_POST_FILES['imagen']['tmp_name'], "archivos_subidos/".$HTTP_POST_FILES['imagen']['name'])){ 
			  	 $mensaje_error="Ocurrió algún error al subir el archivo. No pudo guardarse."; 
    		   }  
			   else {//Si la imagen se subió, guardaremos su nombre en una variable, que será usada en la instrucción SQL
			  	  $nombre_imagen="'{$HTTP_POST_FILES['imagen']['name']}'";	 
				}  
    	 }else {//Se muestra el mensaje si no existe la carpeta imágenes
    	 	   $mensaje_error= "No existe la carpeta imágenes, por lo tanto no se pudo cargar el archivo. <b>Por favor cree la carpeta antes de continuar.</b>";
    	 }
  	 }		
}

//============ FIN SUBIR IMAGEN

echo "<body onunload=\"opener.location=('productos.php')\">";

//Actualizar el registro con UPDATE

	mysql_query("UPDATE productos SET procodigo='". $_POST["codigo"] ."', pronombre='". $_POST["nombre"] ."',proprecioventa='". $_POST["venta"] ."',procostoactual='". $_POST["costo"] ."',proexistencia='". $_POST["existencia"] ."',procategoria='". $_POST["categoria"] ."',proobservaciones='". $_POST["observaciones"] ."', proimagen=". $nombre_imagen .",profechamod=now(),prousuario='". $_SESSION["usuario"] ."' WHERE procodigo='". $_GET["codpro"] ."';",$conexion);

//Capturamos posibles errores que se puedan presentar.			
	if (mysql_errno()) //Si hubo algun error
	   {

	    switch (mysql_errno())
	    	{
	    	case 1062: echo mostrar_mensaje_error("Error al modificar producto.", "Ya existe un producto en la base de datos con el còdigo ". $_POST["codigo"],mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");break;
			case 1064: echo mostrar_mensaje_error("Error al modificar producto.", "Hay un error en la consulta. Es posible que alguno de los campos requeridos haya quedado vacío. Por favor verificar. ",mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");break;
	    	case 1054: echo mostrar_mensaje_error("El valor no es apropiado para el campo.", "Es posible que haya ingresado una letra en un campo numérico. Por favor verifique.","<a href='javascript:history.go(-1)'>Regresar</a>");break;	    	
	    	default: 
				echo mostrar_mensaje_error("Error al modificar producto.", mysql_error(),mysql_errno(),"<a href='javascript:history.go(-1)'>Regresar</a>");	
	    	}
	    } else {			//Si no hubo ningun error, regresar al listado de productos a la pagina en la que estaba el registro modificado.
			if ($mensaje_error=="") //Si no hubo error al subir imagen

			  echo mostrar_mensaje("Cambios guardados","Los cambios fueron guardados sin problemas.","<a href='javascript:void(0);' onclick='window.close();'>Cerrar ventana</a>");
			  //header("Location:productos.php?num=". $_GET["num"]); 
			 else 
				 echo mostrar_mensaje("No se pudo subir la imagen",$mensaje_error,"<a href='javascript:history.go(-1)'>Regresar</a>");  //Muestra el error al subir imagen
		}
echo "</body>";
	
?>
