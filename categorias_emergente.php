<?php
	include("funciones/verificar_inicio_sesion.php");
	//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	

	include("conexion.php");
	$rst_categorias=mysql_query("SELECT * FROM categorias;",$conexion);
	if (mysql_num_rows($rst_categorias)==0)
	{
	echo mostrar_mensaje_error("Sin registros","No se encontr&oacute; ninguna categoría en la base de datos","","<a href='javascript:void(0)' onclick='javascript:window.close();'>Cerrar ventana</a>");
	exit();

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Categorías</title>
<script language="JavaScript">
function actualizar(){
	window.opener.document.forms[0].categoria.value = window.document.forms[0].categoria.value
	opener.document.getElementById("resultado").innerHTML ="Seleccionada: "	+ window.document.forms[0].categoria.value
	//window.opener.document.forms[0].opciones.value = window.document.forms[0].valor_seleccionado.value	
	window.close()
}
</script>
<style type="text/css">
<!--
.style10 {	color: #000080;
}
.style7 {	text-align: left;
}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center" class="style11">Seleccione una categoría</div>
<form id="form1" name="form1" method="post" action="">
  <label><span class="style7">
  <select name="categoria" size="10" class="style10" onchange="actualizar();">
    <option value="">[Seleccione una categoría]</option>
    <?php
			while ($filacat=mysql_fetch_array($rst_categorias))
				{

					echo "<option  value='". $filacat["catcodigo"] ."'>". $filacat["catnombre"]  ."</option>";				
				}
			?>
  </select>
  </span></label>
  <label></label>
</form>
</body>
</html>
