<?php
	include("funciones/verificar_inicio_sesion.php");

//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
		
	include("conexion.php");
	$rst_categorias=mysql_query("SELECT * FROM categorias;",$conexion);
	
	if (mysql_num_rows($rst_categorias)==0)
	{
		mysql_close($conexion);
		echo mostrar_mensaje("Debe agregar categorias","No hay categorias. Clic para registrarlas","");
		exit();
	}
	//Consultar el producto a modificar
	$rst_producto=mysql_query("SELECT * FROM productos WHERE procodigo='". $_GET["codpro"] ."';",$conexion);
	if (mysql_num_rows($rst_producto)==0)
	{
		mysql_close($conexion);
		echo mostrar_mensaje("Producto no encontrado","El producto con el codigo {$_GET['codpro']} no existe en la BD","<a href='javascript:history.go(-1)>Volver</a>");
		exit();
	}	
	//Cargamos el recordset al arreglo $campos_producto para acceder a los datos
	$campos_producto=mysql_fetch_array($rst_producto);
	//Cargamos las fechas en que se creò y se modificó el producto
	$fecha_creado=$campos_producto["profecha"];
	$fecha_mod=$campos_producto["profechamod"];
	//Verificamos si existe la fecha y aplicamos formato
	if ($fecha_creado!="")
		$fecha_creado=strftime("%d/%m/%Y",strtotime($fecha_creado));
	else
		$fecha_creado="Desconocida";
	//Verificamos si existe la fecha y aplicamos formato		
	if ($fecha_mod!="")
		$fecha_mod=strftime("%d/%m/%Y %H:%M:%S",strtotime($fecha_mod));
	else
		$fecha_mod="Desconocida";
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>MODIFICAR PRODUCTO</title>
<style type="text/css">
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style4 {
	font-family: Arial;
	font-size: medium;
}
.style5 {
	font-family: Arial;
	font-size: small;
	text-align: right;
}
.style6 {
	text-align: center;
}
.style7 {
	text-align: left;
}
.style8 {
	color: #FF0000;
}
.style10 {
	color: #000080;
}
.style11 {
	text-align: left;
	color: #FF0000;
}
.style12 {
	color: #000000;
	font-size: x-small;
	font-family: Arial;
}
.style13 {font-family: Arial, Helvetica, sans-serif}
</style>
<script language="JavaScript">
function abrirpopup(){
   window.open("categorias_emergente.php","ventana1","width=200,height=300,scrollbars=YES,menubar=No,menubar=0")
}
</script>
</head>

<body>
<?php
	include("funciones/encabezado.php");
