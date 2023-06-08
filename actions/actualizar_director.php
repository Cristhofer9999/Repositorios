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
session_start();
$cct=$_SESSION['cct'];
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL); 
 if ($_POST){

    //Tipo Director    
    if (isset($_POST['tipoDirector'])){
        $tipoDirector=strtoupper($_POST['tipoDirector']);
    }
    else{
        $tipoDirector=null;
        echo 'NO RECIBI DATO DE CVE_TIPO_DIRECTOR';
        return;
    }

    //CURP
    if (isset($_POST['curp'])){
        $curp=strtoupper($_POST['curp']);
    }
    else{
        $curp=null;
        echo 'NO RECIBI DATO DE CURP';
        return;
    }
    
    //RFC
    if (isset($_POST['rfc'])){
        $rfc=strtoupper($_POST['rfc']);
    }
    else{
        $rfc=null;
        echo 'NO RECIBI DATO DE RFC';
        return;
    }

    //NOMBRE
    if (isset($_POST['nombre'])){
        $nombre=strtoupper($_POST['nombre']);
    }
    else{
        $nombre=null;
        echo 'NO RECIBI DATO DE NOMBRE';
        return;
    }

    //PATERNO
    if (isset($_POST['paterno'])){
        $paterno=strtoupper($_POST['paterno']);
    }
    else{
        $paterno=null;
        echo 'NO RECIBI DATO DE PATERNO';
        return;
    }

    //MATERNO
    if (isset($_POST['materno'])){
        $materno=strtoupper($_POST['materno']);
    }
    else{
        $materno=null;
        echo 'NO RECIBI DATO DE MATERNO';
        return;
    }

    //FECHA
    if (isset($_POST['fecha'])){
        $fecha=strtoupper($_POST['fecha']);
    }
    else{
        $fecha=null;
        echo 'NO RECIBI DATO DE FECHA';
        return;
    }

    //ENTIDAD
    if (isset($_POST['entidad'])){
        $entidad=strtoupper($_POST['entidad']);
    }
    else{
        $entidad=null;
        echo 'NO RECIBI DATO DE ENTIDAD';
        return;
    }

    //SEXO
    if (isset($_POST['sexo'])){
        $sexo=strtoupper($_POST['sexo']);
    }
    else{
        $sexo=null;
        echo 'NO RECIBI DATO DE SEXO';
        return;
    }

    //TELEFONO OFICINA
    if (isset($_POST['telefono_ofi'])){
        $telefono_ofi=strtoupper($_POST['telefono_ofi']);
    }
    else{
        $telefono_ofi=null;
        echo 'NO RECIBI DATO DE TELEFONO DE OFICINA';
        return;
    }

    //TELEFONO PERSONAL
    if (isset($_POST['telefono_perso'])){
        $telefono_perso=strtoupper($_POST['telefono_perso']);
    }
    else{
        $telefono_perso=null;
        echo 'NO RECIBI DATO DE TELEFONO PERSONAL';
        return;
    }

    //TELEFONO CELULAR
    if (isset($_POST['telefono_cel'])){
        $telefono_cel=strtoupper($_POST['telefono_cel']);
    }
    else{
        $telefono_cel=null;
        echo 'NO RECIBI DATO DE TELEFONO CELULAR';
        return;
    }

    //CORREO
    if (isset($_POST['correo'])){
        $correo=strtoupper($_POST['correo']);
    }
    else{
        $correo=null;
        echo 'NO RECIBI DATO DE CORREO PERSONAL INSTITUCIONAL';
        return;
    }

    //CORREO INSTITUCIONAL
    if (isset($_POST['correo_insti'])){
        $correo_insti=strtoupper($_POST['correo_insti']);
    }
    else{
        $correo_insti=null;
        echo 'NO RECIBI DATO DE CORREO INSTITUCIONAL';
        return;
    }

    //CLAVE DE CENTRO
    if (isset($_POST['cve_centro'])){
        $cve_centro=strtoupper($_POST['cve_centro']);
    }
    else{
        $cve_centro=null;
        echo 'NO RECIBI DATO DE CLAVE DE CENTRO';
        return;
    }

    //BANDERA
    if (isset($_POST['flag_upddir'])){
        $flag_upddir=strtoupper($_POST['flag_upddir']);
    }
    else{
        $flag_upddir=null;
        echo 'NO RECIBI DATO DE BANDERA';
        return;
    }

        //
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

        //CLAVE TIPO DE DIRECTOR
        if (!validaRequerido($tipoDirector)){
			$errores[]='El campo cve tipo direcor llegó vacio';
		}

        //CURP
        if (!validaRequerido($curp)){
			$errores[]='El campo curp llegó vacio';
		}

        //CURP REx
        if (valida_curp($curp)!=1){
            $errores[]='La CURP no esta bien formada ejemplo PEPE750714HCLRNV02:';
        }

        //RFC
        if (!validaRequerido($rfc)){
			$errores[]='El campo rfc llegó vacio';
		}

        //RFC REx
        if (valida_rfc($rfc)!=1){
            $errores[]='El RFC no esta bien formadO ejemplo: IKTL980725KN1';
        }

        //NOMBRE
        if (!validaRequerido($nombre)){
			$errores[]='El campo nombre llegó vacio';
		}

        //PATERNO
        if (!validaRequerido($paterno)){
			$errores[]='El campo paterno llegó vacio';
		}

        //MATERNO
        if (!validaRequerido($materno)){
			$errores[]='El campo materno llegó vacio';
		}

        //FECHA
        if (!validaRequerido($fecha)){
			$errores[]='El campo fecha llegó vacio';
		}

        //ENTIDAD
        if (!validaRequerido($entidad)){
			$errores[]='El campo entidad llegó vacio';
		}
         
        //SEXO
        if (!validaRequerido($sexo)){
			$errores[]='El campo sexo llegó vacio';
		}

        //TELEFONO OFICINA
        if (!validaRequerido($telefono_ofi)){
			$errores[]='El campo telefono oficina llegó vacio';
		}

        //TELEFONO PERSONAL
        if (!validaRequerido($telefono_perso)){
			$errores[]='El campo telefono personal oficina llegó vacio';
		}

        //TELEFONO CELULAR
        if (!validaRequerido($telefono_cel)){
			$errores[]='El campo telefono celular llegó vacio';
		}

        //CORREO PERSONAL INSTITUCIONAL
        if (!validaRequerido($correo)){
			$errores[]='El campo correo personal institucional llegó vacio';
		}

        //CORREO INSTITUCIONAL
        if (!validaRequerido($correo_insti)){
			$errores[]='El campo correo institucional llegó vacio';
		}

        //CLAVE CENTRO
        if (!validaRequerido($cve_centro)){
			$errores[]='El campo de cve_centro llegó vacio';
		}

        //BANDERA
        if (!validaRequerido($flag_upddir)){
			$errores[]='El campo de flag_upddir llegó vacio';
		}


        
        
        //mostrar errores  y hacer el UPDATE
        if (!$errores){
            /*proceso de update*/
            include('../class/class_director_dal.php');
            $fecha_actualizacion = date("Y-m-d h:i:s");
            if ($flag_upddir==0){
                $obj_director= new director(
            
                    $cve_centro,
                    $tipoDirector,
                    $pais,//falta
                    $estado,//falta
                    $rfc,
                    $curp,
                    $nombre,
                    $paterno,
                    $materno,
                    $fecha,
                    $entidad,
                    $sexo,
                    $telefono_ofi,
                    $telefono_perso,
                    $telefono_cel,
                    $correo_insti,
                    $correo,
                    null,
                    null,
                    null,
                    $cct,
                    $fecha_actualizacion,
                    $flag_upddir
                );
                $metodos_director=new director_dal;
                if ($metodos_director->updateDirectorNoCURP($obj_director)=="1"){
                    echo "sweealert ok";
                }else{
                    echo "algo salio mal";
                    return;
                }
                

            }
            if ($flag_upddir==1){

            }
            else{
                echo "La bandera llegó con valor desconocido";
                return;
            }



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
