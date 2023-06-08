<?php
    include("class_director.php");
    include("class_db.php");

    class director_dal extends class_db
    {
        function __construct()
        {
            parent::__construct();
        }

        function __destruct()
        {
            parent:: __destruct();
        }
        
        function directorCct($cct)
        {
            $cct=$this->db_conn->real_escape_string($cct);

            $sql = "select * from director ";
            $sql .= "where cve_centro = '$cct'";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $arr = mysqli_fetch_array($rs);

            return $arr;
        }

        //Metodo para actualizar los datos del director cuando el uausrio no cambia la curp
        function updateDirectorNoCURP($obj)
        {
            $cct=$this->db_conn->real_escape_string($cct);

            $sql = "UPDATE centros_educativos
                        SET cve_tipo_director = '$cve_tipo_director',
                            telefono_oficina = '$telefono_oficina',
			                telefono_particular = '$telefono_particular',
			                telefono_celular = '$telefono_celular',
			                correo_electronico_personal = '$correo_electronico_personal']
		                WHERE cv_centro = '$cct'";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

            if(mysqli_num_rows($rs) == 0){
                echo nl2br("No se realizo el UPDATE \n");
                echo "Affected rows (UPDATE): " . mysqli_affected_rows($this->db_conn);
            }
            else
            {
                echo nl2br("Si se realizo el UPDATE \n");
                echo "Affected rows (UPDATE): " . mysqli_affected_rows($this->db_conn);
            }
        }

        //Metodo para actualizar los datos del director cuando el usuario cambia la curp
        function updateDiretorCompleto($cct, $cve_tipo_director, $cve_pais, $cve_estado, $rfc, $curp, $nombre, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $lugar_nacimiento, $sexo, $telefono_oficina, $telefono_particular, $telefono_celular, $correo_electronico_personal, $cve_usuario, $fecha_actualizacion, $tipo_actualizacion)
        {
            $cct=$this->db_conn->real_escape_string($cct);

            $sql = "UPDATE centros_educativos.director
                        SET cve_tipo_director = '$cve_tipo_director',
                            cve_pais = '$cve_pais',
                            cve_estado = '$cve_estado',
                            rfc = '$rfc',
                            curp = '$curp',
                            nombre = '$nombre',
                            apellido_paterno = '$apellido_paterno',
                            apellido_materno = '$apellido_materno,
                            fecha_nacimiento = '$fecha_nacimiento',
                            lugar_nacimiento = '$lugar_nacimiento',
                            sexo = '$sexo',
                            telefono_oficina = '$telefono_oficina',
                            telefono_particular = '$telefono_particular',
                            telefono_celular = '$telefono_celular',
                            correo_electronico_personal = '$correo_electronico_personal',
                            cve_usuario = '$cve_usuario',
                            fecha_actualizacion = getdate(),
                            tipo_actualizacion = '$tipo_actualizacion'
                        WHERE cv_centro = $cct";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

            if(mysqli_num_rows($rs) == 0){
                echo nl2br("No se realizo el UPDATE \n");
                echo "Affected rows (UPDATE): " . mysqli_affected_rows($this->db_conn);
            }
            else
            {
                echo nl2br("Si se realizo el UPDATE \n");
                echo "Affected rows (UPDATE): " . mysqli_affected_rows($this->db_conn);
            }
        }

        //Metodo para obtener la clave 'cve_tipo_director' con la descripcion
        function getCve_tipo_director($cct, $tipo_director)
        {
            $cct=$this->db_conn->real_escape_string($cct);

            $sql = "SELECT cve_tipo_director FROM tipo_director
                        WHERE tipo_director = '$tipo_director'";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $arr = mysqli_fetch_array($rs);

            return $arr;
        }
   
        function actualiza_actividad($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $img1 = $obj->getEVIDENCIA1();
                    $img2 = $obj->getEVIDENCIA2();
                    if (strlen($img1)>0 && strlen($img2)>0){
                        $sql = "update actividad set ";
                        $sql .= "CURP="."'".$obj->getCURP()."',";
                        $sql .= "CLAVE_SECCION="."'".$obj->getCLAVESECCION()."',";
                        $sql .= "NOMBRE_ACTIVIDAD="."'".$obj->getNOMBREACTIVIDAD()."',";
                        $sql .= "FECHA_ACTIVIDAD="."'".$obj->getFECHAACTIVIDAD()."',";
                        $sql .= "HORA_INICIO_ACTIVIDAD="."'".$obj->getHORAINICIOACTIVIDAD()."',";
                        $sql .= "HORA_FIN_ACTIVIDAD="."'".$obj->getHORAFINACTIVIDAD()."',";
                        $sql .= "LUGAR="."'".$obj->getLUGAR()."',";
                        $sql .= "LAT="."'".$obj->getLAT()."',";
                        $sql .= "LON="."'".$obj->getLON()."',";                                
                        $sql .= "BENEFICIARIOS="."'".$obj->getBENEFICIARIOS()."',";
                        $sql .= "EVIDENCIA1="."'".$obj->getEVIDENCIA1()."',";        
                        $sql .= "EVIDENCIA2="."'".$obj->getEVIDENCIA2()."'";
                        $sql .= " where ID_ACTIVIDAD = '".$obj->getIDACTIVIDAD()."'";
            
                    }
                    else if (strlen($img1)==0 && strlen($img2)==0){
                        $sql = "update actividad set ";
                        $sql .= "CURP="."'".$obj->getCURP()."',";
                        $sql .= "CLAVE_SECCION="."'".$obj->getCLAVESECCION()."',";
                        $sql .= "NOMBRE_ACTIVIDAD="."'".$obj->getNOMBREACTIVIDAD()."',";
                        $sql .= "FECHA_ACTIVIDAD="."'".$obj->getFECHAACTIVIDAD()."',";
                        $sql .= "HORA_INICIO_ACTIVIDAD="."'".$obj->getHORAINICIOACTIVIDAD()."',";
                        $sql .= "HORA_FIN_ACTIVIDAD="."'".$obj->getHORAFINACTIVIDAD()."',";
                        $sql .= "LUGAR="."'".$obj->getLUGAR()."',";
                        $sql .= "LAT="."'".$obj->getLAT()."',";
                        $sql .= "LON="."'".$obj->getLON()."',";                                
                        $sql .= "BENEFICIARIOS="."'".$obj->getBENEFICIARIOS()."'";
                        $sql .= " where ID_ACTIVIDAD = '".$obj->getIDACTIVIDAD()."'";            
                    }
                    else if (strlen($img1)>0 && strlen($img2)==0){
                        $sql = "update actividad set ";
                        $sql .= "CURP="."'".$obj->getCURP()."',";
                        $sql .= "CLAVE_SECCION="."'".$obj->getCLAVESECCION()."',";
                        $sql .= "NOMBRE_ACTIVIDAD="."'".$obj->getNOMBREACTIVIDAD()."',";
                        $sql .= "FECHA_ACTIVIDAD="."'".$obj->getFECHAACTIVIDAD()."',";
                        $sql .= "HORA_INICIO_ACTIVIDAD="."'".$obj->getHORAINICIOACTIVIDAD()."',";
                        $sql .= "HORA_FIN_ACTIVIDAD="."'".$obj->getHORAFINACTIVIDAD()."',";
                        $sql .= "LUGAR="."'".$obj->getLUGAR()."',";
                        $sql .= "LAT="."'".$obj->getLAT()."',";
                        $sql .= "LON="."'".$obj->getLON()."',";                                
                        $sql .= "BENEFICIARIOS="."'".$obj->getBENEFICIARIOS()."',";
                        $sql .= "EVIDENCIA1="."'".$obj->getEVIDENCIA1()."'";        
                        $sql .= " where ID_ACTIVIDAD = '".$obj->getIDACTIVIDAD()."'";
                    }
                    else if (strlen($img1)==0 && strlen($img2)>0){
                        $sql = "update actividad set ";
                        $sql .= "CURP="."'".$obj->getCURP()."',";
                        $sql .= "CLAVE_SECCION="."'".$obj->getCLAVESECCION()."',";
                        $sql .= "NOMBRE_ACTIVIDAD="."'".$obj->getNOMBREACTIVIDAD()."',";
                        $sql .= "FECHA_ACTIVIDAD="."'".$obj->getFECHAACTIVIDAD()."',";
                        $sql .= "HORA_INICIO_ACTIVIDAD="."'".$obj->getHORAINICIOACTIVIDAD()."',";
                        $sql .= "HORA_FIN_ACTIVIDAD="."'".$obj->getHORAFINACTIVIDAD()."',";
                        $sql .= "LUGAR="."'".$obj->getLUGAR()."',";
                        $sql .= "LAT="."'".$obj->getLAT()."',";
                        $sql .= "LON="."'".$obj->getLON()."',";                                
                        $sql .= "BENEFICIARIOS="."'".$obj->getBENEFICIARIOS()."',";
                        $sql .= "EVIDENCIA2="."'".$obj->getEVIDENCIA2()."'";
                        $sql .= " where ID_ACTIVIDAD = '".$obj->getIDACTIVIDAD()."'";           
                    }
                    //echo $sql;//exit;
                    
                    $this->set_sql($sql);
                    $this->db_conn->set_charset("utf8");
                    
                    mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            
             
            
                    if(mysqli_affected_rows($this->db_conn)==1) {
                        $actualizado=1;
                    }else{
                        $actualizado=0;
                    }
                    unset($obj);
                    return $actualizado;
                }
            
   
   
    }
?>