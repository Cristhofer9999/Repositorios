<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once "../inclusiones/meta_tags.php"; 
    ?>
        <title>Cambio de director</title>
    
    <?php
        include_once "../inclusiones/css_incluidos_y_favicon.php"; 
    ?>
</head>
<body>

<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL); 
 if ($_POST){
        
    if (isset($_POST['tipoDirector'])){
        $tipoDirector=strtoupper($_POST['tipoDirector']);
    }
    else{
        $tipoDirector=null;
        echo 'NO RECIBI DATO DE CVE_TIPO_DIRECTOR';
        return;
    }
    
        echo $tipoDirector=$_POST['tipoDirector'] ; 
        echo "<br>";
        echo $curp=$_POST['curp'];
        //$curp="PEP1740714HCLRNV02";
        echo "<br>";
        echo $rfc  = $_POST['rfc'];
        echo "<br>";
        echo $nombre  = $_POST['nombre'];
        echo "<br>";
        echo $paterno = $_POST['paterno'];
        echo "<br>";
        echo $materno  = $_POST['materno'];
        echo "<br>";
        echo $fecha = $_POST['fecha'];
        echo "<br>";
        echo $entidad = $_POST['entidad'];
        echo "<br>";
        echo $sexo= $_POST['sexo'];
        echo "<br>";
        echo $telefono_ofi = $_POST['telefono_ofi'];
        echo "<br>";
        echo $telefono_perso = $_POST['telefono_perso'];
        echo "<br>";
        echo$telefono_cel= $_POST['telefono_cel'];
        echo "<br>";
        echo $correo = $_POST['correo'];
        echo "<br>";
        echo $correo_insti = $_POST['correo_insti'];
        echo "<br>";
        echo $cve_centro= $_POST['cve_centro'];
        echo "<br>";
        echo $flag_upddir= $_POST['flag_upddir'];


        //aplicar validaicones server side
        require_once '../php/funciones_php.php';
        $errores=array();

        if (!validaRequerido($tipoDirector)){
			$errores[]='El campo cve tipo direcor llegó vacio';
		}

        if (!validaRequerido($curp)){
			$errores[]='El campo curp llegó vacio';
		}

        if (valida_curp($curp)!=1){
            $errores[]='La CURP no esta bien formada ejemplo PEPE750714HCLRNV02:';
        }

        
        
        //mostrar erroreoe o y ahacer updTAE
        if (!$errores){
            echo 'Ya update';
        }else{
            echo '<ul style="color:red;font-size:25px">';
				foreach ($errores as $error):
					echo '<li>'.$error.'</li>';
				endforeach;
			echo '</ul>';
        }



 }//end post
?>
<?php include_once "../inclusiones/js_incluidos.php"; ?>
</body>
</html>
