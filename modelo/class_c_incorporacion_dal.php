<?php
ini_set("memory_limit",'128M');
ini_set('max_execution_time', 300);

include ("class_db.php");
include ("class_c_incorporacion.php");
/**
* Clase incorporacion_dal
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 23/11/2016
*/
class incorporacion_dal extends class_db
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
    * Metodo de listado principal donde arroja resultados de la entidad incorporacion por centro
    * Creado por Ing. Alfredo Antonio Sanchez
    * Fecha de creacion: 19/10/2015
    */
    public function list_by_cct_limit($cct=NULL){    
    $this->query="SELECT i.*, t.tipo_incorporacion
                  FROM incorporacion i
                      INNER JOIN tipo_incorporacion t ON i.cve_tipo_incorporacion=t.cve_tipo_incorporacion
                  WHERE cve_centro='$cct'
                  LIMIT 1";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
        $obj = new incorporacion;
        $obj->setCve_incorporacion(utf8_encode($value["cve_incorporacion"]));
        $obj->setCve_centro(utf8_encode($value["cve_centro"]));
        $obj->setCve_tipo_incorporacion(utf8_encode($value["cve_tipo_incorporacion"]));
        $obj->tipo_incorporacion=utf8_encode($value["tipo_incorporacion"]);
        $obj->setNumero_autorizacion_reconocimiento_estudio(utf8_encode($value["numero_autorizacion_reconocimiento_estudio"]));
        $obj->setFecha_acuerdo(utf8_encode($value["fecha_acuerdo"]));
        $obj->setAno_plan_programa_estudio(utf8_encode($value["ano_plan_programa_estudio"]));
        $obj->setDuracion(utf8_encode($value["duracion"]));
        $obj->setAno(utf8_encode($value["ano"]));
        $obj->setSemestre(utf8_encode($value["semestre"]));
        $obj->setCuatrimestre(utf8_encode($value["cuatrimestre"]));
        $obj->setTrimestre(utf8_encode($value["trimestre"]));
        $obj->setOtro(utf8_encode($value["otro"]));
        $obj->setNombre_plan_programa_estudio(utf8_encode($value["nombre_plan_programa_estudio"]));
        $lista[$i]=$obj;
         unset($obj);
        $i++;
    }
    return $lista;
  }

  /**
  * Metodo de insert
  * Creado por Ing. Alfredo Antonio Sanchez
  * Fecha de creacion: 10/11/2016
  */
  public function insert_inc($obj_data){    
    $cve_centro=$this->realescapestring(utf8_decode($obj_data->getCve_centro()));
    $cve_tipo_incorporacion=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_incorporacion()));
    $numero_autorizacion_reconocimiento_estudio=$this->realescapestring(utf8_decode($obj_data->getNumero_autorizacion_reconocimiento_estudio()));
    $fecha_acuerdo=$this->realescapestring(utf8_decode($obj_data->getFecha_acuerdo()));
    $ano_plan_programa_estudio=$this->realescapestring(utf8_decode($obj_data->getAno_plan_programa_estudio()));
    $duracion=$this->realescapestring(utf8_decode($obj_data->getDuracion()));
    $ano=$this->realescapestring(utf8_decode($obj_data->getAno()));
    $semestre=$this->realescapestring(utf8_decode($obj_data->getSemestre()));
    $cuatrimestre=$this->realescapestring(utf8_decode($obj_data->getCuatrimestre()));
    $trimestre=$this->realescapestring(utf8_decode($obj_data->getTrimestre()));
    $otro=$this->realescapestring(utf8_decode($obj_data->getOtro()));
    $nombre_plan_programa_estudio=$this->realescapestring(utf8_decode($obj_data->getNombre_plan_programa_estudio()));
    
    $this->query="INSERT INTO incorporacion
                        (
                        cve_centro, 
                        cve_tipo_incorporacion, 
                        numero_autorizacion_reconocimiento_estudio, 
                        fecha_acuerdo,
                        ano_plan_programa_estudio, 
                        duracion, 
                        ano, 
                        semestre, 
                        cuatrimestre, 
                        trimestre, 
                        otro, 
                        nombre_plan_programa_estudio
                        )
                    VALUES (
                                '$cve_centro',
                                '$cve_tipo_incorporacion',
                                '$numero_autorizacion_reconocimiento_estudio',
                                '$fecha_acuerdo',
                                '$ano_plan_programa_estudio',
                                '$duracion',
                                '$ano',
                                '$semestre',
                                '$cuatrimestre',
                                '$trimestre',
                                '$otro',
                                '$nombre_plan_programa_estudio'
                            )";
        //echo $this->query;
        //return;
        $this->execute_single_query();
  }
}
?>