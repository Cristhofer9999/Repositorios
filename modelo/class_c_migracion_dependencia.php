<?php
/**
* Clase migracion_dependencia
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 18/08/2017
*/
class migracion_dependencia{
  protected $DEPENDENCIA;
  protected $CV_CONTROL;
  protected $CV_SUBCONTROL;
  protected $CV_DEPENDENCIAN1;
  protected $CV_DEPENDENCIAN2;
  protected $CV_DEPENDENCIAN3;
  protected $CV_DEPENDENCIAN4;
  protected $CV_DEPENDENCIAN5;

  public function setDEPENDENCIA($DEPENDENCIA) {$this->DEPENDENCIA=$DEPENDENCIA;}
  public function getDEPENDENCIA() {return $this->DEPENDENCIA;}

  public function setCV_CONTROL($CV_CONTROL) {$this->CV_CONTROL=$CV_CONTROL;}
  public function getCV_CONTROL() {return $this->CV_CONTROL;}

  public function setCV_SUBCONTROL($CV_SUBCONTROL) {$this->CV_SUBCONTROL=$CV_SUBCONTROL;}
  public function getCV_SUBCONTROL() {return $this->CV_SUBCONTROL;}

  public function setCV_DEPENDENCIAN1($CV_DEPENDENCIAN1) {$this->CV_DEPENDENCIAN1=$CV_DEPENDENCIAN1;}
  public function getCV_DEPENDENCIAN1() {return $this->CV_DEPENDENCIAN1;}

  public function setCV_DEPENDENCIAN2($CV_DEPENDENCIAN2) {$this->CV_DEPENDENCIAN2=$CV_DEPENDENCIAN2;}
  public function getCV_DEPENDENCIAN2() {return $this->CV_DEPENDENCIAN2;}

  public function setCV_DEPENDENCIAN3($CV_DEPENDENCIAN3) {$this->CV_DEPENDENCIAN3=$CV_DEPENDENCIAN3;}
  public function getCV_DEPENDENCIAN3() {return $this->CV_DEPENDENCIAN3;}

  public function setCV_DEPENDENCIAN4($CV_DEPENDENCIAN4) {$this->CV_DEPENDENCIAN4=$CV_DEPENDENCIAN4;}
  public function getCV_DEPENDENCIAN4() {return $this->CV_DEPENDENCIAN4;}

  public function setCV_DEPENDENCIAN5($CV_DEPENDENCIAN5) {$this->CV_DEPENDENCIAN5=$CV_DEPENDENCIAN5;}
  public function getCV_DEPENDENCIAN5() {return $this->CV_DEPENDENCIAN5;}


}
?>