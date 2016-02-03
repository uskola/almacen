<?php
error_reporting(E_ALL ^ E_NOTICE );
include("funciones/mensajes.php");	
if($_GET['accion']=="registrar") {

   /*Esto quiere decir que se está enviando el formulario y hay que registrar */
	 $nom=$_POST['nom'];
   $user=$_POST['user'];
   $pass1=$_POST['pass1'];
   $pass2=$_POST['pass2'];


   if($pass1==$pass2) {
       /*Si las passwords coindicen registramos:*/

       $conexion = mysql_connect("localhost", "root", "");

       mysql_select_db("almacen", $conexion);

       $sql="INSERT INTO usuarios (usrlogin, usrclave, usrnombre) VALUES ('".$user."', '".$pass1."', '".$nom."')";

       mysql_query($sql, $conexion) or die ("Error al insertar datos ". mysql_error());
			echo mostrar_mensaje("Registro exitoso","","<a href='index.php'>Login</a>");
   } else {
       die("Error, las password no coinciden");
   }
} else { ?><html><head><title>Registro</title></head>
<body>
<form action="registro.php?accion=registrar" method="POST">
Introduce nombre: <input type="text" name="nom"><br>
Introduce usuario: <input type="text" name="user"><br>
Introduce password: <input type="password" name="pass1"><br>
Confirma password: <input type="password" name="pass2"><br>

<input type="submit" value="Registrar">
</form>
</body>
</html>
<?php 
}
?>