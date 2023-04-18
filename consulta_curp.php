<?php

    $curp = "COSF740224HNLNLR06";
    $datos = json_decode(file_get_contents("https://servicios.southcentralus.cloudapp.azure.com/wservice/padres/w_service_buscar_curp.php?curp=$curp"), true);
    print_r($datos);

   
    echo"<br>";
    echo"<br>";
    //for($i=0; $i<count($datos); $i++){
    //    echo $datos[$i] ["curp"] ."<br>";
    //}
    
    echo $datos["procede"]; 
    echo"<br>";
    echo $datos["curp"]; 
    echo"<br>";
    echo $datos["nombre"]; 
    echo"<br>";
    echo $datos["paterno"]; 
    echo"<br>";
    echo $datos["materno"]; 
    echo"<br>";
    echo $datos["fechaNac"]; 
    echo"<br>";
    echo $datos["nombre_estado"]; 
    echo"<br>";
    echo $datos["sexo"]; 

?>