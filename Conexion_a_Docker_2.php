<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion con vizualizacion de datos</title>
</head>
<body>

<div class="panel-body">
<?php
  $conn = new mysqli("172.23.125.147:3306" , "root" , "root" ,"Prueba");
  
  if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
  } 

  echo 'Conectado a la base de datos.<br>';

  $result = $conn->query("SELECT cve_centro, curp, nombre FROM director");

  echo "Numero de resultados: $result->num_rows";

  $result->close();

  $conn->close();
?>
</div>

</body>
</html>