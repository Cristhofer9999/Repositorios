<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<?php

$enlace = mysqli_connect("172.23.125.147:3306", "root","root", "Prueba");

if(!$enlace){
    die("no se pudo conectar a la base de datos". mysqli_error());
}
echo "Conexion exitosa";
mysqli_close($enlace)


 ?>
</body>
</html>