<?php
	include("funciones/verificar_inicio_sesion.php");

//Incluimos el archivo con las funciones para mostrar mensajes
include("funciones/mensajes.php");	
		
	include("conexion.php");

	//Consultar el cliente a modificar
	$rst_cliente=mysql_query("SELECT * FROM clientes WHERE clicodigo='". $_GET["codcli"] ."';",$conexion);
	if (mysql_num_rows($rst_cliente)==0)
	{
		mysql_close($conexion);
		echo mostrar_mensaje("Cliente no encontrado","El cliente con el codigo {$_GET['codcli']} no existe en la BD","<a href='javascript:history.go(-1)>Volver</a>");
		exit();
	}	
	// Cargamos el recordset al arreglo $campos_cliente para acceder a los datos
	$campos_cliente=mysql_fetch_array($rst_cliente);
	// Cargamos las fechas en que se creò y se modificó el cliente
	$fecha_creado=$campos_cliente["clifecha"];
	$fecha_mod=$campos_cliente["clifechamod"];
	// Verificamos si existe la fecha y aplicamos formato
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
<title>MODIFICAR CLIENTE</title>
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
    <td><div align="center" class="title">MODIFICAR CLIENTE</div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo1"><a href="javascript:history.go(-1)">Regresar al listado de clientes</a></div></td>
  </tr>
  <tr>
    <td class="style6"><form action="cliente_modificar_guardar.php?codcli=<?php echo $_GET["codcli"] ?>&num=<?php echo $_GET["num"] ?>" method="post" enctype="multipart/form-data" name="clientes" style="border:thin" title="Nuevo Cliente">
	<table style="width: 100%">
		<tr>
			<td width="200" class="style5" style="width: 200px">C&oacute;digo<span class="style8">*</span></td>
			<td colspan="2" class="style7">
			<input name="codigo" type="text" class="style10" style="width: 65px" value="<?php echo $campos_cliente["clicodigo"] ?>" ></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Nombre<span class="style8">*</span></td>
			<td width="427" class="style7">
			<input name="nombre" type="text" style="width: 331px" class="style10" value="<?php echo $campos_cliente["clinombre"] ?>"></td>
		    <td width="147" rowspan="5" class="style7"><div align="center">
              
            </div></td>
		</tr>
		<tr>
			<td style="width: 200px" class="style5">Representante<span class="style8">*</span></td>
			<td class="style7">
			<input name="representante" type="text" style="width: 73px" class="style10" value="<?php echo $campos_cliente["clirepresentante"] ?>" ></td>
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
			echo "Usuario: ". $campos_cliente["cliusuario"];
			
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