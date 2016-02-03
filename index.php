<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
.style1 {
	font-family: Arial;
}
.style3 {
	font-family: Arial;
	text-align: center;
}
.Estilo1 {
	color: #FFFF00;
	font-weight: bold;
}
.Estilo4 {font-family: Arial; text-align: center; font-size: 12; }
.Estilo5 {font-family: Arial; font-size: 12; }
.Estilo8 {font-size: 12px; }
</style>
</head>

<body>
<form method="post" action="verificar.php">
<table width="200" border="0" cellspacing="0"  align="center" bgcolor="#000000" >
  <tr><td>	
	<table style="width: 200"  cellpadding="0" cellspacing="0" align="center">
		<tr>
		  <td colspan="2" bgcolor="#000000" class="style1"><div align="center" class="Estilo1">	      Login</div></td>
	  </tr>
		<tr>
		  <td width="83" bgcolor="#FFFFFF" class="Estilo5">&nbsp;</td>
		  <td width="115" bgcolor="#FFFFFF" class="Estilo5">&nbsp;</td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF" class="style1"><div align="right" class="Estilo8">Usuario</div></td>
			<td bgcolor="#FFFFFF" class="Estilo5">&nbsp;<input name="usuario" type="text" style="width: 94px" /></td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF" class="style1" style="height: 26px"><div align="right" class="Estilo8">Contraseña</div></td>
			<td bgcolor="#FFFFFF" class="Estilo5" style="height: 26px">&nbsp;<input name="clave" type="password" style="width: 95px" /></td>
		</tr>
		<tr>
		  <td colspan="2" bgcolor="#FFFFFF" class="Estilo4">&nbsp;</td>
	  </tr>
		<tr>
			<td colspan="2" bgcolor="#FFFFFF" class="style3">
			<input name="btnentrar" type="submit" value="Acceder" /></td>
		</tr>
		<tr>
		</tr>
	</table>

</td></tr></table>
<div <td bgcolor="#FFFFFF" class="style1"><div align="center" class="Estilo8">¿No estás registrado? <a href="registro.php">Regístrate</a>.</div></td>
</div>
</form>

</body>

</html>
<html>
<head><title>Login de usuarios</title>
</head>
<body>
