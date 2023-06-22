<?php
/**
* Clase tipo_director
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 15/03/2017
*/
class tipo_director {
  protected $cve_tipo_director;
  protected $tipo_director;

  public function setCve_tipo_director($cve_tipo_director) {$this->cve_tipo_director=$cve_tipo_director;}
  public function getCve_tipo_director() {return $this->cve_tipo_director;}

  public function setTipo_director($tipo_director) {$this->tipo_director=$tipo_director;}
  public function getTipo_director() {return $this->tipo_director;}
}
?>