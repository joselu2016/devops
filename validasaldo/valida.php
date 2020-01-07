<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilo/estilos.css" rel="stylesheet">
</head>

<body>
<div id="encabezado">microservicio transferencia</div>
<div id="cuerpo">
<center>
<form action="">

  <table  border="0"  >
    <tr bgcolor="#FFCC00">
    <td width="216">numero de cueNta del cliente</td>
    <td width="255"><label for="accion"></label>
      <input type="text" name="busca" id="busca" class="cajaGrande"></td>
    <td width="188"><input type="submit" name="b" value="REGISTRAR"></td>
  </tr>
 
</table>

<input type="hidden" name="accion" id="accion"  value="registra">
</form>
<?php 

$base=500;
$accion=sqlite_escape_string(@$_REQUEST['accion']);


$busca=sqlite_escape_string(@$_REQUEST['busca']);
$monto=sqlite_escape_string(@$_REQUEST['monto']);
 include ("conectar.php");
 $hoy=date("d/m/Y");
 if ($accion=="registra") {

 $consulta="select * from cuentas where ncuenta='$busca' ";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
$filas = mysql_fetch_array($rs_tabla);
$compara=($filas["montobase"]);

if($compara<=$base){echo"Fondos insuficientes";}else{
	
	echo"$compara";
	}



 }

 ?>
  




</center>


</div>
<div id="pie">devop's </div>

 </body>
</html>