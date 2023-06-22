<?php
/**
* Clase Centro Educativo
* Creado por Ing. Alfredo Sanchez
* Fecha de creacion: 17/11/2015
*/
class centro_educativo{
  protected $cve_centro;
  protected $cve_tipo_centro;
  protected $cve_motivo;
  protected $cve_motivo_dos;
  protected $cve_turno;
  protected $cve_servicio;
  protected $cve_sostenimiento;
  protected $cve_dependencia_normativa;
  protected $cve_dependencia_administrativa;
  protected $cve_tipo_educacion;
  protected $cve_nivel_educativo;
  protected $cve_subnivel_educativo;
  protected $cve_migracion_servicio;
  protected $cve_tipo_biblioteca;
  protected $cve_tipo_supervision;
  protected $nombre_centro;
  protected $nombre_conocido;
  protected $cve_estatus;
  protected $zona_escolar;
  protected $sector;
  protected $cve_inmueble;
  protected $cve_institucional;
  protected $cve_pagaduria;
  protected $cve_tipo_modalidad;
  protected $folio_cct_nm;
  protected $fecha_fundacion;
  protected $fecha_alta;
  protected $fecha_baja;
  protected $fecha_clausura;
  protected $fecha_reapertura;
  protected $fecha_cambio;
  protected $fecha_solicitud;
  protected $fecha_actualizacion;
  protected $area_solicitante;
  protected $puesto_solicitante;
  protected $nombre_solicitante;
  protected $nombre_planeacion;
  protected $nombre_programacion;
  protected $cve_usuario;
  protected $descripcion;
  protected $web_service;
  protected $cve_caracterizan1;
  protected $cve_caracterizan2;
  protected $calendario;

  protected $curp_al;
  public function setcurp_al($curp_al) {$this->curp_al=$curp_al;}
  public function getcurp_al() {return $this->curp_al;}

  
  public function setCve_centro($cve_centro) {$this->cve_centro=$cve_centro;}
  public function getCve_centro() {return $this->cve_centro;}

  public function setCve_tipo_centro($cve_tipo_centro) {$this->cve_tipo_centro=$cve_tipo_centro;}
  public function getCve_tipo_centro() {return $this->cve_tipo_centro;}

  public function setCve_motivo($cve_motivo) {$this->cve_motivo=$cve_motivo;}
  public function getCve_motivo() {return $this->cve_motivo;}

  public function setCve_motivo_dos($cve_motivo_dos) {$this->cve_motivo_dos=$cve_motivo_dos;}
  public function getCve_motivo_dos() {return $this->cve_motivo_dos;}

  public function setCve_turno($cve_turno) {$this->cve_turno=$cve_turno;}
  public function getCve_turno() {return $this->cve_turno;}

  public function setCve_servicio($cve_servicio) {$this->cve_servicio=$cve_servicio;}
  public function getCve_servicio() {return $this->cve_servicio;}

  public function setCve_sostenimiento($cve_sostenimiento) {$this->cve_sostenimiento=$cve_sostenimiento;}
  public function getCve_sostenimiento() {return $this->cve_sostenimiento;}

  public function setCve_dependencia_normativa($cve_dependencia_normativa) {$this->cve_dependencia_normativa=$cve_dependencia_normativa;}
  public function getCve_dependencia_normativa() {return $this->cve_dependencia_normativa;}

  public function setCve_dependencia_administrativa($cve_dependencia_administrativa) {$this->cve_dependencia_administrativa=$cve_dependencia_administrativa;}
  public function getCve_dependencia_administrativa() {return $this->cve_dependencia_administrativa;}

  public function setCve_tipo_educacion($cve_tipo_educacion) {$this->cve_tipo_educacion=$cve_tipo_educacion;}
  public function getCve_tipo_educacion() {return $this->cve_tipo_educacion;}

  public function setCve_nivel_educativo($cve_nivel_educativo) {$this->cve_nivel_educativo=$cve_nivel_educativo;}
  public function getCve_nivel_educativo() {return $this->cve_nivel_educativo;}

  public function setCve_subnivel_educativo($cve_subnivel_educativo) {$this->cve_subnivel_educativo=$cve_subnivel_educativo;}
  public function getCve_subnivel_educativo() {return $this->cve_subnivel_educativo;}

  public function setCve_migracion_servicio($cve_migracion_servicio) {$this->cve_migracion_servicio=$cve_migracion_servicio;}
  public function getCve_migracion_servicio() {return $this->cve_migracion_servicio;}

  public function setCve_tipo_biblioteca($cve_tipo_biblioteca) {$this->cve_tipo_biblioteca=$cve_tipo_biblioteca;}
  public function getCve_tipo_biblioteca() {return $this->cve_tipo_biblioteca;}

  public function setCve_tipo_supervision($cve_tipo_supervision) {$this->cve_tipo_supervision=$cve_tipo_supervision;}
  public function getCve_tipo_supervision() {return $this->cve_tipo_supervision;}

