<?php
include ("class_db.php");
include ("class_c_migracion_sostenimiento.php");
/**
* Clase migracion_sostenimiento_dal
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 18/08/2017
*/
class migracion_sostenimiento_dal extends class_db
{

	function __construct()
  {
    parent:: __construct();
  }

  function __destruct()
  {
    parent:: __destruct();
  }
  /**
  * Metodo de listado por dependencia y sostenimiento
  * Creado por Ing. Alfredo Antonio Sanchez
  * Fecha de creacion: 18/08/2017
  */
  public function list_by_sost_dep($sost=NULL, $dep=NULL){    
    $this->query="SELECT *
                  FROM migracion_sostenimiento
                  WHERE sostenimie='$sost' AND depnormtva='$dep'";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
        $obj = new migracion_sostenimiento;
        $obj->setsostenimie(utf8_encode($value["sostenimie"]));
        $obj->setdepnormtva(utf8_encode($value["depnormtva"]));
        $obj->setCV_CONTROL(utf8_encode($value["CV_CONTROL"]));
        $obj->setCV_SUBCONTROL(utf8_encode($value["CV_SUBCONTROL"]));
        $obj->setCV_DEPENDENCIAN1(utf8_encode($value["CV_DEPENDENCIAN1"]));
        $obj->setCV_DEPENDENCIAN2(utf8_encode($value["CV_DEPENDENCIAN2"]));
        $obj->setCV_DEPENDENCIAN3(utf8_encode($value["CV_DEPENDENCIAN3"]));
        $obj->setCV_DEPENDENCIAN4(utf8_encode($value["CV_DEPENDENCIAN4"]));
        $obj->setCV_DEPENDENCIAN5(utf8_encode($value["CV_DEPENDENCIAN5"]));       
        $lista[$i]=$obj;
         unset($obj);
        $i++;
    }
    return $lista;
  }
}
?>