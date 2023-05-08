<?php

$curp=$_SESSION['curp']=strtoupper($_POST['curp']);

#$mysqli->set_charset("utf8");
include('Conexion_POO.php');
$obj=new class_db(); 
   

    //$curp = "COSF740224HNLNLR06";

    $datos = json_decode(file_get_contents("https://servicios.southcentralus.cloudapp.azure.com/wservice/padres/w_service_buscar_curp.php?curp=$curp"), true);

    $json = json_encode($datos, JSON_UNESCAPED_UNICODE);
    echo $json;
/*

        if ($datos["procede"]=="0" && $datos["status"]="500"){//falla servicio
            echo 500;
        }
        else if ($datos["procede"]=="0" && $datos["status"]="1"){//no encontró
            echo -1;

        }
        else if ($datos["procede"]=="1" && $datos["status"]="1"){//exito
            echo $datos;

        }
        else{
            echo -10;
        }        

   */
  
    
/*    echo $datos["procede"]; 
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
    echo $datos["sexo"]; */

?>