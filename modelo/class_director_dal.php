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
            // echo '<pre>';
            // echo print_r($obj);
            // echo '</pre>';
            // exit;
            
            // $cct=$this->db_conn->real_escape_string($cct);

            $sql = "update director set ";
            $sql .= "cve_tipo_director = "."'".$obj->getCveTipoDirector()."',";
            $sql .= "telefono_oficina = "."'".$obj->getTelefonoOficina()."',";
            $sql .= "telefono_particular = "."'".$obj->getTelefonoParticular()."',";
            $sql .= "telefono_celular = "."'".$obj->getTelefonoCelular()."',";
            $sql .= "correo_electronico_personal = "."'".$obj->getCorreoElectronicoPersonal()."'";
            $sql .= "where cv_centro = '".$obj->getCveCentro()."'";
            
            // echo $sql;//exit;

            $this->set_sql($sql);
            // $this->db_conn->set_charset("utf8");
            
            mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            
            if(mysqli_affected_rows($this->db_conn) == 1)
            {
                $actualizado = 1;
            }
            else
            {
                $actualizado = 0;
            }
            unset($obj);
            return $actualizado;
        }

        //Metodo para actualizar los datos del director cuando el usuario cambia la curp
        function updateDiretorCompleto($obj)
        {
            // echo '<pre>';
            // echo print_r($obj);
            // echo '</pre>';
            // exit;

            // $cct=$this->db_conn->real_escape_string($cct);

            $sql = "update director set ";
            $sql .= "cve_tipo_director = "."'".$obj->getCveTipoDirector()."',";
            $sql .= "cve_pais = "."'".$obj->getCvePais()."',";
            $sql .= "cve_estado = "."'".$obj->getCveEstado()."',";
            $sql .= "rfc = "."'".$obj->getRfc()."',";
            $sql .= "curp = "."'".$obj->getCurp()."',";
            $sql .= "nombre = "."'".$obj->getNombre()."',";
            $sql .= "apellido_paterno = "."'".$obj->getApellidoPaterno()."',";
            $sql .= "apellido_materno = "."'".$obj->getApellidoMaterno()."',";
            $sql .= "fecha_nacimiento = "."'".$obj->getFechaNacimiento()."',";
            $slq .= "lugar_nacimiento = "."'".$obj->getLugarNacimiento()."',";
            $sql .= "sexo = "."'".$obj->getSexo()."',";
            $sql .= "telefono_oficina = "."'".$obj->getTelefonoOficina()."',";
            $sql .= "telefono_particular = "."'".$obj->getTelefonoParticular()."',";
            $sql .= "telefono_celular = "."'".$obj->getTelefonoCelular()."',";
            $sql .= "correo_electronico_personal = "."'".$obj->getCorreoElectronicoPersonal()."',";
            $sql .= "cve_usuario = "."'".$obj->getCveUsuario()."',";
            $sql .= "fecha_actualizacion = "."'".$obj->getFechaActualizacion()."',";
            $sql .= "tipo_actualizacion = "."'".$obj->getTipoActualizacion()."'";
            $sql .= "where cv_centro = '".$obj->getCveCentro()."'";
            
            // echo $sql;//exit;

            $this->set_sql($sql);
            // $this->db_conn->set_charset("utf8");
            
            mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            
            if(mysqli_affected_rows($this->db_conn) == 1)
            {
                $actualizado = 1;
            }
            else
            {
                $actualizado = 0;
            }
            unset($obj);
            return $actualizado;
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