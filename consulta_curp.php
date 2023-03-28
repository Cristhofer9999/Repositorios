<?php

    $curp = "COSC990926HNLNLR03";
    $datos = json_decode(file_get_contents("https://servicios.southcentralus.cloudapp.azure.com/wservice/padres/w_service_buscar_curp.php?curp=$curp"), true);
    print_r($datos);
    echo"<br>";
    for($i=0; $i<count($datos); $i++){
        echo $datos[$i]["name"]."<br>";
    }

?>