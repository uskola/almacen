<?php
	//No mostrar los notice
	error_reporting(E_ALL ^ E_NOTICE );
	include("funciones/verificar_inicio_sesion.php");
	//Incluimos el archivo con las funciones para mostrar mensajes
	include("funciones/mensajes.php");	
	include("conexion.php");
	//Filtro de búsqueda 

if ($_GET["busqueda"]!="") //Si se ha escrito algo para buscar
{
	if (is_numeric($_GET["busqueda"]))
		$filtro = " and (procodigo like '%". $_GET["busqueda"] ."%' or proexistencia=". $_GET["busqueda"] .")" ;
	else
		$filtro = " and (pronombre like '%". $_GET["busqueda"] ."%' or catnombre like '%". $_GET["busqueda"] ."%')" ;	
	$enlace="<a href='productos.php' title='Clic para ver todos los productos'>Mostrar todos</a>";
}

	//Consultar la tabla productos
$rst_productos=mysql_query("SELECT * FROM productos, categorias WHERE procategoria=catcodigo ". $filtro ." ;",$conexion);
	//Númnero de registros devueltos por la consulta anterior.
$numero_reg=mysql_num_rows($rst_productos);

//Verificar resultados de la búsqueda o consulta
if ($numero_reg==0 && $_GET["busqueda"]=="")
{ //Si no buscamos nada y la consulta arrojó CERO productos, mostrar mensaje.
	echo mostrar_mensaje_error("Sin registros","No se encontr&oacute; ningun registro en la base de datos","","<a href='producto_nuevo.php'>Crear nuevo producto</a>");
	exit();
} elseif ($numero_reg==0){ //Mensaje para mostrar
	$mensaje_registros="<font color='red'>No se han hallado registros con el criterio: <strong>". $_GET["busqueda"] ."</strong></font>";
} elseif ($_GET["busqueda"]!=""){//Mensaje para mostrar
	$mensaje_registros="<font color='blue'>Registros hallados con el criterio '<strong>". $_GET["busqueda"] ."</strong>': ". $numero_reg ."</font>";
} else {
	$mensaje_registros="Registros en la base de datos: ". $numero_reg;
}

//Paginación
$numero_reg=mysql_num_rows($rst_productos);
$registros = 5;
$pagina = $_GET["num"];

if (!$pagina) {
	$inicio = 0;
	$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $registros;
} 