  public function setNombre_centro($nombre_centro) {$this->nombre_centro=$nombre_centro;}
  public function getNombre_centro() {return $this->nombre_centro;}

  public function setNombre_conocido($nombre_conocido) {$this->nombre_conocido=$nombre_conocido;}
  public function getNombre_conocido() {return $this->nombre_conocido;}

  public function setCve_estatus($cve_estatus) {$this->cve_estatus=$cve_estatus;}
  public function getCve_estatus() {return $this->cve_estatus;}

  public function setZona_escolar($zona_escolar) {$this->zona_escolar=$zona_escolar;}
  public function getZona_escolar() {return $this->zona_escolar;}

  public function setSector($sector) {$this->sector=$sector;}
  public function getSector() {return $this->sector;}

  public function setCve_inmueble($cve_inmueble) {$this->cve_inmueble=$cve_inmueble;}
  public function getCve_inmueble() {return $this->cve_inmueble;}

  public function setCve_institucional($cve_institucional) {$this->cve_institucional=$cve_institucional;}
  public function getCve_institucional() {return $this->cve_institucional;}

  public function setCve_pagaduria($cve_pagaduria) {$this->cve_pagaduria=$cve_pagaduria;}
  public function getCve_pagaduria() {return $this->cve_pagaduria;}

  public function setCve_tipo_modalidad($cve_tipo_modalidad) {$this->cve_tipo_modalidad=$cve_tipo_modalidad;}
  public function getCve_tipo_modalidad() {return $this->cve_tipo_modalidad;}

  public function setFolio_cct_nm($folio_cct_nm) {$this->folio_cct_nm=$folio_cct_nm;}
  public function getFolio_cct_nm() {return $this->folio_cct_nm;}

  public function setFecha_fundacion($fecha_fundacion) {$this->fecha_fundacion=$fecha_fundacion;}
  public function getFecha_fundacion() {return $this->fecha_fundacion;}

  public function setFecha_alta($fecha_alta) {$this->fecha_alta=$fecha_alta;}
  public function getFecha_alta() {return $this->fecha_alta;}

  public function setFecha_baja($fecha_baja) {$this->fecha_baja=$fecha_baja;}
  public function getFecha_baja() {return $this->fecha_baja;}

  public function setFecha_clausura($fecha_clausura) {$this->fecha_clausura=$fecha_clausura;}
  public function getFecha_clausura() {return $this->fecha_clausura;}

  public function setFecha_reapertura($fecha_reapertura) {$this->fecha_reapertura=$fecha_reapertura;}
  public function getFecha_reapertura() {return $this->fecha_reapertura;}

  public function setFecha_cambio($fecha_cambio) {$this->fecha_cambio=$fecha_cambio;}
  public function getFecha_cambio() {return $this->fecha_cambio;}

  public function setFecha_solicitud($fecha_solicitud) {$this->fecha_solicitud=$fecha_solicitud;}
  public function getFecha_solicitud() {return $this->fecha_solicitud;}

  public function setFecha_actualizacion($fecha_actualizacion) {$this->fecha_actualizacion=$fecha_actualizacion;}
  public function getFecha_actualizacion() {return $this->fecha_actualizacion;}

  public function setArea_solicitante($area_solicitante) {$this->area_solicitante=$area_solicitante;}
  public function getArea_solicitante() {return $this->area_solicitante;}

  public function setPuesto_solicitante($puesto_solicitante) {$this->puesto_solicitante=$puesto_solicitante;}
  public function getPuesto_solicitante() {return $this->puesto_solicitante;}

  public function setNombre_solicitante($nombre_solicitante) {$this->nombre_solicitante=$nombre_solicitante;}
  public function getNombre_solicitante() {return $this->nombre_solicitante;}

  public function setNombre_planeacion($nombre_planeacion) {$this->nombre_planeacion=$nombre_planeacion;}
  public function getNombre_planeacion() {return $this->nombre_planeacion;}

  public function setNombre_programacion($nombre_programacion) {$this->nombre_programacion=$nombre_programacion;}
  public function getNombre_programacion() {return $this->nombre_programacion;}

  public function setCve_usuario($cve_usuario) {$this->cve_usuario=$cve_usuario;}
  public function getCve_usuario() {return $this->cve_usuario;}

  public function setDescripcion($descripcion) {$this->descripcion=$descripcion;}
  public function getDescripcion() {return $this->descripcion;}

  public function setWeb_service($web_service) {$this->web_service=$web_service;}
  public function getWeb_service() {return $this->web_service;}

  public function setCve_caracterizan1($cve_caracterizan1) {$this->cve_caracterizan1=$cve_caracterizan1;}
  public function getCve_caracterizan1() {return $this->cve_caracterizan1;}

