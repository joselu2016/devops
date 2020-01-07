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
    <td width="188"> </td>
  </tr>
  <tr bgcolor="#FFCC00">
    <td width="216">ingrese MONTO A transferir</td>
    <td width="255"><label for="accion"></label>
      <input type="text" name="monto" id="monto" class="cajaGrande"></td>
    <td width="188">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFCC00">
    <td width="216">ingrese cueNta a donde se transfiere</td>
    <td width="255"><label for="accion"></label>
      <input type="text" name="transfiere" id="transfiere" class="cajaGrande"></td>
    <td width="188"><input type="submit" name="b" value="REGISTRAR"></td>
  </tr>
</table>

<input type="hidden" name="accion" id="accion"  value="registra">
</form>
<?php 

$transfiere=sqlite_escape_string(@$_REQUEST['transfiere']);

$accion=sqlite_escape_string(@$_REQUEST['accion']);


$busca=sqlite_escape_string(@$_REQUEST['busca']);
$monto=sqlite_escape_string(@$_REQUEST['monto']);
 include ("conectar.php");
 $hoy=date("d/m/Y");
 if ($accion=="registra") {

 
 
 $registra="INSERT INTO transferencia(fecha,ncuentatr,cuentadestino,monto) VALUES('$hoy','$busca','$transfiere','$monto')";	

$rs_operacion=mysql_query($registra);
///ACTUALIZA CUENTA  DE LA QUE RECIBE LOS FONDOS

	$dep="UPDATE cuentas SET montobase=montobase +'$monto' WHERE ncuenta='$transfiere'";					
$rs_operacion=mysql_query($dep);

	
	//actualiza monto de la cuenta


	$retiro="UPDATE cuentas SET montobase=montobase -'$monto' WHERE ncuenta='$busca'";					
$rs_operacion=mysql_query($retiro);



echo"Tranferencia realizada correctamente";
 }

 ?>
  




</center>


</div>
<div id="pie">devop's </div>

 </body>
</html>