//Consulta con la instrucciòn LIMIT que permite paginar
$rst_productos=mysql_query("SELECT * FROM productos, categorias WHERE procategoria=catcodigo ". $filtro ." LIMIT $inicio, $registros;",$conexion);
$total_paginas = ceil($numero_reg / $registros);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" title="Nombre del CSS" type="text/css" href="css/estilo.css">
<title>LISTADO DE PRODUCTOS</title>
<style type="text/css">
.style1 {
	text-align: center;
	font-size: medium;
	font-family: Arial;
	margin-left: 40px;
}
.style2 {
	font-family: Arial;
	font-size: small;
}
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {color: #FFFFFF}
.style8 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #990000; }
</style>
</head>

<body >
<?php
	include("funciones/encabezado.php");
?>
<center> 
<table width="800" border="0">
  <tr>
    <td><div align="center"><span class="style1"><strong>LISTADO DE PRODUCTOS</strong></span></div></td>
  </tr>
  <tr>
    <td><div align="center" class="Estilo1">[<a href="producto_nuevo.php" title="Clic para crear un nuevo producto">A&ntilde;adir producto</a>]</div></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="get" action="productos.php">
      <label><span class="Estilo1">Introduzca c&oacutedigo o nombre:</span> </label>
      <input name="busqueda" type="text" title="Escriba el código o nombre del producto" value="<?php echo $_GET["busqueda"]; ?>"/>
      <input type="submit" name="btnbuscar" value="Buscar" />
      <span class="style8"><?php echo $enlace; ?></span> <span class="style8"><?php echo $mensaje_registros ?></span>
    
    </form></td>
  </tr>
  <tr>
    <td>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
  <?php

	//Pagina Anterior
	if(($pagina - 1) > 0) {
		echo "<a href='productos.php?num=".($pagina-1)."'>< Anterior</a> ";
		}
	//Listado de paginas
	if ($total_paginas>1)
	{
		for ($i=1; $i<=$total_paginas; $i++){
			if ($pagina == $i) {
				echo "<b><font color='#FF0000' size='3'>".$pagina."</font></b> ";
			} else {
				echo "<a href='productos.php?num=$i'>$i</a> ";
			} 
		}
	}
	//Pgina Siguiente
	if(($pagina + 1)<=$total_paginas) {
		echo " <a href='productos.php?num=".($pagina+1)."'>Siguiente ></a>";
	}
  
?>
  </font></p>    </td>
  </tr>
  <tr>
    <td>
    <table border="0" cellspacing="0" style="width: 100%">
        <tr>
          <th width="50"   ><div align="center" >Cod</div></th>
          <th width="50"  ><div align="center" >Imagen</div></th>
          <th width="10"  ><div align="center" >Nombre</div></th>
          <th width="10"  ><div align="center" >Categor&iacute;a</div></th>
          <th width="50"  ><div align="center" >Existencias</div></th>
        </tr>
        <?php
	$color="#E0E0E0";
	while ($fila=mysql_fetch_array($rst_productos))
	{
		if ($color=="#FFFFCC") //claro
			$color="#FFFF9F";
		else
			$color="#FFFFCC";
	?>
        <tr bgcolor="<?php echo $color; ?>">
          <td  class="style2" >
            <div align="center"><?php  echo $fila["procodigo"]; ?></div></td>
          <td  class="style2" ><div align="center">
          <?php
		  if ($fila["proimagen"]!="")
		  {
		  ?>
          <img src="/almacen/archivos_subidos/<?php  echo $fila["proimagen"]; ?>" width="60" /> </div>
          <?php
		  } else {
		  
		  	echo "-";
			}
		  ?>          </td>
          <td class="style2" ><?php  echo $fila["pronombre"]; ?></td>
          <td  class="style2" ><div align="center">
              <?php  echo $fila["catnombre"]; ?>
          </div></td>
          <td  class="style2" ><div align="center">
            <?php  echo $fila["proexistencia"]; ?>
          </div></td>
          <td  class="style2" ><div align="center"><a onclick="window.open('producto_modificar.php?codpro=<?php echo $fila["procodigo"]; ?>&num=<?php echo $_GET["num"]; ?>','Modificar','width=800,height=600,left=250,top=100,menubar=1,toolbar=1,resizable=0,resizable=no,scrollbars=0,scrollbars=no')" href="javascript:void(0);">Modificar</a></div></td>
          <td  class="style2"><div align="center"><a href="producto_eliminar_confirmar.php?codpro=<?php  echo $fila["procodigo"]; ?>&num=<?php echo $_GET["num"]; ?>&nom=<?php echo $fila["pronombre"]; ?>" title="Clic para eliminar el producto <?php echo $fila["pronombre"]; ?>">Eliminar</a></div></td>
        </tr>
        <?php
	}
	?>
        <u></u>
      </table></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">
  <?php

	//Pagina Anterior
	if(($pagina - 1) > 0) {
		echo "<a href='productos.php?num=".($pagina-1)."'>< Anterior</a> ";
		}
	//Listado de paginas
	if ($total_paginas>1)
	{
		for ($i=1; $i<=$total_paginas; $i++){
			if ($pagina == $i) {
				echo "<b><font color='#FF0000' size='3'>".$pagina."</font></b> ";
			} else {
				echo "<a href='productos.php?num=$i'>$i</a> ";
			} 
		}
	}
	//Pgina Siguiente
	if(($pagina + 1)<=$total_paginas) {
		echo " <a href='productos.php?num=".($pagina+1)."'>Siguiente ></a>";
	}
  
?>
  </font></p>
</center>
<?php
	include("funciones/pie.php");
?>
</body>

</html>
