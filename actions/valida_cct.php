<?php
session_start(); 
$clave = $_SESSION['cct'] = $_POST['cct'];

//echo $clave;
include('../modelo/class_centro_educativo_dal.php');
$obj_ce= new centro_educativo_dal;
$result_existe=$obj_ce->existeCct($clave);

echo $result_existe;
?>