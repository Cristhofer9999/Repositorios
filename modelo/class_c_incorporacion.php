<?php
/**
* Clase incorporacion
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 23/11/2016
*/
class incorporacion{
  protected $cve_incorporacion;
  protected $cve_centro;
  protected $cve_tipo_incorporacion;
  protected $numero_autorizacion_reconocimiento_estudio;
  protected $fecha_acuerdo;
  protected $ano_plan_programa_estudio;
  protected $duracion;
  protected $ano;
  protected $semestre;
  protected $cuatrimestre;
  protected $trimestre;
  protected $otro;
  protected $nombre_plan_programa_estudio;

  public function setCve_incorporacion($cve_incorporacion) {$this->cve_incorporacion=$cve_incorporacion;}
  public function getCve_incorporacion() {return $this->cve_incorporacion;}

  public function setCve_centro($cve_centro) {$this->cve_centro=$cve_centro;}
  public function getCve_centro() {return $this->cve_centro;}

  public function setCve_tipo_incorporacion($cve_tipo_incorporacion) {$this->cve_tipo_incorporacion=$cve_tipo_incorporacion;}
  public function getCve_tipo_incorporacion() {return $this->cve_tipo_incorporacion;}

  public function setNumero_autorizacion_reconocimiento_estudio($numero_autorizacion_reconocimiento_estudio) {$this->numero_autorizacion_reconocimiento_estudio=$numero_autorizacion_reconocimiento_estudio;}
  public function getNumero_autorizacion_reconocimiento_estudio() {return $this->numero_autorizacion_reconocimiento_estudio;}

  public function setFecha_acuerdo($fecha_acuerdo) {$this->fecha_acuerdo=$fecha_acuerdo;}
  public function getFecha_acuerdo() {return $this->fecha_acuerdo;}

  public function setAno_plan_programa_estudio($ano_plan_programa_estudio) {$this->ano_plan_programa_estudio=$ano_plan_programa_estudio;}
  public function getAno_plan_programa_estudio() {return $this->ano_plan_programa_estudio;}

  public function setDuracion($duracion) {$this->duracion=$duracion;}
  public function getDuracion() {return $this->duracion;}

  public function setAno($ano) {$this->ano=$ano;}
  public function getAno() {return $this->ano;}

  public function setSemestre($semestre) {$this->semestre=$semestre;}
  public function getSemestre() {return $this->semestre;}

  public function setCuatrimestre($cuatrimestre) {$this->cuatrimestre=$cuatrimestre;}
  public function getCuatrimestre() {return $this->cuatrimestre;}

  public function setTrimestre($trimestre) {$this->trimestre=$trimestre;}
  public function getTrimestre() {return $this->trimestre;}

  public function setOtro($otro) {$this->otro=$otro;}
  public function getOtro() {return $this->otro;}

  public function setNombre_plan_programa_estudio($nombre_plan_programa_estudio) {$this->nombre_plan_programa_estudio=$nombre_plan_programa_estudio;}
  public function getNombre_plan_programa_estudio() {return $this->nombre_plan_programa_estudio;}

  public $tipo_incorporacion;
}
?>
