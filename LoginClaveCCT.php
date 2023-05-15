<?php 

    require 'conexion.php';

    //$clave = $_POST['cct'];
    //$clave = $_REQUEST['cct'];  
    // $clave = $_SESSION['cct'] = $_POST['cct'];
    //$clave = "05ABJ0001Z";
    $clave = $_SESSION['cct'];

    $jsonData = array();
    $selectQuery = "SELECT cct from vista_cct where cct = '$clave'";
    $query = mysqli_query($conexion, $selectQuery);
    $numFilas = mysqli_num_rows($query);

    if ($numFilas <= 0){
        $jsonData['success'] = 0;
        $jsonData['message'] = "La clave no existe: ".$clave;
        $jsonData['cct'] = 0;
    }
    else {
        $jsonData['success'] = 1;
        $jsonData['message'] = "La clave si existe: ".$clave;
        $jsonData['cct'] = $clave;
        header("location: directorescambios.php");
    }

    echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
?>