  public function setcve_caracterizan2($cve_caracterizan2) {$this->cve_caracterizan2=$cve_caracterizan2;}
  public function getcve_caracterizan2() {return $this->cve_caracterizan2;}

  public function setCalendario($calendario) {$this->calendario=$calendario;}
  public function getCalendario() {return $this->calendario;}

  /*Atributos Publicos de la entidad Turno*/
  public $turno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Servicio*/
  public $servicio; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Sostenimiento*/
  public $sostenimiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Dependencia Normativa*/
  public $dependencia_normativa; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Dependencia Aministrativa*/
  public $dependencia_administrativa; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Tipo Educacion*/
  public $tipo_educacion; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Nivel Educativo*/
  public $nivel_educativo; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Subnivel Educativo*/
  public $subnivel_educativo; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Estatus*/
  public $estatus; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Region*/
  public $cve_region; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $region; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $cve_centro_almacen; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Subregion*/
  public $cve_subregion; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $subregion; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $cve_centro_regional; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Municipio*/
  public $cve_municipio; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $municipio; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $zona_economica; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Localidad*/
  public $cve_localidad; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $localidad; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $carta_topografica; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $ageb; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Ambito*/
  public $cve_ambito; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $ambito; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Tipo Asentamiento*/
  public $cve_tipo_asentamiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $tipo_asentamiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016

  /*Atributos Publicos de la entidad Asentamiento*/
  public $cve_asentamiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $asentamiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $codigo_postal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad  Vialidad*/
  public $cve_tipo_vialidad_principal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $tipo_vialidad_principal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $nombre_vialidad_principal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $cve_tipo_vialidad_izquierda; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $tipo_vialidad_izquierda; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $nombre_vialidad_izquierda; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $cve_tipo_vialidad_derecha; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $tipo_vialidad_derecha; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $nombre_vialidad_derecha; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $cve_tipo_vialidad_posterior; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $tipo_vialidad_posterior; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $nombre_vialidad_posterior; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016

  /*Atributos Publicos de la entidad Domicilio Geografico*/
  public $numero_exterior; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $numero_interior; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $descripcion_ubicacion; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/06/2016
  public $latitud; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/12/2015
  public $longitud; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/12/2015
  public $altitud; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 02/12/2015

  /*Atributos Publicos de la entidad Pagaduria*/
  public $ubicacion; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Dato Centro Educativo*/
  public $lada; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_uno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_dos; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_tres; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $extension_uno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $extension_dos; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $extension_tres; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $celular_uno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $celular_dos; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $celular_tres; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $correo_electronico; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $pagina_web; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  public $razon_social; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 26/09/2017
  public $apoderado_legal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 26/09/2017

  /*Atributos Publicos de la entidad Tipo Director*/
  public $tipo_director; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 21/03/2017

  /*Atributos Publicos de la entidad Pais_continente*/
  public $nombre_pais; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 24/05/2017

  /*Atributos Publicos de la entidad Tipo Estados*/
  public $nombre_estado; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 24/05/2017

  /*Atributos Publicos de la entidad Director*/
  public $cve_tipo_director; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 24/05/2017
  public $cve_pais; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 24/05/2017
  public $cve_estado; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 21/03/2017
  public $rfc; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $curp; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $nombre; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $apellido_paterno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $apellido_materno; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $fecha_nacimiento; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  
  public $sexo; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_oficina; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_particular; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $telefono_celular; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $correo_electronico_institucional; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015
  public $correo_electronico_personal; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 01/12/2015

  /*Atributos Publicos de la entidad Tipo Centro*/
  public $tipo_centro; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 11/05/2017

  /*Atributos Publicos de la entidad Motivo*/
  public $motivo; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 11/05/2017

  /*Atributos Publicos de la entidad Motivo Dos*/
  public $motivo_dos; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 11/05/2017

  /*Atributos Publicos de la entidad migracion_servicio*/
  public $migracion_servicio; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 05/09/2017

  /*Atributos Publicos de la entidad inmueble_centro_educativo*/
  public $cve_tipo_inmueble; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 06/10/2017
  public $tipo_inmueble; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 06/10/2017

  /*Atributos Publicos de la entidad turnos*/
  public $cve_turno_registro; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 06/10/2017
  public $turno_registro; //Creado por Ing. Alfredo Antonio Sanchez Alvarado, Fecha de creacion: 06/10/2017

  /*atributos publicos del metodo tipo_biblioteca*/
  public $tipo_biblioteca;

  /*atributos publicos del metodo tipo_supervision*/
  public $tipo_supervision;

  public $desc_caract1;
  public $desc_caract2;

  public $modalidad;

  public $usuario_dato;
  public $fecha_dato;

  public $usuario_director;
  public $fecha_director;
  public $cct_distribucion;


  /*atributos publicos del metodo cct_zones*/
  public $cct_supervision;
  public $cct_jefatura;

  public $conteo;
  public $linea;

}
?>