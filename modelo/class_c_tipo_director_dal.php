<?php
include ("class_db.php");
include ("class_c_tipo_director.php");
/**
* Clase tipo_director_dal
* Creado por Ing. Alfredo Antonio Sanchez Alvarado
* Fecha de creacion: 15/03/2017
*/
class tipo_director_dal extends class_db
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
  * Metodo de listado principal donde arroja resultados de toda la entidad tipo_director
  * Creado por Ing. Alfredo Antonio Sanchez
  * Fecha de creacion: 15/03/2017
  */
  public function main_list(){    
    $this->query="SELECT cve_tipo_director, tipo_director
                  FROM tipo_director";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
        $obj = new tipo_director;
        $obj->setCve_tipo_director(utf8_encode($value["cve_tipo_director"]));
        $obj->setTipo_director(utf8_encode($value["tipo_director"]));       
        $lista[$i]=$obj;
         unset($obj);
        $i++;
    }
    return $lista;
  }
}
?>