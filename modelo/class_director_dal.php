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
        function updateDirectorFacil($cct, $cve_tipo_director, $telefono_oficina, $telefono_particular, $telefono_celular, $correo_electronico_personal)
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
            
            if($rs)
            {
                return true;
            }
            else
            {
                return false;
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