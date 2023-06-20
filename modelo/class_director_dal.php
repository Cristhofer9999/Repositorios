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
            // $cct=$this->db_conn->real_escape_string($cct);
            $getCveTipoDirector=$this->db_conn->real_escape_string($obj->getCveTipoDirector());
            $getTelefonoOficina=$this->db_conn->real_escape_string($obj->getTelefonoOficina());
            $getTelefonoParticular=$this->db_conn->real_escape_string($obj->getTelefonoParticular());
            $getTelefonoCelular=$this->db_conn->real_escape_string($obj->getTelefonoCelular());
            $getCorreoElectronicoPersonal=$this->db_conn->real_escape_string($obj->getCorreoElectronicoPersonal());
            $getCorreoElectronicoInstitucional=$this->db_conn->real_escape_string($obj->getCorreoElectronicoInstitucional());
            $getCveCentro=$this->db_conn->real_escape_string($obj->getCveCentro());

            $sql = "update director set ";
            $sql .= "cve_tipo_director = "."'".$getCveTipoDirector."', ";
            $sql .= "telefono_oficina = "."'".$getTelefonoOficina."', ";
            $sql .= "telefono_particular = "."'".$getTelefonoParticular."', ";
            $sql .= "telefono_celular = "."'".$getTelefonoCelular."', ";
            $sql .= "correo_electronico_personal = "."'".$getCorreoElectronicoPersonal."', ";
            $sql .= "correo_electronico_institucional = "."'".$getCorreoElectronicoInstitucional."'";
            $sql .= " where cve_centro = '".$getCveCentro."'";
            
            // echo '<br>'.$sql;exit;

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
            $getCveTipoDirector=$this->db_conn->real_escape_string($obj->getCveTipoDirector());
            $getCvePais=$this->db_conn->real_escape_string($obj->getCvePais());
            $getCveEstado=$this->db_conn->real_escape_string($obj->getCveEstado());
            $getRfc=$this->db_conn->real_escape_string($obj->getRfc());
            $getCurp=$this->db_conn->real_escape_string($obj->getCurp());
            $getNombre=$this->db_conn->real_escape_string($obj->getNombre());
            $getApellidoPaterno=$this->db_conn->real_escape_string($obj->getApellidoPaterno());
            $getApellidoMaterno=$this->db_conn->real_escape_string($obj->getApellidoMaterno());
            $getFechaNacimiento=$this->db_conn->real_escape_string($obj->getFechaNacimiento());
            $getLugarNacimiento=$this->db_conn->real_escape_string($obj->getLugarNacimiento());
            $getSexo=$this->db_conn->real_escape_string($obj->getSexo());
            $getTelefonoOficina=$this->db_conn->real_escape_string($obj->getTelefonoOficina());
            $getTelefonoParticular=$this->db_conn->real_escape_string($obj->getTelefonoParticular());
            $getTelefonoCelular=$this->db_conn->real_escape_string($obj->getTelefonoCelular());
            $getCorreoElectronicoPersonal=$this->db_conn->real_escape_string($obj->getCorreoElectronicoPersonal());
            $getCorreoElectronicoInstitucional=$this->db_conn->real_escape_string($obj->getCorreoElectronicoInstitucional());
            $getCveUsuario=$this->db_conn->real_escape_string($obj->getCveUsuario());
            $getFechaActualizacion=$this->db_conn->real_escape_string($obj->getFechaActualizacion());
            $getTipoActualizacion=$this->db_conn->real_escape_string($obj->getTipoActualizacion());
            $getCveCentro=$this->db_conn->real_escape_string($obj->getCveCentro());

            $sql = "update director set ";
            $sql .= "cve_tipo_director = "."'".$getCveTipoDirector."', ";
            $sql .= "cve_pais = "."'".$getCvePais."', ";
            $sql .= "cve_estado = "."'".$getCveEstado."', ";
            $sql .= "rfc = "."'".$getRfc."', ";
            $sql .= "curp = "."'".$getCurp."', ";
            $sql .= "nombre = "."'".$getNombre."', ";
            $sql .= "apellido_paterno = "."'".$getApellidoPaterno."', ";
            $sql .= "apellido_materno = "."'".$getApellidoMaterno."', ";
            $sql .= "fecha_nacimiento = "."'".$getFechaNacimiento."', ";
            $sql .= "lugar_nacimiento = "."'".$getLugarNacimiento."', ";
            $sql .= "sexo = "."'".$getSexo."', ";
            $sql .= "telefono_oficina = "."'".$getTelefonoOficina."', ";
            $sql .= "telefono_particular = "."'".$getTelefonoParticular."', ";
            $sql .= "telefono_celular = "."'".$getTelefonoCelular."', ";
            $sql .= "correo_electronico_personal = "."'".$getCorreoElectronicoPersonal."', ";
            $sql .= "correo_electronico_institucional = "."'".$getCorreoElectronicoInstitucional."', ";
            $sql .= "cve_usuario = "."'".$getCveUsuario."', ";
            $sql .= "fecha_actualizacion = "."'".$getFechaActualizacion."', ";
            $sql .= "tipo_actualizacion = "."'".$getTipoActualizacion."'";
            $sql .= " where cve_centro = '".$getCveCentro."'";
            
            // echo '<br>'.$sql;exit;

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
   

            
   
   
    }
?>