<?php
if(class_exists('centro_educativo')!=true)
{
    class centro_educativo{
        protected $cve_centro;
        protected $cve_tipo_centro;
        protected $cve_motivo;
        protected $cve_motivo_dos;
        protected $cve_servicio;
        protected $cve_dependencia_administrativa;
        protected $cve_sostenimiento;
        protected $cve_dependencia_normativa;
        protected $cve_migracion_servicio;
        protected $cve_tipo_biblioteca;
        protected $cve_tipo_supervision;
        protected $cve_caracterizan1;
        protected $cve_caracterizan2;
        protected $cve_estatus;
        protected $cve_tipo_educacion;
        protected $cve_nivel_educativo;
        protected $cve_subnivel_educativo;
        protected $cve_turno;
        protected $cve_tipo_modalidad;
        protected $nombre_centro;
        protected $nombre_conocido;
        protected $zona_escolar;
        protected $sector;
        protected $cve_institucional;
        protected $folio_cct_nm;
        protected $fecha_fundacion;
        protected $fecha_alta;
        protected $fecha_baja;
        protected $fecha_clausura;
        protected $fecha_reapertura;
        protected $fecha_cambio;
        protected $fecha_solicitud;
        protected $fecha_actualizacion;
        protected $calendario;
        protected $area_solicitante;
        protected $puesto_solicitante;
        protected $nombre_solicitante;
        protected $nombre_planeacion;
        protected $nombre_programacion;
        protected $cve_usuario;
        protected $descripcion;
        protected $web_service;
        protected $cct_distribucion;
        protected $latitud;
        protected $longitud;
        protected $cct_sub_distribucion;


		//Constructor
		public function __construct
		(
            $cve_centro=NULL,
            $cve_tipo_centro=NULL,
            $cve_motivo=NULL,
            $cve_motivo_dos=NULL,
            $cve_servicio=NULL,
            $cve_dependencia_administrativa=NULL,
            $cve_sostenimiento=NULL,
            $cve_dependencia_normativa=NULL,
            $cve_migracion_servicio=NULL,
            $cve_tipo_biblioteca=NULL,
            $cve_tipo_supervision=NULL,
            $cve_caracterizan1=NULL,
            $cve_caracterizan2=NULL,
            $cve_estatus=NULL,
            $cve_tipo_educacion=NULL,
            $cve_nivel_educativo=NULL,
            $cve_subnivel_educativo=NULL,
            $cve_turno=NULL,
            $cve_tipo_modalidad=NULL,
            $nombre_centro=NULL,
            $nombre_conocido=NULL,
            $zona_escolar=NULL,
            $sector=NULL,
            $cve_institucional=NULL,
            $folio_cct_nm=NULL,
            $fecha_fundacion=NULL,
            $fecha_alta=NULL,
            $fecha_baja=NULL,
            $fecha_clausura=NULL,
            $fecha_reapertura=NULL,
            $fecha_cambio=NULL,
            $fecha_solicitud=NULL,
            $fecha_actualizacion=NULL,
            $calendario=NULL,
            $area_solicitante=NULL,
            $puesto_solicitante=NULL,
            $nombre_solicitante=NULL,
            $nombre_planeacion=NULL,
            $nombre_programacion=NULL,
            $cve_usuario=NULL,
            $descripcion=NULL,
            $web_service=NULL,
            $cct_distribucion=NULL,
            $latitud=NULL,
            $longitud=NULL,
            $cct_sub_distribucion=NULL
		)

		{
            $this->cve_centro=$cve_centro;
            $this->cve_tipo_centro=$cve_tipo_centro;
            $this->cve_motivo=$cve_motivo;
            $this->cve_motivo_dos=$cve_motivo_dos;
            $this->cve_servicio=$cve_servicio;
            $this->cve_dependencia_administrativa=$cve_dependencia_administrativa;
            $this->cve_sostenimiento=$cve_sostenimiento;
            $this->cve_dependencia_normativa=$cve_dependencia_normativa;
            $this->cve_migracion_servicio=$cve_migracion_servicio;
            $this->cve_tipo_biblioteca=$cve_tipo_biblioteca;
            $this->cve_tipo_supervision=$cve_tipo_supervision;
            $this->cve_caracterizan1=$cve_caracterizan1;
            $this->cve_caracterizan2=$cve_caracterizan2;
            $this->cve_estatus=$cve_estatus;
            $this->cve_tipo_educacion=$cve_tipo_educacion;
            $this->cve_nivel_educativo=$cve_nivel_educativo;
            $this->cve_subnivel_educativo=$cve_subnivel_educativo;
            $this->cve_turno=$cve_turno;
            $this->cve_tipo_modalidad=$cve_tipo_modalidad;
            $this->nombre_centro=$nombre_centro;
            $this->nombre_conocido=$nombre_conocido;
            $this->zona_escolar=$zona_escolar;
            $this->sector=$sector;
            $this->cve_institucional=$cve_institucional;
            $this->folio_cct_nm=$folio_cct_nm;
            $this->fecha_fundacion=$fecha_fundacion;
            $this->fecha_alta=$fecha_alta;
            $this->fecha_baja=$fecha_baja;
            $this->fecha_clausura=$fecha_clausura;
            $this->fecha_reapertura=$fecha_reapertura;
            $this->fecha_cambio=$fecha_cambio;
            $this->fecha_solicitud=$fecha_solicitud;
            $this->fecha_actualizacion=$fecha_actualizacion;
            $this->calendario=$calendario;
            $this->area_solicitante=$area_solicitante;
            $this->puesto_solicitante=$puesto_solicitante;
            $this->nombre_solicitante=$nombre_solicitante;
            $this->nombre_planeacion=$nombre_planeacion;
            $this->nombre_programacion=$nombre_programacion;
            $this->cve_usuario=$cve_usuario;
            $this->descripcion=$descripcion;
            $this->web_service=$web_service;
            $this->cct_distribucion=$cct_distribucion;
            $this->latitud=$latitud;
            $this->longitud=$longitud;
            $this->cct_sub_distribucion=$cct_sub_distribucion;		
        } //end constructor
        
        
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
         * Get the value of cve_tipo_centro
         */
        public function getCveTipoCentro()
        {
                return $this->cve_tipo_centro;
        }

        /**
         * Set the value of cve_tipo_centro
         */
        public function setCveTipoCentro($cve_tipo_centro)
        {
                $this->cve_tipo_centro = $cve_tipo_centro;

                return $this;
        }

        /**
         * Get the value of cve_motivo
         */
        public function getCveMotivo()
        {
                return $this->cve_motivo;
        }

        /**
         * Set the value of cve_motivo
         */
        public function setCveMotivo($cve_motivo)
        {
                $this->cve_motivo = $cve_motivo;

                return $this;
        }

        /**
         * Get the value of cve_motivo_dos
         */
        public function getCveMotivoDos()
        {
                return $this->cve_motivo_dos;
        }

        /**
         * Set the value of cve_motivo_dos
         */
        public function setCveMotivoDos($cve_motivo_dos)
        {
                $this->cve_motivo_dos = $cve_motivo_dos;

                return $this;
        }

        /**
         * Get the value of cve_servicio
         */
        public function getCveServicio()
        {
                return $this->cve_servicio;
        }

        /**
         * Set the value of cve_servicio
         */
        public function setCveServicio($cve_servicio)
        {
                $this->cve_servicio = $cve_servicio;

                return $this;
        }

        /**
         * Get the value of cve_dependencia_administrativa
         */
        public function getCveDependenciaAdministrativa()
        {
                return $this->cve_dependencia_administrativa;
        }

        /**
         * Set the value of cve_dependencia_administrativa
         */
        public function setCveDependenciaAdministrativa($cve_dependencia_administrativa)
        {
                $this->cve_dependencia_administrativa = $cve_dependencia_administrativa;

                return $this;
        }

        /**
         * Get the value of cve_sostenimiento
         */
        public function getCveSostenimiento()
        {
                return $this->cve_sostenimiento;
        }

        /**
         * Set the value of cve_sostenimiento
         */
        public function setCveSostenimiento($cve_sostenimiento)
        {
                $this->cve_sostenimiento = $cve_sostenimiento;

                return $this;
        }

        /**
         * Get the value of cve_dependencia_normativa
         */
        public function getCveDependenciaNormativa()
        {
                return $this->cve_dependencia_normativa;
        }

        /**
         * Set the value of cve_dependencia_normativa
         */
        public function setCveDependenciaNormativa($cve_dependencia_normativa)
        {
                $this->cve_dependencia_normativa = $cve_dependencia_normativa;

                return $this;
        }

        /**
         * Get the value of cve_migracion_servicio
         */
        public function getCveMigracionServicio()
        {
                return $this->cve_migracion_servicio;
        }

        /**
         * Set the value of cve_migracion_servicio
         */
        public function setCveMigracionServicio($cve_migracion_servicio)
        {
                $this->cve_migracion_servicio = $cve_migracion_servicio;

                return $this;
        }

        /**
         * Get the value of cve_tipo_biblioteca
         */
        public function getCveTipoBiblioteca()
        {
                return $this->cve_tipo_biblioteca;
        }

        /**
         * Set the value of cve_tipo_biblioteca
         */
        public function setCveTipoBiblioteca($cve_tipo_biblioteca)
        {
                $this->cve_tipo_biblioteca = $cve_tipo_biblioteca;

                return $this;
        }

        /**
         * Get the value of cve_tipo_supervision
         */
        public function getCveTipoSupervision()
        {
                return $this->cve_tipo_supervision;
        }

        /**
         * Set the value of cve_tipo_supervision
         */
        public function setCveTipoSupervision($cve_tipo_supervision)
        {
                $this->cve_tipo_supervision = $cve_tipo_supervision;

                return $this;
        }

        /**
         * Get the value of cve_caracterizan1
         */
        public function getCveCaracterizan1()
        {
                return $this->cve_caracterizan1;
        }

        /**
         * Set the value of cve_caracterizan1
         */
        public function setCveCaracterizan1($cve_caracterizan1)
        {
                $this->cve_caracterizan1 = $cve_caracterizan1;

                return $this;
        }

        /**
         * Get the value of cve_caracterizan2
         */
        public function getCveCaracterizan2()
        {
                return $this->cve_caracterizan2;
        }

        /**
         * Set the value of cve_caracterizan2
         */
        public function setCveCaracterizan2($cve_caracterizan2)
        {
                $this->cve_caracterizan2 = $cve_caracterizan2;

                return $this;
        }

        /**
         * Get the value of cve_estatus
         */
        public function getCveEstatus()
        {
                return $this->cve_estatus;
        }

        /**
         * Set the value of cve_estatus
         */
        public function setCveEstatus($cve_estatus)
        {
                $this->cve_estatus = $cve_estatus;

                return $this;
        }

        /**
         * Get the value of cve_tipo_educacion
         */
        public function getCveTipoEducacion()
        {
                return $this->cve_tipo_educacion;
        }

        /**
         * Set the value of cve_tipo_educacion
         */
        public function setCveTipoEducacion($cve_tipo_educacion)
        {
                $this->cve_tipo_educacion = $cve_tipo_educacion;

                return $this;
        }

        /**
         * Get the value of cve_nivel_educativo
         */
        public function getCveNivelEducativo()
        {
                return $this->cve_nivel_educativo;
        }

        /**
         * Set the value of cve_nivel_educativo
         */
        public function setCveNivelEducativo($cve_nivel_educativo)
        {
                $this->cve_nivel_educativo = $cve_nivel_educativo;

                return $this;
        }

        /**
         * Get the value of cve_subnivel_educativo
         */
        public function getCveSubnivelEducativo()
        {
                return $this->cve_subnivel_educativo;
        }

        /**
         * Set the value of cve_subnivel_educativo
         */
        public function setCveSubnivelEducativo($cve_subnivel_educativo)
        {
                $this->cve_subnivel_educativo = $cve_subnivel_educativo;

                return $this;
        }

        /**
         * Get the value of cve_turno
         */
        public function getCveTurno()
        {
                return $this->cve_turno;
        }

        /**
         * Set the value of cve_turno
         */
        public function setCveTurno($cve_turno)
        {
                $this->cve_turno = $cve_turno;

                return $this;
        }

        /**
         * Get the value of cve_tipo_modalidad
         */
        public function getCveTipoModalidad()
        {
                return $this->cve_tipo_modalidad;
        }

        /**
         * Set the value of cve_tipo_modalidad
         */
        public function setCveTipoModalidad($cve_tipo_modalidad)
        {
                $this->cve_tipo_modalidad = $cve_tipo_modalidad;

                return $this;
        }

        /**
         * Get the value of nombre_centro
         */
        public function getNombreCentro()
        {
                return $this->nombre_centro;
        }

        /**
         * Set the value of nombre_centro
         */
        public function setNombreCentro($nombre_centro)
        {
                $this->nombre_centro = $nombre_centro;

                return $this;
        }

        /**
         * Get the value of nombre_conocido
         */
        public function getNombreConocido()
        {
                return $this->nombre_conocido;
        }

        /**
         * Set the value of nombre_conocido
         */
        public function setNombreConocido($nombre_conocido)
        {
                $this->nombre_conocido = $nombre_conocido;

                return $this;
        }

        /**
         * Get the value of zona_escolar
         */
        public function getZonaEscolar()
        {
                return $this->zona_escolar;
        }

        /**
         * Set the value of zona_escolar
         */
        public function setZonaEscolar($zona_escolar)
        {
                $this->zona_escolar = $zona_escolar;

                return $this;
        }

        /**
         * Get the value of sector
         */
        public function getSector()
        {
                return $this->sector;
        }

        /**
         * Set the value of sector
         */
        public function setSector($sector)
        {
                $this->sector = $sector;

                return $this;
        }

        /**
         * Get the value of cve_institucional
         */
        public function getCveInstitucional()
        {
                return $this->cve_institucional;
        }

        /**
         * Set the value of cve_institucional
         */
        public function setCveInstitucional($cve_institucional)
        {
                $this->cve_institucional = $cve_institucional;

                return $this;
        }

        /**
         * Get the value of folio_cct_nm
         */
        public function getFolioCctNm()
        {
                return $this->folio_cct_nm;
        }

        /**
         * Set the value of folio_cct_nm
         */
        public function setFolioCctNm($folio_cct_nm)
        {
                $this->folio_cct_nm = $folio_cct_nm;

                return $this;
        }

        /**
         * Get the value of fecha_fundacion
         */
        public function getFechaFundacion()
        {
                return $this->fecha_fundacion;
        }

        /**
         * Set the value of fecha_fundacion
         */
        public function setFechaFundacion($fecha_fundacion)
        {
                $this->fecha_fundacion = $fecha_fundacion;

                return $this;
        }

        /**
         * Get the value of fecha_alta
         */
        public function getFechaAlta()
        {
                return $this->fecha_alta;
        }

        /**
         * Set the value of fecha_alta
         */
        public function setFechaAlta($fecha_alta)
        {
                $this->fecha_alta = $fecha_alta;

                return $this;
        }

        /**
         * Get the value of fecha_baja
         */
        public function getFechaBaja()
        {
                return $this->fecha_baja;
        }

        /**
         * Set the value of fecha_baja
         */
        public function setFechaBaja($fecha_baja)
        {
                $this->fecha_baja = $fecha_baja;

                return $this;
        }

        /**
         * Get the value of fecha_clausura
         */
        public function getFechaClausura()
        {
                return $this->fecha_clausura;
        }

        /**
         * Set the value of fecha_clausura
         */
        public function setFechaClausura($fecha_clausura)
        {
                $this->fecha_clausura = $fecha_clausura;

                return $this;
        }

        /**
         * Get the value of fecha_reapertura
         */
        public function getFechaReapertura()
        {
                return $this->fecha_reapertura;
        }

        /**
         * Set the value of fecha_reapertura
         */
        public function setFechaReapertura($fecha_reapertura)
        {
                $this->fecha_reapertura = $fecha_reapertura;

                return $this;
        }

        /**
         * Get the value of fecha_cambio
         */
        public function getFechaCambio()
        {
                return $this->fecha_cambio;
        }

        /**
         * Set the value of fecha_cambio
         */
        public function setFechaCambio($fecha_cambio)
        {
                $this->fecha_cambio = $fecha_cambio;

                return $this;
        }

        /**
         * Get the value of fecha_solicitud
         */
        public function getFechaSolicitud()
        {
                return $this->fecha_solicitud;
        }

        /**
         * Set the value of fecha_solicitud
         */
        public function setFechaSolicitud($fecha_solicitud)
        {
                $this->fecha_solicitud = $fecha_solicitud;

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
         * Get the value of calendario
         */
        public function getCalendario()
        {
                return $this->calendario;
        }

        /**
         * Set the value of calendario
         */
        public function setCalendario($calendario)
        {
                $this->calendario = $calendario;

                return $this;
        }

        /**
         * Get the value of area_solicitante
         */
        public function getAreaSolicitante()
        {
                return $this->area_solicitante;
        }

        /**
         * Set the value of area_solicitante
         */
        public function setAreaSolicitante($area_solicitante)
        {
                $this->area_solicitante = $area_solicitante;

                return $this;
        }

        /**
         * Get the value of puesto_solicitante
         */
        public function getPuestoSolicitante()
        {
                return $this->puesto_solicitante;
        }

        /**
         * Set the value of puesto_solicitante
         */
        public function setPuestoSolicitante($puesto_solicitante)
        {
                $this->puesto_solicitante = $puesto_solicitante;

                return $this;
        }

        /**
         * Get the value of nombre_solicitante
         */
        public function getNombreSolicitante()
        {
                return $this->nombre_solicitante;
        }

        /**
         * Set the value of nombre_solicitante
         */
        public function setNombreSolicitante($nombre_solicitante)
        {
                $this->nombre_solicitante = $nombre_solicitante;

                return $this;
        }

        /**
         * Get the value of nombre_planeacion
         */
        public function getNombrePlaneacion()
        {
                return $this->nombre_planeacion;
        }

        /**
         * Set the value of nombre_planeacion
         */
        public function setNombrePlaneacion($nombre_planeacion)
        {
                $this->nombre_planeacion = $nombre_planeacion;

                return $this;
        }

        /**
         * Get the value of nombre_programacion
         */
        public function getNombreProgramacion()
        {
                return $this->nombre_programacion;
        }

        /**
         * Set the value of nombre_programacion
         */
        public function setNombreProgramacion($nombre_programacion)
        {
                $this->nombre_programacion = $nombre_programacion;

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
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         */
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of web_service
         */
        public function getWebService()
        {
                return $this->web_service;
        }

        /**
         * Set the value of web_service
         */
        public function setWebService($web_service)
        {
                $this->web_service = $web_service;

                return $this;
        }

        /**
         * Get the value of cct_distribucion
         */
        public function getCctDistribucion()
        {
                return $this->cct_distribucion;
        }

        /**
         * Set the value of cct_distribucion
         */
        public function setCctDistribucion($cct_distribucion)
        {
                $this->cct_distribucion = $cct_distribucion;

                return $this;
        }

        /**
         * Get the value of latitud
         */
        public function getLatitud()
        {
                return $this->latitud;
        }

        /**
         * Set the value of latitud
         */
        public function setLatitud($latitud)
        {
                $this->latitud = $latitud;

                return $this;
        }

        /**
         * Get the value of longitud
         */
        public function getLongitud()
        {
                return $this->longitud;
        }

        /**
         * Set the value of longitud
         */
        public function setLongitud($longitud)
        {
                $this->longitud = $longitud;

                return $this;
        }

        /**
         * Get the value of cct_sub_distribucion
         */
        public function getCctSubDistribucion()
        {
                return $this->cct_sub_distribucion;
        }

        /**
         * Set the value of cct_sub_distribucion
         */
        public function setCctSubDistribucion($cct_sub_distribucion)
        {
                $this->cct_sub_distribucion = $cct_sub_distribucion;

                return $this;
        }

    }//end class
}//avoid redefine class
?>