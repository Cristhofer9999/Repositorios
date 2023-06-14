<?php
if(class_exists('director')!=true)
{
    class director{
        protected $cve_centro;
        protected $cve_tipo_director;
        protected $cve_pais;
        protected $cve_estado;
        protected $rfc;
        protected $curp;
        protected $nombre;
        protected $apellido_paterno;
        protected $apellido_materno;
        protected $fecha_nacimiento;
        protected $lugar_nacimiento;
        protected $sexo;
        protected $telefono_oficina;
        protected $telefono_particular;
        protected $telefono_celular;
        protected $correo_electronico_institucional;
        protected $correo_electronico_personal;
        protected $domicilio;
        protected $colonia;
        protected $codigo_postal;
        protected $cve_usuario;
        protected $fecha_actualizacion;
        protected $tipo_actualizacion;

                //Constructor
                public function __construct
                (
            $cve_centro=NULL,
            $cve_tipo_director=NULL,
            $cve_pais=NULL,
            $cve_estado=NULL,
            $rfc=NULL,
            $curp=NULL,
            $nombre=NULL,
            $apellido_paterno=NULL,
            $apellido_materno=NULL,
            $fecha_nacimiento=NULL,
            $lugar_nacimiento=NULL,
            $sexo=NULL,
            $telefono_oficina=NULL,
            $telefono_particular=NULL,
            $telefono_celular=NULL,
            $correo_electronico_institucional=NULL,
            $correo_electronico_personal=NULL,
            $domicilio=NULL,
            $colonia=NULL,
            $codigo_postal=NULL,
            $cve_usuario=NULL,
            $fecha_actualizacion=NULL,
            $tipo_actualizacion=NULL
                )

                {
            $this->cve_centro=$cve_centro;
            $this->cve_tipo_director=$cve_tipo_director;
            $this->cve_pais=$cve_pais;
            $this->cve_estado=$cve_estado;
            $this->rfc=$rfc;
            $this->curp=$curp;
            $this->nombre=$nombre;
            $this->apellido_paterno=$apellido_paterno;
            $this->apellido_materno=$apellido_materno;
            $this->fecha_nacimiento=$fecha_nacimiento;
            $this->lugar_nacimiento=$lugar_nacimiento;
            $this->sexo=$sexo;
            $this->telefono_oficina=$telefono_oficina;
            $this->telefono_particular=$telefono_particular;
            $this->telefono_celular=$telefono_celular;
            $this->correo_electronico_institucional=$correo_electronico_institucional;
            $this->correo_electronico_personal=$correo_electronico_personal;
            $this->domicilio=$domicilio;
            $this->colonia=$colonia;
            $this->codigo_postal=$codigo_postal;
            $this->cve_usuario=$cve_usuario;
            $this->fecha_actualizacion=$fecha_actualizacion;
            $this->tipo_actualizacion=$tipo_actualizacion;
                
        }//End Constructor

          /**
         * Get the value of cve_centro
         */
        public function getCveCentro()
        {
                return $this->cve_centro;
        }

        /**
         * Set the value of cve_centro
         */
        public function setCveCentro($cve_centro)
        {
                $this->cve_centro = $cve_centro;

                return $this;
        }

          /**
         * Get the value of cve_tipo_director
         */
        public function getCveTipoDirector()
        {
                return $this->cve_tipo_director;
        }

        /**
         * Set the value of cve_tipo_director
         */
        public function setCveTipoDirector($cve_tipo_director)
        {
                $this->cve_tipo_director = $cve_tipo_director;

                return $this;
        }

        /**
         * Get the value of cve_pais
         */
        public function getCvePais()
        {
                return $this->cve_pais;
        }

        /**
         * Set the value of cve_pais
         */
        public function setCvePais($cve_pais)
        {
                $this->cve_pais = $cve_pais;

                return $this;
        }

        /**
         * Get the value of cve_estado
         */
        public function getCveEstado()
        {
                return $this->cve_estado;
        }

        /**
         * Set the value of cve_pais
         */
        public function setCveEstado($cve_estado)
        {
                $this->cve_estado = $cve_estado;

                return $this;
        }

        /**
         * Get the value of rfc
         */
        public function getRfc()
        {
                return $this->rfc;
        }

        /**
         * Set the value of rfc
         */
        public function setRfc($rfc)
        {
                $this->rfc = $rfc;

                return $this;
        }

        /**
         * Get the value of curp
         */
        public function getCurp()
        {
                return $this->curp;
        }

        /**
         * Set the value of curp
         */
        public function setCurp($curp)
        {
                $this->curp = $curp;

                return $this;
        }

        /**
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido_paterno
         */
        public function getApellidoPaterno()
        {
                return $this->apellido_paterno;
        }

        /**
         * Set the value of apellido_paterno
         */
        public function setApellidoPaterno($apellido_paterno)
        {
                $this->apellido_paterno = $apellido_paterno;

                return $this;
        }

        /**
         * Get the value of apellido_materno
         */
        public function getApellidoMaterno()
        {
                return $this->apellido_materno;
        }

        /**
         * Set the value of apellido_materno
         */
        public function setApellidoMaterno($apellido_materno)
        {
                $this->apellido_materno = $apellido_materno;

                return $this;
        }

        /**
         * Get the value of fecha_nacimiento
         */
        public function getFechaNacimiento()
        {
                return $this->fecha_nacimiento;
        }

        /**
         * Set the value of fecha_nacimiento
         */
        public function setFechaNacimiento($fecha_nacimiento)
        {
                $this->fecha_nacimiento = $fecha_nacimiento;

                return $this;
        }

         /**
         * Get the value of lugar_nacimiento
         */
        public function getLugarNacimiento()
        {
                return $this->lugar_nacimiento;
        }

        /**
         * Set the value of lugar_nacimiento
         */
        public function setLugarNacimiento($lugar_nacimiento)
        {
                $this->lugar_nacimiento = $lugar_nacimiento;

                return $this;
        }

         /**
         * Get the value of sexo
         */
        public function getSexo()
        {
                return $this->sexo;
        }

        /**
         * Set the value of sexo
         */
        public function setSexo($sexo)
        {
                $this->sexo = $sexo;

                return $this;
        }

         /**
         * Get the value of telefono_oficina
         */
        public function getTelefonoOficina()
        {
                return $this->telefono_oficina;
        }

        /**
         * Set the value of telefono_oficina
         */
        public function setTelefonoOficina($telefono_oficina)
        {
                $this->telefono_oficina = $telefono_oficina;

                return $this;
        }

        /**
         * Get the value of telefono_particular
         */
        public function getTelefonoParticular()
        {
                return $this->telefono_particular;
        }

        /**
         * Set the value of telefono_particular
         */
        public function setTelefonoParticular($telefono_particular)
        {
                $this->telefono_particular = $telefono_particular;

                return $this;
        }

        /**
         * Get the value of telefono_celular
         */
        public function getTelefonoCelular()
        {
                return $this->telefono_celular;
        }

        /**
         * Set the value of telefono_celular
         */
        public function setTelefonoCelular($telefono_celular)
        {
                $this->telefono_celular = $telefono_celular;

                return $this;
        }

        /**
         * Get the value of correo_electronico_institucional
         */
        public function getCorreoElectronicoInstitucional()
        {
                return $this->correo_electronico_institucional;
        }

        /**
         * Set the value of correo_electronico_institucional
         */
        public function setCorreoElectronicoInstitucional($correo_electronico_institucional)
        {
                $this->correo_electronico_institucional = $correo_electronico_institucional;

                return $this;
        }

        /**
         * Get the value of correo_electronico_personal
         */
        public function getCorreoElectronicoPersonal()
        {
                return $this->correo_electronico_personal;
        }

        /**
         * Set the value of correo_electronico_personal
         */
        public function setCorreoElectronicoPersonal($correo_electronico_personal)
        {
                $this->correo_electronico_personal = $correo_electronico_personal;

                return $this;
        }

        /**
         * Get the value of domicilio
         */
        public function getDomicilio()
        {
                return $this->domicilio;
        }

        /**
         * Set the value of domicilio
         */
        public function setDomicilio($domicilio)
        {
                $this->domicilio = $domicilio;

                return $this;
        }

        /**
         * Get the value of colonia
         */
        public function getColonia()
        {
                return $this->colonia;
        }

        /**
         * Set the value of colonia
         */
        public function setColonia($colonia)
        {
                $this->colonia = $colonia;

                return $this;
        }

        /**
         * Get the value of codigo_postal
         */
        public function getCodigoPostal()
        {
                return $this->codigo_postal;
        }

        /**
         * Set the value of codigo_postal
         */
        public function setCodigoPostal($codigo_postal)
        {
                $this->codigo_postal = $codigo_postal;

                return $this;
        }

        /**
         * Get the value of cve_usuario
         */
        public function getCveUsuario()
        {
                return $this->cve_usuario;
        }

        /**
         * Set the value of cve_usuario
         */
        public function setCveUsuario($cve_usuario)
        {
                $this->cve_usuario = $cve_usuario;

                return $this;
        }

        /**
         * Get the value of fecha_actualizacion
         */
        public function getFechaActualizacion()
        {
                return $this->fecha_actualizacion;
        }

        /**
         * Set the value of fecha_actualizacion
         */
        public function setFechaActualizacion($fecha_actualizacion)
        {
                $this->fecha_actualizacion = $fecha_actualizacion;

                return $this;
        }

        /**
         * Get the value of tipo_actualizacion
         */
        public function getTipoActualizacion()
        {
                return $this->tipo_actualizacion;
        }

        /**
         * Set the value of tipo_actualizacion
         */
        public function setTipoActualizacion($tipo_actualizacion)
        {
                $this->tipo_actualizacion = $tipo_actualizacion;

                return $this;
        }
   }//end class
}//avoid redefine class
?>