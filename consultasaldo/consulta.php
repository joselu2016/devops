<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilo/estilos.css" rel="stylesheet">
</head>

<body>
<div id="encabezado">microservicio consulta de saldos</div>
<div id="cuerpo">
<center>
<form action="">
<table  border="0"  >
  <tr bgcolor="#FFCC00">
    <td width="216">ingrese numero de cueta</td>
    <td width="255"><label for="busca"></label>
      <input type="text" name="busca" id="busca" class="cajaGrande"></td>
    <td width="188"> <input type="submit" name="b" value="Buscar"></td>
  </tr>
 
</table></form>
<?php 
$busca=sqlite_escape_string(@$_REQUEST['busca']);
 include ("conectar.php");

 $consulta="select * from cuentas where ncuenta='$busca' ";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
$filas = mysql_fetch_array($rs_tabla);
$compara=($filas["montobase"]);
 ?>
  

<table width="406" border="0">
  <tr>
    <td width="133">cuenta:</td>
    <td width="257"><?php echo($filas["ncuenta"]);?></td>
  </tr>
  <tr>
    <td>cliente:</td>
    <td><?php echo($filas["nombres"]);?></td>
  </tr>
  <tr>
    <td>saldo actual:</td>
    <td><b>$<?php echo number_format($filas["montobase"],2);?></td>
  </tr>
  <tr>
  
    <td colspan="2"><? if($compara<=10){echo"Fondos insuficientes";}else{} ?></td>
  </tr>
</table>




</center>


</div>
<div id="pie">devop's </div>

 </body>
</html>