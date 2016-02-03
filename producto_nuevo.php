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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>LISTADO DE PRODUCTOS</title>
<style type="text/css">
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style4 {
	font-family: Arial;
	font-size: 12px;
	font-weight: bold;
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
.style14 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #003366; }
</style>
</head>

<body>
<?php
	include("funciones/encabezado.php");
?>
<center> 
<table width="800" border="0">
  <tr>
    <td height="18"><div align="center" class="title" >A&Ntilde;ADIR PRODUCTO</div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo1">Ejemplo de c&oacute;mo insertar un nuevo 
		registro en una tabla de MySQL. </div>
        <div align="center" class="Estilo1"><a href="javascript:history.go(-1)">Regresar al listado de productos</a></div></td>
  </tr>
  <tr>
    <td class="style6"><form name="productos" action="producto_nuevo_guardar.php" title="Nuevo Producto" style="border:thin" method="post">
	<table style="width: 100%">
		<tr>
			<td style="width: 200px" class="style5">C&oacute;digo<span class="style8">*</span></td>
			<td class="style7">
			<input name="codigo" type="text" style="width: 65px" class="style10"></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Nombre<span class="style8">*</span></td>
			<td class="style7"><input name="nombre" type="text" style="width: 331px" class="style10" /></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Precio Venta<span class="style8">*</span></td>
			<td class="style7"><input name="venta" type="text" class="style10"></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Costo<span class="style8">*</span></td>
			<td class="style7"><input name="costo" type="text" class="style10"></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Existencia<span class="style8">*</span></td>
			<td class="style7">
			<input name="existencia" type="text" style="width: 73px" class="style10"></td>
		</tr>
		<tr>
          <td style="width: 200px" class="style5">Fecha de creación <span class="style8">*</span></td>
		  <td class="style7"><input name="fecha" type="text" class="style10" id="fecha" size="15" maxlength="10" title="Introduzca la fecha de creación del producto en el formato dd/mm/yyyy" /> 
		    <span class="style14">Formato DD/MM/YYYY</span></td>
		  </tr>
		<tr>
			<td style="width: 200px" class="style5">Categor&iacute;a<span class="style8">*</span></td>
			<td class="style7">
            <select name="categoria" class="style10">
			<option selected="" value="">[Seleccione una categor&iacute;a]</option>
            <?php
				while ($fila=mysql_fetch_array($rst_categorias))
				{
					echo "<option value='". $fila["catcodigo"]."'>".$fila["catnombre"] ."</option>";
				
				}
			?>
			</select></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Observaciones</td>
			<td class="style7">
			<textarea name="observaciones" style="width: 368px; height: 63px" class="style10"></textarea></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">&nbsp;</td>
			<td class="style11">
			* <span class="style12">Los campos son requeridos.</span></td>
		</tr>
	</table>
	 <input name="Submit1" type="submit" value="Guardar"></form>
	</td>
  </tr>
</table>
</center>
</body>
</html>
<?php
	mysql_close($conexion);
	include("funciones/pie.php");
?>