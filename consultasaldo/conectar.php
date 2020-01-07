<?php
 
  $conexion=mysql_connect("localhost","root") or die("Error: El servidor no puede conectar con la base de datos");
  $descriptor=mysql_select_db("banco",$conexion);

?>
