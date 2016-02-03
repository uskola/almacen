<?php
	include("funciones/verificar_inicio_sesion.php");

//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
		
	include("conexion.php");

	//Consultar la categoría a modificar
	$rst_categorias=mysql_query("SELECT * FROM categorias WHERE catcodigo='". $_GET["codcat"] ."';",$conexion);
	if (mysql_num_rows($rst_categorias)==0)
	{
		mysql_close($conexion);
		echo mostrar_mensaje("Categoria no encontrada","La categoria con el codigo {$_GET['codcat']} no existe en la BD","<a href='javascript:history.go(-1)>Volver</a>");
		exit();
	}	
	$campos_categoria=mysql_fetch_array($rst_categorias);	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>MODIFICAR CATEGORIA</title>
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
    <td><div align="center" class="title">MODIFICAR CATEGORIA</div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo1"><a href="javascript:history.go(-1)">Regresar al listado de categorías</a></div></td>
  </tr>
  <tr>
    <td class="style6"><form action="categoria_modificar_guardar.php?codcat=<?php echo $_GET["codcat"] ?>&num=<?php echo $_GET["num"] ?>" method="post" enctype="multipart/form-data" name="categorias" style="border:thin" title="Nueva Categoria">
	<table style="width: 100%">
		<tr>
			<td width="200" class="style5" style="width: 200px">C&oacute;digo<span class="style8">*</span></td>
			<td colspan="2" class="style7">
			<input name="codigo" type="text" class="style10" style="width: 65px" value="<?php echo $campos_categoria["catcodigo"] ?>" ></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Nombre<span class="style8">*</span></td>
			<td width="427" class="style7">
			<input name="nombre" type="text" style="width: 331px" class="style10" value="<?php echo $campos_categoria["catnombre"] ?>"></td>
		    <td width="147" rowspan="5" class="style7"><div align="center">
              
            </div></td>
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