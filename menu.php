<?php
	include("funciones/verificar_inicio_sesion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>Menu principal</title>
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFF00;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12;
}
.Estilo3 {font-size: 12px}
.Estilo7 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo8 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000066; }
-->
</style>
</head>

<body>
<p align="center" class="Estilo8">Bienvenido, <strong><?php echo $_SESSION["usuario"]; ?></strong></p>
<table width="180" border="0" cellspacing="0"  align="center" bgcolor="#000000" >
  <tr><td>
<table width="180" border="0" cellspacing="0" cellpadding="0" align="center" style="">
  <tr>
    <td colspan="3" bgcolor="#000000"><div align="center" class="Estilo1">Men&uacute principal</div></td>
  </tr>
  <tr>
    <td width="36" bgcolor="#FFFFFF"><div align="center" class="Estilo7">1</div></td>
    <td width="138" bgcolor="#FFFFFF"><span class="Estilo7"><a href="javascript:void(0);" title="Abrir productos" onclick="window.open('productos.php','principal','width=850,height=600,left=250,top=200,menubar=1,toolbar=1,resizable=0,resizable=no,scrollbars=0,scrollbars=no')">Productos</a></span></td>
    <td width="26" bgcolor="#FFFFFF"><span class="Estilo3"></span></td>
  </tr>
    <tr>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo7">2</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo7"><a href="javascript:void(0);" title="Abrir clientes" onclick="window.open('clientes.php','principal','width=850,height=600,left=250,top=200,menubar=1,toolbar=1,resizable=0,resizable=no,scrollbars=0,scrollbars=no')">Clientes</a></span></td>
    <td bgcolor="#FFFFFF"><span class="Estilo3"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo7">3</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo7"><a href="javascript:void(0);" title="Abrir categorias" onclick="window.open('categorias.php','principal','width=850,height=600,left=250,top=200,menubar=1,toolbar=1,resizable=0,resizable=no,scrollbars=0,scrollbars=no')">Categorias</a></span></td>
    <td bgcolor="#FFFFFF"><span class="Estilo3"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center" class="Estilo7">4</div></td>
    <td bgcolor="#FFFFFF"><span class="Estilo7"><a href="salir.php" target="_top">Salir</a></span></td>
    <td bgcolor="#FFFFFF"><span class="Estilo3"></span></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</td></tr></table>
</body>
</html>
