<?php
	include("funciones/verificar_inicio_sesion.php");
//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	

if ($_SERVER["HTTP_REFERER"]=="") //SI la pagina se cargo directamente desde la URL y no desde clientes
{
	echo mostrar_mensaje_error("Imposible eliminar","Utilice las opciones del sistema.","","<a href='clientes.php?num=". $_GET["num"] ."'>Volver al listado</a>");
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>Confirmar Eliminaci&oacute;n</title>
<style type="text/css">
.style1 {
	text-align: right;
}
.style2 {
	text-align: left;
}
.style3 {
	font-family: Arial;
}
.style4 {
	border-style: solid;
	border-width: 1px;
}
.style5 {
	color: #FF0000;
}
</style>
</head>

<body>
<?php
		include("funciones/encabezado.php");
?>
<center>
<table witdh="400" class="style4">
	<tr>
		<td style="width: 50px">&nbsp;</td>
		<td style="width: 300px" colspan="2">&nbsp;</td>
		<td style="width: 50px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 50px">&nbsp;</td>
		<td style="width: 300px" colspan="2" class="style3"><strong>¿Est&aacute; seguro que desea eliminar el 
		cliente <span class="style5"><?php echo $_GET["codcli"] . " - ".$_GET["nom"]  ?></span>?</strong></td>
		<td style="width: 50px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 50px">&nbsp;</td>
		<td style="width: 150px" class="style1">
		<form method="post" action="cliente_eliminar.php?codcli=<?php echo $_GET["codcli"]; ?>&num=<?php echo $_GET["num"]; ?>">
			<input name="Submit1" type="submit" value="S&iacute;" title="Clic para eliminar el cliente" />&nbsp;&nbsp;&nbsp;
		</form>
		</td>
		<td style="width: 150px" class="style2">
		<form method="post" action="javascript:history.go(-1)">
			&nbsp;&nbsp;&nbsp;<input name="Submit2" type="submit" value="No"  title="Clic para cancelar la eliminación"/></form>
		</td>
		<td style="width: 50px">&nbsp;</td>
	</tr>
</table>
</center>
<?php
		include("funciones/pie.php");
?>
</body>

</html>