?>
<center> 
<table width="800" border="0">
  <tr>
    <td><div align="center" class="title">MODIFICAR PRODUCTO</div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="Estilo1">Ejemplo de c&oacute;mo editar un 
      registro existente en una tabla de MySQL. </span></div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo1"><a href="javascript:history.go(-1)">Regresar al listado de productos</a></div></td>
  </tr>
  <tr>
    <td class="style6"><form action="producto_modificar_guardar.php?codpro=<?php echo $_GET["codpro"] ?>&num=<?php echo $_GET["num"] ?>" method="post" enctype="multipart/form-data" name="productos" style="border:thin" title="Nuevo Producto">
	<table style="width: 100%">
		<tr>
			<td width="200" class="style5" style="width: 200px">C&oacute;digo<span class="style8">*</span></td>
			<td colspan="2" class="style7">
			<input name="codigo" type="text" class="style10" style="width: 65px" value="<?php echo $campos_producto["procodigo"] ?>" ></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Nombre<span class="style8">*</span></td>
			<td width="427" class="style7">
			<input name="nombre" type="text" style="width: 331px" class="style10" value="<?php echo $campos_producto["pronombre"] ?>"></td>
		    <td width="147" rowspan="5" class="style7"><div align="center">
             <?php
		  if ($campos_producto["proimagen"]!="")
		  {
		  ?>
          <a href="javascript:void(0);" onclick="window.open('archivos_subidos/<?php  echo $campos_producto["proimagen"]; ?>','Imagen','width=600,height=800')" title="CLic para ampliar la imagen" ><img src="archivos_subidos/<?php  echo $campos_producto["proimagen"]; ?>" width="100" border="0" /></a>
          <?php
		  } else {
		  
		  	echo "<font face='Arial'>SIN IMAGEN</font>";
			}
		  ?>  
            </div></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Precio Venta<span class="style8">*</span></td>
			<td class="style7">
			<input name="venta" type="text" class="style10" value="<?php echo $campos_producto["proprecioventa"] ?>"></td>
		    </tr>
		<tr>
			<td style="width: 200px" class="style5">Costo<span class="style8">*</span></td>
			<td class="style7">
			<input name="costo" type="text" class="style10" value="<?php echo $campos_producto["procostoactual"] ?>" ></td>
		    </tr>
		<tr>
			<td style="width: 200px" class="style5">Existencia<span class="style8">*</span></td>
			<td class="style7">
			<input name="existencia" type="text" style="width: 73px" class="style10" value="<?php echo $campos_producto["proexistencia"] ?>" ></td>
		    </tr>
		<tr>
			<td style="width: 200px" class="style5">Categor&iacute;a<span class="style8">*</span></td>
			<td class="style7"><select name="categoria" class="style10">
			<option value="">[Seleccione una categor&iacute;a]</option>
            <?php
				while ($fila=mysql_fetch_array($rst_categorias))
				{	//Verificar si la categorìa a mostrar corresponde con la categoria del producto
					if ($fila["catcodigo"]==$campos_producto["procategoria"])
						echo "<option selected value='". $fila["catcodigo"]."'>".$fila["catnombre"] ."</option>";
					else
						echo "<option value='". $fila["catcodigo"]."'>".$fila["catnombre"] ."</option>";
				
				}
			?>            
			</select>
			  <input type="button" name="button" id="button" value="..." onclick="abrirpopup()" title="Clic para mostrar listado de categorias"/><span id="resultado" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;"></span></td>
		    </tr>
		<tr>
		  <td style="width: 200px" class="style5"><span class="style5" style="width: 200px">Imagen del producto</span></td>
		  <td class="style7"><input type="file" name="imagen" id="imagen" /></td>
		  <td class="style7"><div align="center">
          <?php
          if ($campos_producto["proimagen"]!="")
		  {
		  ?><a href="producto_imagen_eliminar.php?codpro=<?php echo $campos_producto["procodigo"];?>&imagen=<?php  echo $campos_producto["proimagen"]; ?>" class="Estilo1" title="Eliminar imagen del producto">Eliminar</a>
          <?php
		  } else {
		  	echo "-";
		  }
		  ?>
          </div>          </td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Observaciones</td>
			<td colspan="2" class="style7">
			<textarea name="observaciones" style="width: 368px; height: 63px" class="style10"><?php echo $campos_producto["proobservaciones"] ?></textarea></td>
		</tr>
		<tr>
		  <td style="width: 200px" class="style5">&nbsp;</td>
		  <td colspan="2" class="style11">* <span class="style12">Los campos son requeridos.</span></td>
		  </tr>
		<tr>
			<td style="width: 200px" class="style5">&nbsp;</td>
			<td colspan="2" class="style11"><span class="style12">
			<?php 
			
			echo "Fecha creación: ".$fecha_creado . " "; 
			echo "Fecha de modificación: ". $fecha_mod . " ";
			echo "Usuario: ". $campos_producto["prousuario"];
			
			?></span></td>
		</tr>
	</table>
	 <input name="Submit1" type="submit" value="Guardar"></form>	</td>
  </tr>
</table>
</center>
<?php
	include("funciones/pie.php");
?>
</body>
</html>