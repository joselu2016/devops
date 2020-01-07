<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilo/estilos.css" rel="stylesheet">
</head>

<body>
<div id="encabezado">microservicio OPERACIONES DE DEPOSITO</div>
<div id="cuerpo">
<center>
<form action="">

  <table  border="0"  >
    <tr bgcolor="#FFCC00">
    <td width="216">ingrese numero de cueNta</td>
    <td width="255"><label for="accion"></label>
      <input type="text" name="busca" id="busca" class="cajaGrande"></td>
    <td width="188"> </td>
  </tr>
  <tr bgcolor="#FFCC00">
    <td width="216">ingrese MONTO A DEPOSITAR</td>
    <td width="255"><label for="accion"></label>
      <input type="text" name="monto" id="monto" class="cajaGrande"></td>
    <td width="188"> <input type="submit" name="b" value="REGISTRAR DEPOSITO"></td>
  </tr>
</table>

<input type="hidden" name="accion" id="accion"  value="registra">
</form>
<?php 
$nide="";
$id="op";

$accion=sqlite_escape_string(@$_REQUEST['accion']);

$busca=sqlite_escape_string(@$_REQUEST['busca']);
$monto=sqlite_escape_string(@$_REQUEST['monto']);
 include ("conectar.php");
 
 if ($accion=="registra") {
$consulta="select idoperacion from operaciones";
$rs_tabla = mysql_query($consulta);
$nrs=mysql_num_rows($rs_tabla);
$nrs=$nrs+1;
$nide=$id.$nrs;
 $fecha=date("d/m/Y");
 
 $registra_operacion="INSERT INTO operaciones(idoperacion,ncuentaop,tipo,monto,fecha,estado) VALUES ('$nide','$busca','Deposito','$monto','$fecha','1')";	

$rs_operacion=mysql_query($registra_operacion);

//actualiza monto de la cuenta


	
$deposito="UPDATE cuentas SET montobase=montobase+'$monto' WHERE ncuenta='$busca'";					
	$rs_operacion=mysql_query($deposito);	


echo"Deposito realizado correctamente";
 }

 ?>
  




</center>


</div>
<div id="pie">devop's </div>

 </body>
</html>