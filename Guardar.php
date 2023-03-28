<?php
    #$mysqli->set_charset("utf8");
    /*include('Conexion_a_Docker_Directores.php');
    $bd=new class_db();    
    echo '<pre>';
	print_r($obj);
	echo '</pre>';     */
    
echo $tipoDirector=$POST["tipoDirector"] ; 
echo $curp  = $_POST['curp'];
echo $rfc  = $_POST['rfc'];
echo $nombre  = $_POST['nombre'];
echo $paterno = $_POST['paterno'];
echo $materno  = $_POST['materno'];
echo $fecha = $_POST['fecha'];
echo $entidad = $_POST['entidad'];
echo $sexo= $_POST['sexo'];
echo $telefono_ofi = $_POST['telefono_ofi'];
echo $telefono_perso = $_POST['telefono_perso'];
echo$telefono_cel= $_POST['telefono_cel'];
echo $correo = $_POST['correo'];
echo $correo_insti = $_POST['correo_insti'];
echo $cve_centro= $_POST['cve_centro'];
/*
$insertar = "INSERT INTO director 
(curp, rfc, nombre, apellido_paterno,apellido_materno, fecha_nacimiento, lugar_nacimiento, sexo, telefono_oficina, telefono_particular, telefono_celular, correo_electronico_personal,correo_electronico_institucional) 
VALUES ('$curp','$rfc','$nombre','$paterno',
'$materno','$fecha','$entidad','$sexo','$telefono_ofi','$telefono_perso','$telefono_cel',
'$correo ','$correo_insti')";
#WHERE cve_centro = '$cve_centro'";

$query = mysqli_query($bd->db_conn, $insertar);

if($query){

    echo "<script> alert('correcto');
     location.href = '../Guardar.php';
    </script>";
 
 }else{
     echo "<script> alert('incorrecto');
     location.href = '../Guardar.php';
     </script>";
 } */

?>
