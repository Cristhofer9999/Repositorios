<?php
    $curp=$_POST['curp'];
    $datos = json_decode(file_get_contents("https://servicios.southcentralus.cloudapp.azure.com/wservice/padres/w_service_buscar_curp.php?curp=$curp"), true);

    $json = json_encode($datos, JSON_UNESCAPED_UNICODE);
    echo $json;
?>