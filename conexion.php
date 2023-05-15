<?php

	$conexion=mysqli_connect("172.20.30.251","destadistica_usr","c0nsult4","centros_educativos");
  
  if ($conexion->connect_errno)
  {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
  }
  else
  {
    echo $conexion->host_info . "\n";
    echo "<br>";
    echo "\nLa conexion fue exitosa";
  }
?>