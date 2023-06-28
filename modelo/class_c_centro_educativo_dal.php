<?php 
ini_set ('memory_limit', '-1');
include("class_db.php");
include("class_c_centro_educativo.php");
	/**
	* Clase Centro Educativo Dal
	* Creado por Ing. Alfredo Antonio Sanchez
	* Fecha de creacion: 19/10/2015
	*/
	class centro_educativo_dal extends class_db
	{
		
		function __construct()
   {
     parent:: __construct();
   }

   function __destruct()
   {
     parent:: __destruct();
   }



   /**/
   function count_exist($servicio, $sostenimiento,$clasificador){

    $sql = "SELECT COUNT(*) as cuantos
    FROM catalago_edu          
    WHERE servicio_nivel='$servicio' AND  (sostenimiento LIKE '%$sostenimiento%') AND (clasificador LIKE '%$clasificador%');";
    $this->set_sql($sql);
    $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
    $renglon = mysqli_fetch_assoc($rs);


    return $renglon["cuantos"];
  }
  /**/
/**    
* Selecciona latitud y longitud dependiendo del cct
* Creado por Ing. Elda Velazquez
* Fecha de creacion: 01/10/2019
**/
public function select_long_lat_cct($cct)
{
  $this->query="SELECT g.longitud_wgs84,g.latitud_wgs84
  FROM localizacion_cct.cct_geo g
  WHERE g.cct='$cct';";
  $this->get_results_from_query();
  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->latitud=(utf8_encode($value["latitud_wgs84"]));
    $obj->longitud=(utf8_encode($value["longitud_wgs84"]));
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}

/**    
* Metodo para insertar latitud y longitud en la tabla centro_eduativo
* Creado por Ing. Elda Velazquez
* Fecha de creacion: 01/10/2019
**/

public function insert_long_lat($new_latitud,$new_longitud,$cct) {

  $this->query="UPDATE centro_educativo
  SET  centro_educativo.latitud='$new_latitud',centro_educativo.longitud='$new_longitud'
  WHERE centro_educativo.cve_centro='$cct';";
         //print_r($this->query);
        //return;
  $this->execute_single_query();

}
/**    
* Revisa si puede modificar el centro dependiendo de la clave de cct
* Creado por Ing. Elda Velazquez
* Fecha de creacion: 01/10/2019
**/
public function count_coinsidencia_cct($servicio_cct,$substrcct)
{
  $select = "SELECT COUNT(*) AS permiso
  FROM catalago_edu
  WHERE catalago_edu.servicio_nivel='$servicio_cct' AND catalago_edu.clasificador LIKE '%$substrcct%';";
  $this->query = $select; 
  $this->get_results_from_query();
  foreach($this->rows as $Key => $value){
    $obj = new StdClass;
    $obj->permiso=$value['permiso'];            
  }         
  return $obj->permiso; 
}

    /**
  	* Metodo de listado principal donde arroja resultados de toda la entidad centro educativo
  	* Creado por Ing. Alfredo Antonio Sanchez Alvarado
  	* Fecha de creacion: 30/11/2015
  	*/
  	public function main_list() {
  		$this->query="SELECT *
     FROM vista_cct";
     $this->get_results_from_query();
     $i=1;
     $lista=NULL;
     foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
      $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
      $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
      $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
      $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
      $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
      $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
      $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
      $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
      $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
      $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
      $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
      $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
      $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
      $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
      $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setNombre_conocido(utf8_encode($value["nombre_conocido"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);            
      $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
      $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
      $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
      $obj->cve_region=(utf8_encode($value["region"]));
      $obj->region=(utf8_encode($value["des_region"]));
      $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
      $obj->cve_subregion=(utf8_encode($value["subregion"]));
      $obj->subregion=(utf8_encode($value["des_subregion"]));
      $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
      $obj->cve_municipio=(utf8_encode($value["municipio"]));
      $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
      $obj->zona_economica=(utf8_encode($value["zona_economica"]));
      $obj->cve_localidad=(utf8_encode($value["localidad"]));
      $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
      $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
      $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
      $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
      $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
      $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
      $obj->asentamiento=(utf8_encode($value["asentamiento"]));
      $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
      $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
      $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
      $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
      $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
      $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
      $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
      $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
      $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
      $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
      $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
      $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
      $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
      $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
      $obj->numero_interior=(utf8_encode($value["numero_interior"]));
      $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
      $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
      $obj->ageb=(utf8_encode($value["ageb"]));
      $obj->latitud=(utf8_encode($value["latitud"]));
      $obj->longitud=(utf8_encode($value["longitud"]));
      $obj->altitud=(utf8_encode($value["altitud"]));
      $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
      $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
      $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
      $obj->lada=utf8_encode($value["lada"]);
      $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
      $obj->extension_uno=utf8_encode($value["extension_uno"]);
      $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
      $obj->extension_dos=utf8_encode($value["extension_dos"]);
      $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
      $obj->extension_tres=utf8_encode($value["extension_tres"]);
      $obj->celular_uno=utf8_encode($value["celular_uno"]);
      $obj->celular_dos=utf8_encode($value["celular_dos"]);
      $obj->celular_tres=utf8_encode($value["celular_tres"]);
      $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
      $obj->pagina_web=utf8_encode($value["pagina_web"]);
      $obj->razon_social=utf8_encode($value["razon_social"]);
      $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
      $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
      $obj->tipo_director=utf8_encode($value["tipo_director"]);
      $obj->cve_pais=utf8_encode($value["pais_director"]);
      $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
      $obj->cve_estado=utf8_encode($value["estado_director"]);
      $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
      $obj->rfc=utf8_encode($value["rfc_director"]);
      $obj->curp=utf8_encode($value["curp_director"]);
      $obj->nombre=utf8_encode($value["nombre_director"]);
      $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
      $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
      $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
      $obj->sexo=utf8_encode($value["sexo_director"]);
      $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
      $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
      $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
      $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
      $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
      $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
      $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
      $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
      $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
      $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
      $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
      $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
      $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
      $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
      $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
      $obj->setArea_solicitante(utf8_encode($value["area_solicitante"]));
      $obj->setPuesto_solicitante(utf8_encode($value["puesto_solicitante"]));
      $obj->setNombre_solicitante(utf8_encode($value["nombre_solicitante"]));
      $obj->setNombre_planeacion(utf8_encode($value["nombre_planeacion"]));
      $obj->setNombre_programacion(utf8_encode($value["nombre_programacion"]));
      $obj->setDescripcion(utf8_encode($value["descripcion"]));
      $obj->setWeb_service(utf8_encode($value["web_service"]));
      $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
      $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
      $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
      $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
      $obj->setCve_tipo_supervision(utf8_encode($value["cve_tipo_supervision"]));
      $obj->tipo_supervision=utf8_encode($value["tipo_supervision"]);
      $obj->setCalendario(utf8_encode($value["calendario"]));
      $obj->usuario_dato=utf8_encode($value["usuario_dato"]);
      $obj->fecha_dato=utf8_encode($value["fecha_dato"]);
      $obj->usuario_director=utf8_encode($value["usuario_director"]);
      $obj->fecha_director=utf8_encode($value["fecha_director"]);
      $obj->cct_distribucion=utf8_encode($value["cct_distribucion"]);
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por la clave de centro
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 02/12/2015
    */
   //elda
    public function list_by_centro($cct) {
      $this->query="SELECT * ,w.*,x.correo_electronico_institucional as institucional, v.nombre AS nombre_centro,v.codigo_postal AS cp
      FROM vista_cct v 
      LEFT JOIN dato_centro_educativo w on (w.cve_centro=v.cct)
      LEFT JOIN recursos_c_a_inicio_2018 r ON (v.cct=r.CV_CCT)
      LEFT JOIN inmueble_centro_educativo f ON (f.cve_centro=v.cct)
      LEFT JOIN director x on (v.cct=x.cve_centro)
      WHERE cct='$cct'
      LIMIT 1";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->cve_inmueble_sic=$value["cve_inmueble_sic"];
        //$obj->INMUEBLE_CV_INMUEBLE=$value["INMUEBLE_CV_INMUEBLE"];
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre_centro"]));
        $obj->setNombre_conocido(utf8_encode($value["nombre_conocido"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["cp"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->razon_social=utf8_encode($value["razon_social"]);

        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->curp_apoderado_legal=utf8_encode($value["curp_apoderado_legal"]);
        $obj->entidad_apoderado_legal=utf8_encode($value["entidad_apoderado_legal"]);
        $obj->fn_apoderado_legal=utf8_encode($value["fn_apoderado_legal"]);
        $obj->sexo_apoderado_legal=utf8_encode($value["sexo_apoderado_legal"]);

        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        
        $obj->correo_electronico_institucional=utf8_encode($value["institucional"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setArea_solicitante(utf8_encode($value["area_solicitante"]));
        $obj->setPuesto_solicitante(utf8_encode($value["puesto_solicitante"]));
        $obj->setNombre_solicitante(utf8_encode($value["nombre_solicitante"]));
        $obj->setNombre_planeacion(utf8_encode($value["nombre_planeacion"]));
        $obj->setNombre_programacion(utf8_encode($value["nombre_programacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
        $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
        $obj->setCve_tipo_supervision(utf8_encode($value["cve_tipo_supervision"]));
        $obj->tipo_supervision=utf8_encode($value["tipo_supervision"]);
        $obj->setCalendario(utf8_encode($value["calendario"]));
        $obj->usuario_dato=utf8_encode($value["usuario_dato"]);
        $obj->fecha_dato=utf8_encode($value["fecha_dato"]);
        $obj->usuario_director=utf8_encode($value["usuario_director"]);
        $obj->fecha_director=utf8_encode($value["fecha_director"]);
        $obj->cct_distribucion=utf8_encode($value["cct_distribucion"]);
        $obj->V1 =$value["V1"];
        $obj->V2 =$value["V2"];
        $obj->V3 =$value["V3"];
        $obj->V4 =$value["V4"];
        $obj->V5 =$value["V5"];
        $obj->V6 =$value["V6"];
        $obj->V7 =$value["V7"];
        $obj->V8 =$value["V8"];
        $obj->V9 =$value["V9"];
        $obj->V10 =$value["V10"];
        $obj->V11 =$value["V11"];
        $obj->V12 =$value["V12"];
        $obj->V13 =$value["V13"];
        $obj->V14 =$value["V14"];
        $obj->V15 =$value["V15"];
        $obj->V16 =$value["V16"];
        $obj->V17 =$value["V17"];
        $obj->V18 =$value["V18"];
        $obj->E19 =$value["E19"];
        $obj->V20 =$value["V20"];
        $obj->V21 =$value["V21"];
        $obj->V22 =$value["V22"];
        $obj->V23 =$value["V23"];
        $obj->V24 =$value["V24"];
        $obj->V25 =$value["V25"];
        $obj->V26 =$value["V26"];
        $obj->V27 =$value["V27"];
        $obj->V28 =$value["V28"];
        $obj->V29 =$value["V29"];
        $obj->V30 =$value["V30"];
        $obj->V31 =$value["V31"];
        $obj->V32 =$value["V32"];
        $obj->V33 =$value["V33"];
        $obj->V34 =$value["V34"];
        $obj->V35 =$value["V35"];
        $obj->V36 =$value["V36"];
        $obj->V37 =$value["V37"];
        $obj->V38 =$value["V38"];
        $obj->V39 =$value["V39"];
        $obj->V40 =$value["V40"];
        $obj->V41 =$value["V41"];
        $obj->V42 =$value["V42"];
        $obj->V43 =$value["V43"];
        $obj->V44 =$value["V44"];
        $obj->V45 =$value["V45"];
        $obj->V46 =$value["V46"];
        $obj->V47 =$value["V47"];
        $obj->V48 =$value["V48"];
        $obj->V49 =$value["V49"];
        $obj->V50 =$value["V50"];
        $obj->V51 =$value["V51"];
        $obj->V52 =$value["V52"];
        $obj->V53 =$value["V53"];
        $obj->V54 =$value["V54"];
        $obj->V55 =$value["V55"];
        $obj->V56 =$value["V56"];
        $obj->V57 =$value["V57"];
        $obj->V58 =$value["V58"];
        $obj->V59 =$value["V59"];
        $obj->V60 =$value["V60"];
        $obj->V61 =$value["V61"];
        $obj->V62 =$value["V62"];
        $obj->E63 =$value["E63"];
        $obj->V64 =$value["V64"];
        $obj->V65 =$value["V65"];
        $obj->V66 =$value["V66"];
        $obj->V67 =$value["V67"];
        $obj->V68 =$value["V68"];
        $obj->V69 =$value["V69"];
        $obj->E70 =$value["E70"];
        $obj->V71 =$value["V71"];
        $obj->V72 =$value["V72"];
        $obj->V73 =$value["V73"];
        $obj->V74 =$value["V74"];
        $obj->V75 =$value["V75"];
        $obj->V76 =$value["V76"];
        $obj->V77 =$value["V77"];
        $obj->V78 =$value["V78"];
        $obj->V79 =$value["V79"];
        $obj->V80 =$value["V80"];
        $obj->V81 =$value["V81"];
        $obj->V82 =$value["V82"];
        $obj->V83 =$value["V83"];
        $obj->V84 =$value["V84"];
        $obj->V85 =$value["V85"];
        $obj->V86 =$value["V86"];
        $obj->V87 =$value["V87"];
        $obj->V88 =$value["V88"];
        $obj->V89 =$value["V89"];
        $obj->V90 =$value["V90"];
        $obj->V91 =$value["V91"];
        $obj->V92 =$value["V92"];
        $obj->V93 =$value["V93"];
        $obj->E94 =$value["E94"];
        $obj->E95 =$value["E95"];
        $obj->E96 =$value["E96"];
        $obj->V97 =$value["V97"];
        $obj->V98 =$value["V98"];
        $obj->V99 =$value["V99"];
        $obj->V100 =$value["V100"];
        $obj->V101 =$value["V101"];
        $obj->V102 =$value["V102"];
        $obj->V103 =$value["V103"];
        $obj->V104 =$value["V104"];
        $obj->V105 =$value["V105"];
        $obj->V106 =$value["V106"];
        $obj->V107 =$value["V107"];
        $obj->V108 =$value["V108"];
        $obj->V109 =$value["V109"];
        $obj->V110 =$value["V110"];
        $obj->V111 =$value["V111"];
        $obj->V112 =$value["V112"];
        $obj->V113 =$value["V113"];
        $obj->V114 =$value["V114"];
        $obj->V115 =$value["V115"];
        $obj->V116 =$value["V116"];
        $obj->V117 =$value["V117"];
        $obj->V118 =$value["V118"];
        $obj->V119 =$value["V119"];
        $obj->V120 =$value["V120"];
        $obj->V121 =$value["V121"];
        $obj->V122 =$value["V122"];
        $obj->V123 =$value["V123"];
        $obj->V124 =$value["V124"];
        $obj->V125 =$value["V125"];
        $obj->V126 =$value["V126"];
        $obj->V127 =$value["V127"];
        $obj->V128 =$value["V128"];
        $obj->V129 =$value["V129"];
        $obj->V130 =$value["V130"];
        $obj->V131 =$value["V131"];
        $obj->V132 =$value["V132"];
        $obj->V133 =$value["V133"];
        $obj->V134 =$value["V134"];
        $obj->V135 =$value["V135"];
        $obj->V136 =$value["V136"];
        $obj->V137 =$value["V137"];
        $obj->V138 =$value["V138"];
        $obj->V139 =$value["V139"];
        $obj->V140 =$value["V140"];
        $obj->V141 =$value["V141"];
        $obj->V142 =$value["V142"];
        $obj->V143 =$value["V143"];
        $obj->V144 =$value["V144"];
        $obj->V145 =$value["V145"];
        $obj->V146 =$value["V146"];
        $obj->V147 =$value["V147"];
        $obj->V148 =$value["V148"];
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }
    /**********************************************************************************/


    public function list_by_centro_otro($cct) {
      $this->query="SELECT * ,w.*,d.correo_electronico_institucional as institucional
      FROM vista_cct v 
      LEFT JOIN director d on (d.cve_centro=v.cct)
      LEFT JOIN dato_centro_educativo w on (w.cve_centro=v.cct)
      LEFT JOIN recursos_c_a_inicio_2018 r ON (v.cct=r.CV_CCT)
      LEFT JOIN inmueble_centro_educativo f ON (f.cve_centro=v.cct)
      WHERE cct='$cct'";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->cve_inmueble_sic=$value["cve_inmueble_sic"];
        //$obj->INMUEBLE_CV_INMUEBLE=$value["INMUEBLE_CV_INMUEBLE"];
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setNombre_conocido(utf8_encode($value["nombre_conocido"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->razon_social=utf8_encode($value["razon_social"]);

        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->curp_apoderado_legal=utf8_encode($value["curp_apoderado_legal"]);
        $obj->entidad_apoderado_legal=utf8_encode($value["entidad_apoderado_legal"]);
        $obj->fn_apoderado_legal=utf8_encode($value["fn_apoderado_legal"]);
        $obj->sexo_apoderado_legal=utf8_encode($value["sexo_apoderado_legal"]);

        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["institucional"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setArea_solicitante(utf8_encode($value["area_solicitante"]));
        $obj->setPuesto_solicitante(utf8_encode($value["puesto_solicitante"]));
        $obj->setNombre_solicitante(utf8_encode($value["nombre_solicitante"]));
        $obj->setNombre_planeacion(utf8_encode($value["nombre_planeacion"]));
        $obj->setNombre_programacion(utf8_encode($value["nombre_programacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
        $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
        $obj->setCve_tipo_supervision(utf8_encode($value["cve_tipo_supervision"]));
        $obj->tipo_supervision=utf8_encode($value["tipo_supervision"]);
        $obj->setCalendario(utf8_encode($value["calendario"]));
        $obj->usuario_dato=utf8_encode($value["usuario_dato"]);
        $obj->fecha_dato=utf8_encode($value["fecha_dato"]);
        $obj->usuario_director=utf8_encode($value["usuario_director"]);
        $obj->fecha_director=utf8_encode($value["fecha_director"]);
        $obj->cct_distribucion=utf8_encode($value["cct_distribucion"]);
        $obj->V1 =$value["V1"];
        $obj->V2 =$value["V2"];
        $obj->V3 =$value["V3"];
        $obj->V4 =$value["V4"];
        $obj->V5 =$value["V5"];
        $obj->V6 =$value["V6"];
        $obj->V7 =$value["V7"];
        $obj->V8 =$value["V8"];
        $obj->V9 =$value["V9"];
        $obj->V10 =$value["V10"];
        $obj->V11 =$value["V11"];
        $obj->V12 =$value["V12"];
        $obj->V13 =$value["V13"];
        $obj->V14 =$value["V14"];
        $obj->V15 =$value["V15"];
        $obj->V16 =$value["V16"];
        $obj->V17 =$value["V17"];
        $obj->V18 =$value["V18"];
        $obj->E19 =$value["E19"];
        $obj->V20 =$value["V20"];
        $obj->V21 =$value["V21"];
        $obj->V22 =$value["V22"];
        $obj->V23 =$value["V23"];
        $obj->V24 =$value["V24"];
        $obj->V25 =$value["V25"];
        $obj->V26 =$value["V26"];
        $obj->V27 =$value["V27"];
        $obj->V28 =$value["V28"];
        $obj->V29 =$value["V29"];
        $obj->V30 =$value["V30"];
        $obj->V31 =$value["V31"];
        $obj->V32 =$value["V32"];
        $obj->V33 =$value["V33"];
        $obj->V34 =$value["V34"];
        $obj->V35 =$value["V35"];
        $obj->V36 =$value["V36"];
        $obj->V37 =$value["V37"];
        $obj->V38 =$value["V38"];
        $obj->V39 =$value["V39"];
        $obj->V40 =$value["V40"];
        $obj->V41 =$value["V41"];
        $obj->V42 =$value["V42"];
        $obj->V43 =$value["V43"];
        $obj->V44 =$value["V44"];
        $obj->V45 =$value["V45"];
        $obj->V46 =$value["V46"];
        $obj->V47 =$value["V47"];
        $obj->V48 =$value["V48"];
        $obj->V49 =$value["V49"];
        $obj->V50 =$value["V50"];
        $obj->V51 =$value["V51"];
        $obj->V52 =$value["V52"];
        $obj->V53 =$value["V53"];
        $obj->V54 =$value["V54"];
        $obj->V55 =$value["V55"];
        $obj->V56 =$value["V56"];
        $obj->V57 =$value["V57"];
        $obj->V58 =$value["V58"];
        $obj->V59 =$value["V59"];
        $obj->V60 =$value["V60"];
        $obj->V61 =$value["V61"];
        $obj->V62 =$value["V62"];
        $obj->E63 =$value["E63"];
        $obj->V64 =$value["V64"];
        $obj->V65 =$value["V65"];
        $obj->V66 =$value["V66"];
        $obj->V67 =$value["V67"];
        $obj->V68 =$value["V68"];
        $obj->V69 =$value["V69"];
        $obj->E70 =$value["E70"];
        $obj->V71 =$value["V71"];
        $obj->V72 =$value["V72"];
        $obj->V73 =$value["V73"];
        $obj->V74 =$value["V74"];
        $obj->V75 =$value["V75"];
        $obj->V76 =$value["V76"];
        $obj->V77 =$value["V77"];
        $obj->V78 =$value["V78"];
        $obj->V79 =$value["V79"];
        $obj->V80 =$value["V80"];
        $obj->V81 =$value["V81"];
        $obj->V82 =$value["V82"];
        $obj->V83 =$value["V83"];
        $obj->V84 =$value["V84"];
        $obj->V85 =$value["V85"];
        $obj->V86 =$value["V86"];
        $obj->V87 =$value["V87"];
        $obj->V88 =$value["V88"];
        $obj->V89 =$value["V89"];
        $obj->V90 =$value["V90"];
        $obj->V91 =$value["V91"];
        $obj->V92 =$value["V92"];
        $obj->V93 =$value["V93"];
        $obj->E94 =$value["E94"];
        $obj->E95 =$value["E95"];
        $obj->E96 =$value["E96"];
        $obj->V97 =$value["V97"];
        $obj->V98 =$value["V98"];
        $obj->V99 =$value["V99"];
        $obj->V100 =$value["V100"];
        $obj->V101 =$value["V101"];
        $obj->V102 =$value["V102"];
        $obj->V103 =$value["V103"];
        $obj->V104 =$value["V104"];
        $obj->V105 =$value["V105"];
        $obj->V106 =$value["V106"];
        $obj->V107 =$value["V107"];
        $obj->V108 =$value["V108"];
        $obj->V109 =$value["V109"];
        $obj->V110 =$value["V110"];
        $obj->V111 =$value["V111"];
        $obj->V112 =$value["V112"];
        $obj->V113 =$value["V113"];
        $obj->V114 =$value["V114"];
        $obj->V115 =$value["V115"];
        $obj->V116 =$value["V116"];
        $obj->V117 =$value["V117"];
        $obj->V118 =$value["V118"];
        $obj->V119 =$value["V119"];
        $obj->V120 =$value["V120"];
        $obj->V121 =$value["V121"];
        $obj->V122 =$value["V122"];
        $obj->V123 =$value["V123"];
        $obj->V124 =$value["V124"];
        $obj->V125 =$value["V125"];
        $obj->V126 =$value["V126"];
        $obj->V127 =$value["V127"];
        $obj->V128 =$value["V128"];
        $obj->V129 =$value["V129"];
        $obj->V130 =$value["V130"];
        $obj->V131 =$value["V131"];
        $obj->V132 =$value["V132"];
        $obj->V133 =$value["V133"];
        $obj->V134 =$value["V134"];
        $obj->V135 =$value["V135"];
        $obj->V136 =$value["V136"];
        $obj->V137 =$value["V137"];
        $obj->V138 =$value["V138"];
        $obj->V139 =$value["V139"];
        $obj->V140 =$value["V140"];
        $obj->V141 =$value["V141"];
        $obj->V142 =$value["V142"];
        $obj->V143 =$value["V143"];
        $obj->V144 =$value["V144"];
        $obj->V145 =$value["V145"];
        $obj->V146 =$value["V146"];
        $obj->V147 =$value["V147"];
        $obj->V148 =$value["V148"];
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }
    /***********************************************************************************/

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por la clave de centro solo titulares
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 29/03/2017
    */
    /*vista_cct_detalle*/
    public function list_by_centro_titular($cct=NULL) {
      $this->query="SELECT *
      FROM vista_cct
      WHERE cct='$cct' AND cve_tipo_inmueble='0'";
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->clave_vialidad_principal=(utf8_encode($value["clave_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->clave_vialidad_izquierda=(utf8_encode($value["clave_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->clave_vialidad_derecha=(utf8_encode($value["clave_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->clave_vialidad_posterior=(utf8_encode($value["clave_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->cve_administracion_principal=(utf8_encode($value["cve_administracion_principal"]));
        $obj->administracion_principal=(utf8_encode($value["administracion_principal"]));
        $obj->cve_administracion_izquierda=(utf8_encode($value["cve_administracion_izquierda"]));
        $obj->administracion_izquierda=(utf8_encode($value["administracion_izquierda"]));
        $obj->cve_administracion_derecha=(utf8_encode($value["cve_administracion_derecha"]));
        $obj->administracion_derecha=(utf8_encode($value["administracion_derecha"]));
        $obj->cve_administracion_posterior=(utf8_encode($value["cve_administracion_posterior"]));
        $obj->administracion_posterior=(utf8_encode($value["administracion_posterior"]));
        $obj->cve_margen_principal=(utf8_encode($value["cve_margen_principal"]));
        $obj->margen_principal=(utf8_encode($value["margen_principal"]));
        $obj->cve_margen_izquierda=(utf8_encode($value["cve_margen_izquierda"]));
        $obj->margen_izquierda=(utf8_encode($value["margen_izquierda"]));
        $obj->cve_margen_derecha=(utf8_encode($value["cve_margen_derecha"]));
        $obj->margen_derecha=(utf8_encode($value["margen_derecha"]));
        $obj->cve_margen_posterior=(utf8_encode($value["cve_margen_posterior"]));
        $obj->margen_posterior=(utf8_encode($value["margen_posterior"]));
        $obj->cve_derecho_transito_principal=(utf8_encode($value["cve_derecho_transito_principal"]));
        $obj->derecho_transito_principal=(utf8_encode($value["derecho_transito_principal"]));
        $obj->cve_derecho_transito_izquierda=(utf8_encode($value["cve_derecho_transito_izquierda"]));
        $obj->derecho_transito_izquierda=(utf8_encode($value["derecho_transito_izquierda"]));
        $obj->cve_derecho_transito_derecha=(utf8_encode($value["cve_derecho_transito_derecha"]));
        $obj->derecho_transito_derecha=(utf8_encode($value["derecho_transito_derecha"]));
        $obj->cve_derecho_transito_posterior=(utf8_encode($value["cve_derecho_transito_posterior"]));
        $obj->derecho_transito_posterior=(utf8_encode($value["derecho_transito_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_exterior_anterior=(utf8_encode($value["numero_exterior_anterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->codigo_principal=(utf8_encode($value["codigo_principal"]));
        $obj->origen_principal=(utf8_encode($value["origen_principal"]));
        $obj->destino_principal=(utf8_encode($value["destino_principal"]));
        $obj->cadenamiento_principal=(utf8_encode($value["cadenamiento_principal"]));
        $obj->codigo_derecha=(utf8_encode($value["codigo_derecha"]));
        $obj->origen_derecha=(utf8_encode($value["origen_derecha"]));
        $obj->destino_derecha=(utf8_encode($value["destino_derecha"]));
        $obj->cadenamiento_derecha=(utf8_encode($value["cadenamiento_derecha"]));
        $obj->codigo_izquierda=(utf8_encode($value["codigo_izquierda"]));
        $obj->origen_izquierda=(utf8_encode($value["origen_izquierda"]));
        $obj->destino_izquierda=(utf8_encode($value["destino_izquierda"]));
        $obj->cadenamiento_izquierda=(utf8_encode($value["cadenamiento_izquierda"]));
        $obj->codigo_posterior=(utf8_encode($value["codigo_posterior"]));
        $obj->origen_posterior=(utf8_encode($value["origen_posterior"]));
        $obj->destino_posterior=(utf8_encode($value["destino_posterior"]));
        $obj->cadenamiento_posterior=(utf8_encode($value["cadenamiento_posterior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));            
        $obj->domicilio_geografico=(utf8_encode($value["domicilio"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);

        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->domicilio_director=utf8_encode($value["domicilio_director"]);
        $obj->colonia=utf8_encode($value["colonia_director"]);
        $obj->codigo_postal_director=utf8_encode($value["codigo_postal_director"]);
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

	/**
  	* Metodo para generar la clave del centro educativo
  	* Creado por Ing. Alfredo Antonio Sanchez Alvarado
  	* Fecha de creacion: 19/11/2015
  	*/
   public function generate_data($clasificador=NULL, $identificador=NULL){
    $this->query="SELECT CASE 
    WHEN LENGTH(MAX(SUBSTR(cve_centro,6,4))+1) IS NULL
    THEN '0001'
    WHEN LENGTH(MAX(SUBSTR(cve_centro,6,4))+1)=1
    THEN CONCAT('000',MAX(SUBSTR(cve_centro,6,4))+1)
    WHEN LENGTH(MAX(SUBSTR(cve_centro,6,4))+1)=2
    THEN CONCAT('00',MAX(SUBSTR(cve_centro,6,4))+1)
    WHEN LENGTH(MAX(SUBSTR(cve_centro,6,4))+1)=3
    THEN CONCAT('0',MAX(SUBSTR(cve_centro,6,4))+1)
    WHEN LENGTH(MAX(SUBSTR(cve_centro,6,4))+1)>3
    THEN MAX(SUBSTR(cve_centro,6,4))+1
    END AS maximo
    FROM centro_educativo
    WHERE SUBSTR(cve_centro,3,1)='$clasificador' AND SUBSTR(cve_centro,4,2)='$identificador'";
    $this->get_results_from_query();
    foreach ($this->rows as $key => $value) {
     $maximo=utf8_encode($value["maximo"]);
   }
   if ($maximo>"9999") {
     $i=1;
     $bit=true;
     while ($bit==true) {
      if (strlen($i)==1) {
       $progresivo="000".$i;
     } elseif (strlen($i)==2) {
       $progresivo="00".$i;
     } elseif (strlen($i)==3) {
       $progresivo="0".$i;
     } elseif (strlen($i)==4) {
       $progresivo=$i;
     } elseif (strlen($i)>=5) {
       echo $complete=0;
       return;
     }
     $this->query="SELECT COUNT(*) AS exist
     FROM centro_educativo
     WHERE SUBSTR(cve_centro,3,1)='$clasificador' AND SUBSTR(cve_centro,4,2)='$identificador' 
     AND SUBSTR(cve_centro,6,4)='$progresivo'";
     $this->get_results_from_query();
     foreach ($this->rows as $key => $value) {
       $exist=utf8_encode($value["exist"]);
     }
     if ($exist==1) {
       $i++;
     } elseif($exist==0 and $i>=1 and $i<=9999) {
       $bit=false;
       $this->generate_element($clasificador, $identificador, $progresivo);
     }
   }
 } else
 {
   $progresivo=$maximo;
   $centro_educativo=$this->generate_element($clasificador, $identificador, $progresivo);
   return $centro_educativo;
 }		
}

	/**
  	* Metodo para generar el elemento verificador del centro de trabajo
  	* Creado por Ing. Alfredo Antonio Sanchez Alvarado
  	* Fecha de creacion: 19/11/2015
  	*/
   public function generate_element($clasificador=NULL, $identificador=NULL, $progresivo=NULL) {
    $table_1 = array('A' => '01', 'B' => '02', 'C' => '03', 'D' => '04', 'E' => '05', 'F' => '06', 'G' => '07', 'H' => '08', 'I' => '09', 'J' => '10', 'K' => '11', 'L' => '12', 'M' => '13', 'N' => '14', 'O' => '15', 'P' => '16', 'Q' => '17', 'R' => '18', 'S' => '19', 'T' => '20', 'U' => '21', 'V' => '22', 'W' => '23', 'X' => '24', 'Y' => '25', 'Z' => '26');
    $table_2 = array('00' => 'A', '01' => 'B', '02' => 'C', '03' => 'D', '04' => 'E', '05' => 'F', '06' => 'G', '07' => 'H', '08' => 'I', '09' => 'J', '10' => 'K', '11' => 'L', '12' => 'M', '13' => 'N', '14' => 'O', '15' => 'P', '16' => 'Q', '17' => 'R', '18' => 'S', '19' => 'T', '20' => 'U', '21' => 'V', '22' => 'W', '23' => 'X', '24' => 'Y', '25' => 'Z', '26' => 'Z');
    $nclasificador=$table_1[$clasificador];
    $nidentificador1=$table_1[substr($identificador, 0,1)];
    $nidentificador2=$table_1[substr($identificador, 1,1)];
    $sumapares=substr($nclasificador, 0,1) + substr($nidentificador1, 0,1) + substr($nidentificador2, 0,1) + substr($progresivo, 0,1) + substr($progresivo, 2,1);
    $multpares=$sumapares*7;
    $sumanones=5 + substr($nclasificador, 1,1) + substr($nidentificador1, 1,1) + substr($nidentificador2, 1,1) + substr($progresivo, 1,1) + substr($progresivo, 3,1);
    $multnones=$sumanones*26;
    $sumtotal=$multpares+$multnones;
    $nelemento=($sumtotal % 27);
    if (strlen($nelemento)==1) {
     $nelemento="0".$nelemento;
   }
   $elemento=$table_2[$nelemento];
		//echo '05'.$clasificador.$identificador.$progresivo.$elemento;
   echo '05TMP'.rand(1000, 9999).$elemento;

 }

    /**
    * Metodo para alta de una escuela
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 06/10/2016
    */
    public function insert_cct($obj_data) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_centro())));
      $cve_tipo_centro=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_centro()));
      $cve_servicio=$this->realescapestring(utf8_decode($obj_data->getCve_servicio()));
      $cve_dependencia_administrativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_administrativa()));
      $cve_sostenimiento=$this->realescapestring(utf8_decode($obj_data->getCve_sostenimiento()));
      $cve_dependencia_normativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_normativa()));
      $cve_estatus=$this->realescapestring(utf8_decode($obj_data->getCve_estatus()));
      $cve_tipo_educacion=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_educacion()));
      $cve_nivel_educativo=$this->realescapestring(utf8_decode($obj_data->getCve_nivel_educativo()));
      $cve_subnivel_educativo=$this->realescapestring(utf8_decode($obj_data->getCve_subnivel_educativo()));
      $cve_migracion_servicio=$this->realescapestring(utf8_decode($obj_data->getCve_migracion_servicio()));
      $cve_tipo_biblioteca=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_biblioteca()));
      $cve_tipo_supervision=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_supervision()));
      $cve_caracterizan1=$this->realescapestring(utf8_decode($obj_data->getCve_caracterizan1()));
      $cve_caracterizan2=$this->realescapestring(utf8_decode($obj_data->getCve_caracterizan2()));
      $cve_turno=$this->realescapestring(utf8_decode($obj_data->getCve_turno()));
      $cve_tipo_modalidad=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_modalidad()));
      $nombre_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_centro())));
      $zona_escolar=$this->realescapestring(utf8_decode($obj_data->getZona_escolar()));
      $sector=$this->realescapestring(utf8_decode($obj_data->getSector()));
      $cve_institucional=$this->realescapestring(utf8_decode($obj_data->getCve_institucional()));
      $folio_cct_nm=$this->realescapestring(utf8_decode($obj_data->getFolio_cct_nm()));
      $fecha_fundacion=$this->realescapestring(utf8_decode($obj_data->getFecha_fundacion()));
      $fecha_solicitud=$this->realescapestring(utf8_decode($obj_data->getFecha_solicitud()));
      $area_solicitante=$this->realescapestring(utf8_decode($obj_data->getArea_solicitante()));
      $puesto_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getPuesto_solicitante())));
      $nombre_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_solicitante())));
      $nombre_planeacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_planeacion())));
      $nombre_programacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_programacion())));
      $cve_usuario=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_usuario())));
      $descripcion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getDescripcion())));
      $this->query="INSERT INTO centro_educativo
      (
      cve_centro, 
      cve_tipo_centro, 
      cve_motivo,
      cve_motivo_dos,
      cve_servicio, 
      cve_dependencia_administrativa,
      cve_sostenimiento, 
      cve_dependencia_normativa, 
      cve_migracion_servicio,
      cve_tipo_biblioteca,
      cve_tipo_supervision,
      cve_estatus, 
      cve_tipo_educacion, 
      cve_nivel_educativo, 
      cve_subnivel_educativo, 
      cve_turno, 
      cve_tipo_modalidad, 
      nombre_centro, 
      zona_escolar, 
      sector,
      cve_institucional, 
      folio_cct_nm, 
      fecha_fundacion, 
      fecha_alta,
      fecha_solicitud, 
      fecha_actualizacion, 
      area_solicitante,
      puesto_solicitante,
      nombre_solicitante,
      nombre_planeacion,
      nombre_programacion,
      cve_usuario, 
      descripcion,
      cve_caracterizan1,
      cve_caracterizan2
      )
      VALUES (
      '$cve_centro',
      '$cve_tipo_centro',
      '0',
      '0',
      '$cve_servicio',
      '$cve_dependencia_administrativa',
      '$cve_sostenimiento',
      '$cve_dependencia_normativa',
      '$cve_migracion_servicio',
      '$cve_tipo_biblioteca',
      '$cve_tipo_supervision',
      '$cve_estatus',
      '$cve_tipo_educacion',
      '$cve_nivel_educativo',
      '$cve_subnivel_educativo',
      '$cve_turno',
      '$cve_tipo_modalidad',
      '$nombre_centro',
      '$zona_escolar',
      '$sector',
      '$cve_institucional',
      '$folio_cct_nm',
      '$fecha_fundacion',
      NOW(),
      '$fecha_solicitud',
      NOW(),
      '$area_solicitante',
      '$puesto_solicitante',
      '$nombre_solicitante',
      '$nombre_planeacion',
      '$nombre_programacion',
      '$cve_usuario',
      '$descripcion',
      '$cve_caracterizan1',
      '$cve_caracterizan2'
    )";
        //print_r($this->query);
        //eturn;
    $this->execute_single_query();

  }

    /**
    * Metodo para cambio de clave de centro por la de el webservice del alta de mexico
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 13/09/2017
    */
    public function web_service_alta($cct=NULL,$cct_ws=NULL) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($cct)));
      $cve_centro_ws=$this->realescapestring(utf8_decode($cct_ws));

      $this->query="UPDATE centro_educativo
      SET cve_centro='$cve_centro_ws', web_service='0'
      WHERE cve_centro='$cve_centro'
      ";

      $this->execute_single_query();
    }

    /**
    * Metodo para validar si se mando a mexico los datos por webservice
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 13/09/2017
    */
    public function valida_web_service($cct=NULL,$bit=NULL) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($cct)));
      $bit_ws=$this->realescapestring(utf8_decode($bit));

      $this->query="UPDATE centro_educativo
      SET web_service='$bit_ws'
      WHERE cve_centro='$cve_centro'
      ";

      $this->execute_single_query();
    }

	/**
  	* Metodo para clausurar una escuela
  	* Creado por Ing. Alfredo Antonio Sanchez Alvarado
  	* Fecha de creacion: 30/11/2015
  	*/
  	public function clausurar($foliocctnm=NULL, $ctclausura=NULL, $motivo_uno=NULL, $motivo_dos=NULL, $fechasolicitud=NULL, $descripcion=NULL, $cveusuario=NULL) {
     $this->query="UPDATE centro_educativo 
     SET folio_cct_nm='$foliocctnm', cve_estatus='3', cve_motivo='$motivo_uno', cve_motivo_dos='$motivo_dos',
     fecha_clausura=NOW(), fecha_solicitud='$fechasolicitud', fecha_actualizacion=NOW(),
     descripcion='$descripcion', cve_usuario='$cveusuario'
     WHERE cve_centro='$ctclausura'";

     $this->execute_single_query();
   }

    /**
    * Metodo para reaperturar una escuela
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 10/03/2016
    */
    public function reapertura($obj_data) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_centro())));
      $cve_servicio=$this->realescapestring(utf8_decode($obj_data->getCve_servicio()));
      $cve_dependencia_administrativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_administrativa()));
      $cve_sostenimiento=$this->realescapestring(utf8_decode($obj_data->getCve_sostenimiento()));
      $cve_dependencia_normativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_normativa()));
      $cve_estatus=$this->realescapestring(utf8_decode($obj_data->getCve_estatus()));
      $cve_turno=$this->realescapestring(utf8_decode($obj_data->getCve_turno()));
      $zona_escolar=$this->realescapestring(utf8_decode($obj_data->getZona_escolar()));
      $sector=$this->realescapestring(utf8_decode($obj_data->getSector()));
      $cve_institucional=$this->realescapestring(utf8_decode($obj_data->getCve_institucional()));
      $folio_cct_nm=$this->realescapestring(utf8_decode($obj_data->getFolio_cct_nm()));
      $fecha_solicitud=$this->realescapestring(utf8_decode($obj_data->getFecha_solicitud()));
      $area_solicitante=$this->realescapestring(utf8_decode($obj_data->getArea_solicitante()));
      $puesto_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getPuesto_solicitante())));
      $nombre_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_solicitante())));
      $nombre_planeacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_planeacion())));
      $nombre_programacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_programacion())));
      $cve_usuario=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_usuario())));
      $descripcion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getDescripcion())));
      $cve_caracterizan1 = $this->realescapestring((mb_strtoupper($obj_data->getCve_caracterizan1())));
      $cve_caracterizan2 = $this->realescapestring((mb_strtoupper($obj_data->getCve_caracterizan2())));
      
      $nombre_centro = $this->realescapestring((mb_strtoupper($obj_data->getNombre_centro())));
      
      $this->query="UPDATE centro_educativo 
      SET cve_motivo='0',
      cve_motivo_dos='0',
      cve_servicio='$cve_servicio',
      cve_dependencia_administrativa='$cve_dependencia_administrativa',
      cve_sostenimiento='$cve_sostenimiento',
      cve_dependencia_normativa='$cve_dependencia_normativa',
      cve_estatus='$cve_estatus',
      cve_turno='$cve_turno',
      zona_escolar='$zona_escolar',
      sector='$sector',
      cve_institucional='$cve_institucional',
      folio_cct_nm='$folio_cct_nm', 
      fecha_solicitud='$fecha_solicitud',
      area_solicitante='$area_solicitante',
      puesto_solicitante='$puesto_solicitante',
      nombre_solicitante='$nombre_solicitante',
      nombre_planeacion='$nombre_planeacion',
      nombre_programacion='$nombre_programacion',
      fecha_reapertura=NOW(),                                     
      fecha_actualizacion=NOW(),
      descripcion='$descripcion', 
      cve_usuario='$cve_usuario',
      cve_caracterizan1='$cve_caracterizan1',
      cve_caracterizan2='$cve_caracterizan2',
      nombre_centro='$nombre_centro'
      WHERE cve_centro='$cve_centro'";

      $this->execute_single_query();
    }

     /**
    * Metodo para cambio de atributos una escuela
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 10/03/2016
    */
     public function cambio($obj_data) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_centro())));
      $nombre_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_centro())));
      $cve_servicio=$this->realescapestring(utf8_decode($obj_data->getCve_servicio()));
      $cve_dependencia_administrativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_administrativa()));
      $cve_sostenimiento=$this->realescapestring(utf8_decode($obj_data->getCve_sostenimiento()));
      $cve_dependencia_normativa=$this->realescapestring(utf8_decode($obj_data->getCve_dependencia_normativa()));
      $cve_turno=$this->realescapestring(utf8_decode($obj_data->getCve_turno()));
      $folio_cct_nm=$this->realescapestring(utf8_decode($obj_data->getFolio_cct_nm()));
      $fecha_solicitud=$this->realescapestring(utf8_decode($obj_data->getFecha_solicitud()));
      $area_solicitante=$this->realescapestring(utf8_decode($obj_data->getArea_solicitante()));
      $puesto_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getPuesto_solicitante())));
      $nombre_solicitante=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_solicitante())));
      $nombre_planeacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_planeacion())));
      $nombre_programacion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getNombre_programacion())));
      $cve_usuario=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_usuario())));
      $descripcion=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getDescripcion())));
      $cve_caracterizan1 = $this->realescapestring((mb_strtoupper($obj_data->getCve_caracterizan1())));
      $cve_caracterizan2 = $this->realescapestring((mb_strtoupper($obj_data->getCve_caracterizan2())));

      $this->query="UPDATE centro_educativo 
      SET cve_servicio='$cve_servicio',
      cve_dependencia_administrativa='$cve_dependencia_administrativa',
      cve_sostenimiento='$cve_sostenimiento',
      cve_dependencia_normativa='$cve_dependencia_normativa',
      cve_turno='$cve_turno',
      nombre_centro='$nombre_centro',
      folio_cct_nm='$folio_cct_nm', 
      fecha_solicitud='$fecha_solicitud',
      area_solicitante='$area_solicitante',
      puesto_solicitante='$puesto_solicitante',
      nombre_solicitante='$nombre_solicitante',
      nombre_planeacion='$nombre_planeacion',
      nombre_programacion='$nombre_programacion',
      fecha_cambio=NOW(),                                     
      fecha_actualizacion=NOW(),
      descripcion='$descripcion', 
      cve_usuario='$cve_usuario',
      cve_caracterizan1='$cve_caracterizan1',
      cve_caracterizan2='$cve_caracterizan2'
      WHERE cve_centro='$cve_centro'";
      //print_r($this->query);
      $this->execute_single_query();
    }

 /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por cct sin el ultimo digito verificador
    * Creado por Alejandro Noriega
    * Fecha de creacion: 17/02/2016
    */
 public function list_by_cct_sdv($cctsindv=NULL) {
  $this->query="SELECT *
  FROM vista_cct
  WHERE cct like '%$cctsindv%'";
  $this->get_results_from_query();
  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->setCve_centro(utf8_encode($value["cct"]));
    $obj->setCve_turno(utf8_encode($value["turno"]));
    $obj->turno=utf8_encode($value["desc_turno"]);
    $obj->setCve_servicio(utf8_encode($value["servicio"]));
    $obj->servicio=utf8_encode($value["desc_servicio"]);
    $obj->setNombre_centro(utf8_encode($value["nombre"]));
    $obj->setCve_estatus(utf8_encode($value["status"]));
    $obj->estatus=utf8_encode($value["desc_status"]);
    $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}
/**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por la zona escolar
    * Creado por Ing.Elda Velazquez Lopez
    * Fecha de creacion: 25/03/2020
    */
public function list_by_nombre_centro_ze($nivel3,$sostenimiento3,$zones3) {
  $this->query="SELECT *
  FROM vista_cct 
  WHERE nivel_educativo = '$nivel3' AND sostenimiento in ('$sostenimiento3')  AND zona_escolar='$zones3'  AND status in ('1','4','5') ";
  $this->get_results_from_query();
  print_r($this->query);

  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->setCve_centro(utf8_encode($value["cct"]));
    $obj->setCve_turno(utf8_encode($value["turno"]));
    $obj->turno=utf8_encode($value["desc_turno"]);
    $obj->setCve_servicio(utf8_encode($value["servicio"]));
    $obj->servicio=utf8_encode($value["desc_servicio"]);
    $obj->setNombre_centro(utf8_encode($value["nombre"]));
    $obj->setCve_estatus(utf8_encode($value["status"]));
    $obj->estatus=utf8_encode($value["desc_status"]);
    $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}

public function list_by_nombre_centro_ze_dos($nivel3,$sostenimiento3,$zones3) {
  $this->query="SELECT *
  FROM vista_cct 
  WHERE desc_nivel_educativo = '$nivel3' AND sostenimiento in ('$sostenimiento3')  AND zona_escolar='$zones3'  AND status in ('1','4','5') ";
  $this->get_results_from_query();
  //print_r($this->query);

  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->setCve_centro(utf8_encode($value["cct"]));
    $obj->setCve_turno(utf8_encode($value["turno"]));
    $obj->turno=utf8_encode($value["desc_turno"]);
    $obj->setCve_servicio(utf8_encode($value["servicio"]));
    $obj->servicio=utf8_encode($value["desc_servicio"]);
    $obj->setNombre_centro(utf8_encode($value["nombre"]));
    $obj->setCve_estatus(utf8_encode($value["status"]));
    $obj->estatus=utf8_encode($value["desc_status"]);
    $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}

public function list_by_nombre_centro_ze_estatal($nivel3,$sostenimiento3,$zones3) {
  $this->query="SELECT *
  FROM vista_cct 
  WHERE nivel_educativo = '$nivel3' AND sostenimiento in ('21','61')  AND zona_escolar='$zones3'  AND status in ('1','4','5') ";
  $this->get_results_from_query();
  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->setCve_centro(utf8_encode($value["cct"]));
    $obj->setCve_turno(utf8_encode($value["turno"]));
    $obj->turno=utf8_encode($value["desc_turno"]);
    $obj->setCve_servicio(utf8_encode($value["servicio"]));
    $obj->servicio=utf8_encode($value["desc_servicio"]);
    $obj->setNombre_centro(utf8_encode($value["nombre"]));
    $obj->setCve_estatus(utf8_encode($value["status"]));
    $obj->estatus=utf8_encode($value["desc_status"]);
    $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}
    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Nombre del Centro Educativo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 17/02/2016
    */
    public function list_by_nombre_centro($nombrece=NULL) {
      $this->query="SELECT *
      FROM vista_cct
      WHERE nombre like '%$nombrece%'";
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad Zonas Escolares
    * Creado por Alejandro Noriega
    * Fecha de creacion: 25/02/2016
    */
  public function list_by_zonas_escolares() {
    $this->query="SELECT DISTINCT zona_escolar
    FROM vista_cct
    WHERE zona_escolar >99
    ORDER BY zona_escolar ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por la clave de Zona Escolar
    * Creado por Alejandro Noriega
    * Fecha de creacion: 12/02/2016
    */
    public function list_by_zona_escolar($zona_escolar=NULL) {
      $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
      FROM vista_cct
      WHERE zona_escolar='$zona_escolar'";
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad Zonas Escolares
    * Creado por Alejandro Noriega
    * Fecha de creacion: 08/04/2016
    */
  public function list_by_fecha_alta() {
    $this->query="SELECT DISTINCT fecha_alta
    FROM vista_cct
    WHERE status = '1'
    ORDER BY fecha_alta ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }


  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Rango de fechas de alta
    * Creado por Alejandro Noriega
    * Fecha de creacion: 08/04/2016
    */
  public function list_by_fecha_alta_centro($fecha_inicio=NULL,$fecha_fin=NULL) {
    $this->query="SELECT fecha_alta,cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE fecha_alta >='$fecha_inicio'
    and fecha_alta <='$fecha_fin'
    and status='1'
    order by fecha_alta";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));            
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad por Fecha de Baja
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_baja() {
    $this->query="SELECT DISTINCT fecha_baja
    FROM vista_cct
    WHERE status = '2'
    ORDER BY fecha_baja ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Rango de Fechas de Baja
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_baja_centro($fecha_inicio=NULL,$fecha_fin=NULL) {
    $this->query="SELECT fecha_baja,cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE fecha_baja >='$fecha_inicio'
    and fecha_baja <='$fecha_fin'
    and status='2'
    order by fecha_baja";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));            
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }



  /**
    * Metodo de listado donde arroja resultados de toda la entidad por Fecha de clausura
    * Creado por Alejandro Noriega
    * Fecha de creacion: 08/04/2016
    */
  public function list_by_fecha_clausura() {
    $this->query="SELECT DISTINCT fecha_clausura
    FROM vista_cct
    WHERE status = '3'
    ORDER BY fecha_clausura ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Rango de fechas de clausura
    * Creado por Alejandro Noriega
    * Fecha de creacion: 08/04/2016
    */
  public function list_by_fecha_clausura_centro($fecha_inicio=NULL,$fecha_fin=NULL) {
    $this->query="SELECT fecha_clausura,cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE fecha_clausura >='$fecha_inicio'
    and fecha_clausura <='$fecha_fin'
    and status='3'
    order by fecha_clausura";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));            
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad por Fecha de Reapertura
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_reapertura() {
    $this->query="SELECT DISTINCT fecha_reapertura
    FROM vista_cct
    WHERE status = '4'
    ORDER BY fecha_reapertura ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Rango de Fechas de Baja
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_reapertura_centro($fecha_inicio=NULL,$fecha_fin=NULL) {
    $this->query="SELECT fecha_reapertura,cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE fecha_reapertura >='$fecha_inicio'
    and fecha_reapertura <='$fecha_fin'
    and status='4'
    order by fecha_reapertura";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));            
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad por Fecha de Cambio de Atributo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_cambio() {
    $this->query="SELECT DISTINCT fecha_cambio
    FROM vista_cct
    ORDER BY fecha_cambio ";                      
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));            
      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Rango de Fechas de Cambio de Atributo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 11/04/2016
    */
  public function list_by_fecha_cambio_centro($fecha_inicio=NULL,$fecha_fin=NULL) {
    $this->query="SELECT fecha_cambio,cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE fecha_cambio >='$fecha_inicio'
    and fecha_cambio <='$fecha_fin'
    order by fecha_cambio";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));            
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Dependencia Normativa
    * Creado por Alejandro Noriega
    * Fecha de creacion: 13/04/2016
    */
  public function list_by_dependencia_normativa_centro($dependencia_normativa=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE dependencia_normativa = '$dependencia_normativa'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Dependencia Administrativa
    * Creado por Alejandro Noriega
    * Fecha de creacion: 13/04/2016
    */
  public function list_by_dependencia_administrativa_centro($dependencia_administrativa=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE dependencia_administrativa = '$dependencia_administrativa'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Servicio
    * Creado por Alejandro Noriega
    * Fecha de creacion: 14/04/2016
    */
  public function list_by_servicio_centro($servicio=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE servicio = '$servicio'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Sostenimiento
    * Creado por Alejandro Noriega
    * Fecha de creacion: 14/04/2016
    */
  public function list_by_sostenimiento_centro($sostenimiento=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE sostenimiento = '$sostenimiento'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Clasificador
    * Creado por Alejandro Noriega
    * Fecha de creacion: 14/04/2016
    */
  public function list_by_clasificador_centro($clasificador=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE substring(cct,3,1) = '$clasificador'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Identificador
    * Creado por Alejandro Noriega
    * Fecha de creacion: 14/04/2016
    */
  public function list_by_identificador_centro($identificador=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct
    WHERE substring(cct,4,2) = '$identificador'
    order by cct,turno";
    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Subregion
    * Creado por Alejandro Noriega
    * Fecha de creacion: 17/02/2016
    */
    public function list_by_subregion($subregion=NULL) {
      $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status
      FROM vista_cct
      WHERE subregion='$subregion'";                      
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Region
    * Creado por Alejandro Noriega
    * Fecha de creacion: 17/02/2016
    */
    public function list_by_region($region=NULL) {
      $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status
      FROM vista_cct
      WHERE region='$region'";                      
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }


    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Municipio
    * Creado por Alejandro Noriega
    * Fecha de creacion: 24/02/2016
    */
    public function list_by_municipio($municipio=NULL) {
      $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status
      FROM vista_cct
      WHERE municipio='$municipio'";                      
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por localidad
    * Creado por Alejandro Noriega
    * Fecha de creacion: 14/04/2016
    */
  public function list_by_localidad_centro($localidad=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE localidad = '$localidad'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por Ambito
    * Creado por Alejandro Noriega
    * Fecha de creacion: 19/04/2016
    */
  public function list_by_ambito_centro($ambito=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE categoria_poblacion = '$ambito'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por tipo de educacion
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_tipo_educacion_centro($tipo_educacion=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE tipo_educacion = '$tipo_educacion'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por nivel_educativo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_nivel_educativo_centro($nivel_educativo=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE nivel_educativo = '$nivel_educativo'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por subnivel_educativo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_subnivel_educativo_centro($subnivel_educativo=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE subnivel_educativo = '$subnivel_educativo'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por control educativo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_control_educativo_centro($control_educativo=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE control_educativo = '$control_educativo'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por subcontrol educativo
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_subcontrol_educativo_centro($subcontrol_educativo=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE subcontrol_educativo = '$subcontrol_educativo'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por turno
    * Creado por Alejandro Noriega
    * Fecha de creacion: 22/04/2016
    */
  public function list_by_turno_centro($turno=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE turno = '$turno'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por estatus
    * Creado por Alejandro Noriega
    * Fecha de creacion: 27/04/2016
    */
  public function list_by_estatus_centro($estatus=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE status = '$estatus'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por motivo de clausura
    * Creado por Alejandro Noriega
    * Fecha de creacion: 27/04/2016
    */
  public function list_by_motivo_clausura_centro($motivo_clausura=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE motivo_clausura = '$motivo_clausura'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }

  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por pagaduria
    * Creado por Alejandro Noriega
    * Fecha de creacion: 27/04/2016
    */
  public function list_by_pagaduria_centro($pagaduria=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE pagaduria = '$pagaduria'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }



  /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por turno
    * Creado por Alejandro Noriega
    * Fecha de creacion: 30/06/2016
    */
  public function list_by_turnos_por_centro($cct=NULL) {
    $this->query="SELECT cct, turno, desc_turno, servicio, desc_servicio, nombre, status, desc_status, desc_nivel_educativo, desc_subnivel_educativo, desc_sostenimiento
    FROM vista_cct 
    WHERE cct = '$cct'
    order by cct,turno";

    $this->get_results_from_query();
    $i=1;
    $lista=NULL;
    foreach ($this->rows as $key => $value) {
      $obj = new centro_educativo;
      $obj->setCve_centro(utf8_encode($value["cct"]));
      $obj->setCve_turno(utf8_encode($value["turno"]));
      $obj->turno=utf8_encode($value["desc_turno"]);
      $obj->setCve_servicio(utf8_encode($value["servicio"]));
      $obj->servicio=utf8_encode($value["desc_servicio"]);
      $obj->setNombre_centro(utf8_encode($value["nombre"]));
      $obj->setCve_estatus(utf8_encode($value["status"]));
      $obj->estatus=utf8_encode($value["desc_status"]);
      $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
      $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
      $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);            

      $lista[$i]=$obj;
      unset($obj);
      $i++;
    }
    return $lista;
  }


/**
    * Metodo de listado donde arroja resultados de supervisiones filtrado por sostenimiento y nivel educativo estatal
    * Creado por Cristina Estrada Ruiz
    * Fecha de creacion: 25/04/2016
    */
public function list_zonas_by_sostenimiento_nivel_estatal($sostenimiento,$nivel) {
  $this->query="SELECT a.cve_sostenimiento, a.cve_nivel_educativo, a.zona_escolar, a.cve_centro, b.nombre
  FROM centro_educativo a
  INNER JOIN vista_cct b on a.cve_centro = b.cct
  WHERE a.cve_tipo_centro = '1' and a.cve_sostenimiento = '$sostenimiento' and a.cve_nivel_educativo = '$nivel'
  ORDER BY a.cve_sostenimiento, a.cve_nivel_educativo, a.zona_escolar, a.cve_centro";
  $this->get_results_from_query();
  $i=1;
  $lista=NULL;
  foreach ($this->rows as $key => $value) {
    $obj = new centro_educativo;
    $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
    $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
    $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
    $obj->setCve_centro(utf8_encode($value["cve_centro"]));
    $obj->setNombre_centro(utf8_encode($value["nombre"]));
    /*$obj->setSector(utf8_encode($value["jefatura_de_sector"]));*/
    $lista[$i]=$obj;
    unset($obj);
    $i++;
  }
  return $lista;
}


    /**
    * Metodo de listado donde arroja resultados de supervisiones filtrado por sostenimiento y nivel educativo federal
    * Creado por Cristina Estrada Ruiz
    * Fecha de creacion: 25/04/2016
    */
    public function list_zonas_by_sostenimiento_nivel_federal($sostenimiento,$nivel) {
      $this->query="SELECT a.cve_sostenimiento, a.cve_nivel_educativo, a.zona_escolar, a.cve_centro, b.nombre
      FROM centro_educativo a
      INNER JOIN vista_cct b on a.cve_centro = b.cct
      WHERE a.cve_tipo_centro = '1' and a.cve_sostenimiento = '$sostenimiento' and a.cve_subnivel_educativo = '$nivel'
      ORDER BY a.cve_sostenimiento, a.cve_subnivel_educativo, a.zona_escolar, a.cve_centro";
      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setCve_centro(utf8_encode($value["cve_centro"]));
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        /*$obj->setSector(utf8_encode($value["jefatura_de_sector"]));*/
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }
      return $lista;
    }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por web service alta
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 02/12/2015
    */
    public function list_by_ws($ws=NULL) {
      $this->query="SELECT *
      FROM vista_cct
      WHERE web_service='$ws'";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->razon_social=utf8_encode($value["razon_social"]);
        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
        $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por substring cve_centro
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 02/12/2015
    */
    public function list_by_TMP() {
      $this->query="SELECT *
      FROM vista_cct
      WHERE SUBSTR(cct,3,3)='TMP'";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->razon_social=utf8_encode($value["razon_social"]);
        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
        $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }

    /**
    * Metodo para correcion de datos de Mexico de atributos una escuela
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 05/10/2017
    */
    public function update_cor($obj_data) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_centro())));
      $cve_tipo_centro=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_tipo_centro())));
      $cve_tipo_educacion=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_educacion()));
      $cve_nivel_educativo=$this->realescapestring(utf8_decode($obj_data->getCve_nivel_educativo()));
      $cve_subnivel_educativo=$this->realescapestring(utf8_decode($obj_data->getCve_subnivel_educativo()));
      $cve_migracion_servicio=$this->realescapestring(utf8_decode($obj_data->getCve_migracion_servicio()));
      $cve_tipo_biblioteca=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_biblioteca()));
      $cve_institucional=$this->realescapestring(utf8_decode($obj_data->getCve_institucional()));
      $cve_caracterizan1=$this->realescapestring(utf8_decode($obj_data->getCve_caracterizan1()));
      $cve_caracterizan2=$this->realescapestring(utf8_decode($obj_data->getCve_caracterizan2()));
      $cve_tipo_supervision=$this->realescapestring(utf8_decode($obj_data->getCve_tipo_supervision()));
      $cve_usuario=$this->realescapestring(utf8_decode(mb_strtoupper($obj_data->getCve_usuario())));
      $this->query="UPDATE centro_educativo
      SET cve_tipo_centro='$cve_tipo_centro', 
      cve_tipo_educacion='$cve_tipo_educacion', 
      cve_nivel_educativo='$cve_nivel_educativo', 
      cve_subnivel_educativo='$cve_subnivel_educativo', 
      cve_migracion_servicio='$cve_migracion_servicio',
      cve_institucional='$cve_institucional',
      cve_tipo_biblioteca='$cve_tipo_biblioteca',
      cve_caracterizan1='$cve_caracterizan1',
      cve_caracterizan2='$cve_caracterizan2',
      cve_tipo_supervision='$cve_tipo_supervision',
      fecha_actualizacion=NOW(), 
      cve_usuario='$cve_usuario'
      WHERE cve_centro='$cve_centro'";

      $this->execute_single_query();
    }

    /**
    * Metodo de listado donde arroja resultados de toda la entidad centro educativo condicionado por la clave de centro en la vista_cct_detalle
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 06/10/2017
    */
    /*vista_cct_detalle*/
    public function list_by_centro_turno_detalle($cct=NULL, $turno=NULL) {
      $this->query="SELECT *
      FROM vista_cct
      WHERE cct='$cct' AND cve_turno_registro='$turno'";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->clave_vialidad_principal=(utf8_encode($value["clave_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->clave_vialidad_izquierda=(utf8_encode($value["clave_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->clave_vialidad_derecha=(utf8_encode($value["clave_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->clave_vialidad_posterior=(utf8_encode($value["clave_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->cve_administracion_principal=(utf8_encode($value["cve_administracion_principal"]));
        $obj->administracion_principal=(utf8_encode($value["administracion_principal"]));
        $obj->cve_administracion_izquierda=(utf8_encode($value["cve_administracion_izquierda"]));
        $obj->administracion_izquierda=(utf8_encode($value["administracion_izquierda"]));
        $obj->cve_administracion_derecha=(utf8_encode($value["cve_administracion_derecha"]));
        $obj->administracion_derecha=(utf8_encode($value["administracion_derecha"]));
        $obj->cve_administracion_posterior=(utf8_encode($value["cve_administracion_posterior"]));
        $obj->administracion_posterior=(utf8_encode($value["administracion_posterior"]));
        $obj->cve_margen_principal=(utf8_encode($value["cve_margen_principal"]));
        $obj->margen_principal=(utf8_encode($value["margen_principal"]));
        $obj->cve_margen_izquierda=(utf8_encode($value["cve_margen_izquierda"]));
        $obj->margen_izquierda=(utf8_encode($value["margen_izquierda"]));
        $obj->cve_margen_derecha=(utf8_encode($value["cve_margen_derecha"]));
        $obj->margen_derecha=(utf8_encode($value["margen_derecha"]));
        $obj->cve_margen_posterior=(utf8_encode($value["cve_margen_posterior"]));
        $obj->margen_posterior=(utf8_encode($value["margen_posterior"]));
        $obj->cve_derecho_transito_principal=(utf8_encode($value["cve_derecho_transito_principal"]));
        $obj->derecho_transito_principal=(utf8_encode($value["derecho_transito_principal"]));
        $obj->cve_derecho_transito_izquierda=(utf8_encode($value["cve_derecho_transito_izquierda"]));
        $obj->derecho_transito_izquierda=(utf8_encode($value["derecho_transito_izquierda"]));
        $obj->cve_derecho_transito_derecha=(utf8_encode($value["cve_derecho_transito_derecha"]));
        $obj->derecho_transito_derecha=(utf8_encode($value["derecho_transito_derecha"]));
        $obj->cve_derecho_transito_posterior=(utf8_encode($value["cve_derecho_transito_posterior"]));
        $obj->derecho_transito_posterior=(utf8_encode($value["derecho_transito_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_exterior_anterior=(utf8_encode($value["numero_exterior_anterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->codigo_principal=(utf8_encode($value["codigo_principal"]));
        $obj->origen_principal=(utf8_encode($value["origen_principal"]));
        $obj->destino_principal=(utf8_encode($value["destino_principal"]));
        $obj->cadenamiento_principal=(utf8_encode($value["cadenamiento_principal"]));
        $obj->codigo_derecha=(utf8_encode($value["codigo_derecha"]));
        $obj->origen_derecha=(utf8_encode($value["origen_derecha"]));
        $obj->destino_derecha=(utf8_encode($value["destino_derecha"]));
        $obj->cadenamiento_derecha=(utf8_encode($value["cadenamiento_derecha"]));
        $obj->codigo_izquierda=(utf8_encode($value["codigo_izquierda"]));
        $obj->origen_izquierda=(utf8_encode($value["origen_izquierda"]));
        $obj->destino_izquierda=(utf8_encode($value["destino_izquierda"]));
        $obj->cadenamiento_izquierda=(utf8_encode($value["cadenamiento_izquierda"]));
        $obj->codigo_posterior=(utf8_encode($value["codigo_posterior"]));
        $obj->origen_posterior=(utf8_encode($value["origen_posterior"]));
        $obj->destino_posterior=(utf8_encode($value["destino_posterior"]));
        $obj->cadenamiento_posterior=(utf8_encode($value["cadenamiento_posterior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));            
        $obj->domicilio_geografico=(utf8_encode($value["domicilio"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);

        $obj->razon_social=utf8_encode($value["razon_social"]);
        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->cve_incr_cp=utf8_encode($value["cve_incr_cp"]);
        $obj->cve_codpost=utf8_encode($value["cve_codpost"]);
        $obj->nombre_colonia=utf8_encode($value["nombre_colonia"]);
        $obj->tip_asen_cat=utf8_encode($value["tip_asen_cat"]);
        $obj->mun_cat=utf8_encode($value["mun_cat"]);
        $obj->estado=utf8_encode($value["estado"]);
        $obj->ciudad=utf8_encode($value["ciudad"]);
        $obj->clve_municipio=utf8_encode($value["cve_municipio"]);
        $obj->calle=utf8_encode($value["calle"]);
        $obj->entre_calle=utf8_encode($value["entre_calle"]);
        $obj->y_calle=utf8_encode($value["y_calle"]);
        $obj->posterior_calle=utf8_encode($value["posterior_calle"]);
        $obj->numext=utf8_encode($value["numext"]);
        $obj->numint=utf8_encode($value["numint"]);

        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);

        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->domicilio_director=utf8_encode($value["domicilio_director"]);
        $obj->colonia=utf8_encode($value["colonia_director"]);
        $obj->codigo_postal_director=utf8_encode($value["codigo_postal_director"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->cve_tipo_inmueble=utf8_encode($value["cve_tipo_inmueble"]);
        $obj->tipo_inmueble=utf8_encode($value["tipo_inmueble"]);
        $obj->cve_turno_registro=utf8_encode($value["cve_turno_registro"]);
        $obj->turno_registro=utf8_encode($value["turno_registro"]);

        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }


    /**
    * Metodo para correcion de datos de Mexico de atributos una escuelaconsultar el cve_centro con zona escolar
    * Creado por Ing. Cristina Estrada Ruiz
    * Fecha de creacion: 19/10/2017
    */
    public function cct_zonas($cct=NULL) {
      $this->query="select a.cct as ccta, a.zona_escolar as zonaa, a.jefatura_de_sector as sectora, a.sostenimiento as sosta,
      b.cct as cct_supervision, b.zona_escolar as zonab, b.jefatura_de_sector as sectorb, b.sostenimiento as sostb
      from vista_cct a
      left join vista_cct b on a.zona_escolar = b.zona_escolar and a.jefatura_de_sector = b.jefatura_de_sector
      where a.cct = '$cct' and
      case
      when a.sostenimiento = '24' then b.sostenimiento = '24'
      when a.sostenimiento in ('21','22','61') then b.sostenimiento = '21'
      end and
      case
      when substr(a.cct,4,2) = 'EI' THEN substr(b.cct,3,3) = 'FHI' 
      when substr(a.cct,4,2) = 'DI' THEN substr(b.cct,3,3) = 'FCJ'
      when substr(a.cct,4,2) = 'JN' THEN substr(b.cct,3,3) = 'FZP'
      when substr(a.cct,4,2) = 'PR' THEN substr(b.cct,3,3) = 'FIZ'
      when substr(a.cct,4,2) = 'ES' THEN substr(b.cct,3,3) = 'FIS'
      when substr(a.cct,4,2) = 'ST' THEN if(a.sostenimiento in ('21','22','61'),substr(b.cct,3,3) = 'FIS' ,substr(b.cct,3,3) = 'FTS')
      when substr(a.cct,4,2) = 'TV' THEN substr(b.cct,3,3) = 'FTV'

      when substr(a.cct,4,2) in ('ML','CL','EJ','RB','EE','IV','BT','LA','CO') THEN substr(b.cct,3,3) = 'FSE'
      when substr(a.cct,4,2) in ('BA','MC') THEN substr(b.cct,3,3) = 'FZE'
      end
      order by b.zona_escolar";

      $this->get_results_from_query();

      $i=1;
      $lista=NULL;

      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["ccta"]));
        $obj->cct_supervision=utf8_encode($value["cct_supervision"]);

        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }


    /**
    * Metodo para correcion de datos de Mexico de atributos una escuelaconsultar el cve_centro con jefatura de sector
    * Creado por Ing. Cristina Estrada Ruiz
    * Fecha de creacion: 19/10/2017
    */
    public function cct_jefatura($cct=NULL) {
      $this->query="select a.cct as ccta, a.zona_escolar as zonaa, a.jefatura_de_sector as sectora, a.sostenimiento as sosta,
      c.cct as cct_jefatura, c.zona_escolar as zonac, c.jefatura_de_sector as sectorc, c.sostenimiento as sostc
      from vista_cct a
      left join vista_cct c on a.jefatura_de_sector = c.jefatura_de_sector
      where a.cct = '$cct' and 
      case
      when a.sostenimiento = '24' then c.sostenimiento = '24'
      when a.sostenimiento in ('21','22','61') then c.sostenimiento = '21'
      end and
      case
      when substr(a.cct,4,2) = 'JN' THEN substr(c.cct,3,3) = 'FJZ'
      when substr(a.cct,4,2) = 'PR' THEN substr(c.cct,3,3) = 'FJS'
      when substr(a.cct,4,2) = 'ES' THEN substr(c.cct,3,3) = 'FJE'
      when substr(a.cct,4,2) = 'ST' THEN if(a.sostenimiento in ('21','22','61'),substr(c.cct,3,3) = 'FJE' ,'')
      when substr(a.cct,4,2) = 'TV' THEN substr(c.cct,3,3) = 'FTS'

      when substr(a.cct,4,2) in ('ML','CL','EJ','RB','EE','IV','BT','LA','CO') THEN substr(c.cct,3,3) = 'FEJ'
      end";

      $this->get_results_from_query();

      $i=1;
      $lista=NULL;

      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["ccta"]));
        $obj->cct_jefatura=utf8_encode($value["cct_jefatura"]);

        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }


    public function masivo_ws() {

        //QUERY PARA CLAUSURA
      $this->query="SELECT *
      FROM vista_cct
      WHERE `status` IN ('2','3')";

      $this->get_results_from_query();
      $i=1;
      $lista=NULL;
      foreach ($this->rows as $key => $value) {
        $obj = new centro_educativo;
        $obj->setCve_centro(utf8_encode($value["cct"]));
        $obj->setCve_tipo_centro(utf8_encode($value["tipo_centro"]));
        $obj->tipo_centro=utf8_encode($value["desc_tipo_centro"]);
        $obj->setCve_motivo(utf8_encode($value["motivo_uno"]));
        $obj->motivo=utf8_encode($value["desc_motivo_uno"]);
        $obj->setCve_motivo_dos(utf8_encode($value["motivo_dos"]));           
        $obj->motivo_dos=utf8_encode($value["desc_motivo_dos"]);
        $obj->setCve_turno(utf8_encode($value["turno"]));
        $obj->turno=utf8_encode($value["desc_turno"]);
        $obj->setCve_servicio(utf8_encode($value["servicio"]));
        $obj->servicio=utf8_encode($value["desc_servicio"]);
        $obj->setCve_sostenimiento(utf8_encode($value["sostenimiento"]));
        $obj->sostenimiento=utf8_encode($value["desc_sostenimiento"]);
        $obj->setCve_dependencia_normativa(utf8_encode($value["dependencia_normativa"]));
        $obj->dependencia_normativa=utf8_encode($value["desc_dependencia_normativa"]);
        $obj->setCve_dependencia_administrativa(utf8_encode($value["dependencia_administrativa"]));
        $obj->dependencia_administrativa=utf8_encode($value["desc_dependencia_administrativa"]);
        $obj->setCve_tipo_educacion(utf8_encode($value["tipo_educacion"]));
        $obj->tipo_educacion=utf8_encode($value["desc_tipo_educacion"]);
        $obj->setCve_nivel_educativo(utf8_encode($value["nivel_educativo"]));
        $obj->nivel_educativo=utf8_encode($value["desc_nivel_educativo"]);
        $obj->setCve_subnivel_educativo(utf8_encode($value["subnivel_educativo"]));
        $obj->subnivel_educativo=utf8_encode($value["desc_subnivel_educativo"]);
        $obj->setCve_migracion_servicio(utf8_encode($value["servicio_administrativo"]));
        $obj->migracion_servicio=utf8_encode($value["desc_servicio_administrativo"]);
        $obj->setCve_tipo_biblioteca(utf8_encode($value["cve_tipo_biblioteca"]));
        $obj->tipo_biblioteca=utf8_encode($value["tipo_biblioteca"]);
        $obj->setNombre_centro(utf8_encode($value["nombre"]));
        $obj->setCve_estatus(utf8_encode($value["status"]));
        $obj->estatus=utf8_encode($value["desc_status"]);            
        $obj->setZona_escolar(utf8_encode($value["zona_escolar"]));
        $obj->setSector(utf8_encode($value["jefatura_de_sector"]));
        $obj->setCve_inmueble(utf8_encode($value["clave_inmueble"]));
        $obj->cve_region=(utf8_encode($value["region"]));
        $obj->region=(utf8_encode($value["des_region"]));
        $obj->cve_centro_almacen=(utf8_encode($value["cve_centro_almacen"]));
        $obj->cve_subregion=(utf8_encode($value["subregion"]));
        $obj->subregion=(utf8_encode($value["des_subregion"]));
        $obj->cve_centro_regional=(utf8_encode($value["cve_centro_regional"]));
        $obj->cve_municipio=(utf8_encode($value["municipio"]));
        $obj->municipio=(utf8_encode($value["nombre_de_municipio"]));
        $obj->zona_economica=(utf8_encode($value["zona_economica"]));
        $obj->cve_localidad=(utf8_encode($value["localidad"]));
        $obj->localidad=(utf8_encode($value["nombre_de_localidad"]));
        $obj->cve_ambito=(utf8_encode($value["categoria_poblacion"]));
        $obj->ambito=(utf8_encode($value["desc_categoria_poblacion"]));
        $obj->cve_tipo_asentamiento=(utf8_encode($value["cve_tipo_asentamiento"]));
        $obj->tipo_asentamiento=(utf8_encode($value["tipo_asentamiento"]));
        $obj->cve_asentamiento=(utf8_encode($value["cve_asentamiento"]));
        $obj->asentamiento=(utf8_encode($value["asentamiento"]));
        $obj->codigo_postal=(utf8_encode($value["codigo_postal"]));
        $obj->cve_tipo_vialidad_principal=(utf8_encode($value["cve_tipo_vialidad_principal"]));
        $obj->tipo_vialidad_principal=(utf8_encode($value["tipo_vialidad_principal"]));
        $obj->nombre_vialidad_principal=(utf8_encode($value["nombre_vialidad_principal"]));
        $obj->cve_tipo_vialidad_izquierda=(utf8_encode($value["cve_tipo_vialidad_izquierda"]));
        $obj->tipo_vialidad_izquierda=(utf8_encode($value["tipo_vialidad_izquierda"]));
        $obj->nombre_vialidad_izquierda=(utf8_encode($value["nombre_vialidad_izquierda"]));
        $obj->cve_tipo_vialidad_derecha=(utf8_encode($value["cve_tipo_vialidad_derecha"]));
        $obj->tipo_vialidad_derecha=(utf8_encode($value["tipo_vialidad_derecha"]));
        $obj->nombre_vialidad_derecha=(utf8_encode($value["nombre_vialidad_derecha"]));
        $obj->cve_tipo_vialidad_posterior=(utf8_encode($value["cve_tipo_vialidad_posterior"]));
        $obj->tipo_vialidad_posterior=(utf8_encode($value["tipo_vialidad_posterior"]));
        $obj->nombre_vialidad_posterior=(utf8_encode($value["nombre_vialidad_posterior"]));
        $obj->numero_exterior=(utf8_encode($value["numero_exterior"]));
        $obj->numero_interior=(utf8_encode($value["numero_interior"]));
        $obj->descripcion_ubicacion=(utf8_encode($value["descripcion_ubicacion"]));
        $obj->carta_topografica=(utf8_encode($value["carta_topografica"]));
        $obj->ageb=(utf8_encode($value["ageb"]));
        $obj->latitud=(utf8_encode($value["latitud"]));
        $obj->longitud=(utf8_encode($value["longitud"]));
        $obj->altitud=(utf8_encode($value["altitud"]));
        $obj->setCve_institucional(utf8_encode($value["clave_institucional"]));
        $obj->setCve_pagaduria(utf8_encode($value["pagaduria"]));
        $obj->ubicacion=utf8_encode($value["desc_pagaduria"]);
        $obj->lada=utf8_encode($value["lada"]);
        $obj->telefono_uno=utf8_encode($value["telefono_uno"]);
        $obj->extension_uno=utf8_encode($value["extension_uno"]);
        $obj->telefono_dos=utf8_encode($value["telefono_dos"]);
        $obj->extension_dos=utf8_encode($value["extension_dos"]);
        $obj->telefono_tres=utf8_encode($value["telefono_tres"]);
        $obj->extension_tres=utf8_encode($value["extension_tres"]);
        $obj->celular_uno=utf8_encode($value["celular_uno"]);
        $obj->celular_dos=utf8_encode($value["celular_dos"]);
        $obj->celular_tres=utf8_encode($value["celular_tres"]);
        $obj->correo_electronico=utf8_encode($value["correo_electronico"]);
        $obj->pagina_web=utf8_encode($value["pagina_web"]);
        $obj->razon_social=utf8_encode($value["razon_social"]);
        $obj->apoderado_legal=utf8_encode($value["apoderado_legal"]);
        $obj->cve_tipo_director=utf8_encode($value["cve_tipo_director"]);
        $obj->tipo_director=utf8_encode($value["tipo_director"]);
        $obj->cve_pais=utf8_encode($value["pais_director"]);
        $obj->nombre_pais=utf8_encode($value["desc_pais_director"]);
        $obj->cve_estado=utf8_encode($value["estado_director"]);
        $obj->nombre_estado=utf8_encode($value["desc_estado_director"]);
        $obj->rfc=utf8_encode($value["rfc_director"]);
        $obj->curp=utf8_encode($value["curp_director"]);
        $obj->nombre=utf8_encode($value["nombre_director"]);
        $obj->apellido_paterno=utf8_encode($value["apellido_paterno_director"]);
        $obj->apellido_materno=utf8_encode($value["apellido_materno_director"]);
        $obj->fecha_nacimiento=utf8_encode($value["fecha_nacimiento_director"]);           
        $obj->sexo=utf8_encode($value["sexo_director"]);
        $obj->telefono_oficina=utf8_encode($value["telefono_oficina_director"]);
        $obj->telefono_particular=utf8_encode($value["telefono_particular_director"]);
        $obj->telefono_celular=utf8_encode($value["telefono_celular_director"]);
        $obj->correo_electronico_institucional=utf8_encode($value["correo_electronico_institucional_director"]);
        $obj->correo_electronico_personal=utf8_encode($value["correo_electronico_personal_director"]);
        $obj->setCve_tipo_modalidad(utf8_encode($value["modalidad"]));
        $obj->modalidad=utf8_encode($value["desc_modalidad"]);
        $obj->setFolio_cct_nm(utf8_encode($value["folio_cct_nm"]));
        $obj->setFecha_fundacion(utf8_encode($value["fecha_fundacion"]));
        $obj->setFecha_alta(utf8_encode($value["fecha_alta"]));
        $obj->setFecha_baja(utf8_encode($value["fecha_baja"]));
        $obj->setFecha_clausura(utf8_encode($value["fecha_clausura"]));
        $obj->setFecha_reapertura(utf8_encode($value["fecha_reapertura"]));
        $obj->setFecha_cambio(utf8_encode($value["fecha_cambio"]));
        $obj->setFecha_solicitud(utf8_encode($value["fecha_solicitud"]));
        $obj->setFecha_actualizacion(utf8_encode($value["fecha_actualizacion"]));
        $obj->setDescripcion(utf8_encode($value["descripcion"]));
        $obj->setWeb_service(utf8_encode($value["web_service"]));
        $obj->setCve_caracterizan1(utf8_encode($value["cve_caracterizan1"]));
        $obj->setCve_caracterizan2(utf8_encode($value["cve_caracterizan2"]));
        $obj->desc_caract1=utf8_encode($value["caracterizan1"]);
        $obj->desc_caract2=utf8_encode($value["caracterizan2"]);
        $lista[$i]=$obj;
        unset($obj);
        $i++;
      }

      return $lista;
    }


    /**
    * Metodo para actualizar zonas y jefatura
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 24/10/2017
    */
    public function update_zona($cct=NULL, $zona=NULL, $jefatura=NULL, $usuario=NULL) {
      $cve_centro=$this->realescapestring(utf8_decode(mb_strtoupper($cct)));
      $zona_escolar=$this->realescapestring(utf8_decode($zona));
      $sector=$this->realescapestring(utf8_decode($jefatura));
      $cve_usuario=$this->realescapestring(utf8_decode($usuario));

      $this->query="UPDATE centro_educativo
      SET zona_escolar='$zona_escolar', sector='$sector', cve_usuario='$cve_usuario', fecha_actualizacion=NOW()
      WHERE cve_centro='$cve_centro'
      ";

      $this->execute_single_query();
    }

    /**
    * Asignar clave de centro del SIC
    * Creado por Ing. Alfredo Antonio Sanchez Alvarado
    * Fecha de creacion: 07/04/2019
    */
    public function update_sic($cct=NULL, $newcct=NULL) {
      $cct=$this->realescapestring(utf8_decode(mb_strtoupper($cct)));
      $newcct=$this->realescapestring(utf8_decode($newcct));

      $this->query="UPDATE centro_educativo
      SET cve_centro='$newcct'
      WHERE cve_centro='$cct'
      ";

      $this->execute_single_query();
    }


    public function update_sic_director($cct,$newcct){
      $cct=$this->realescapestring($cct);
      $newcct=$this->realescapestring($newcct);
      $this->query="UPDATE director
      SET cve_centro='$newcct'
      WHERE cve_centro='$cct'";
      $this->execute_single_query();
    }
//fin



    public function count_cct($newcct)
    {
      $select = "SELECT COUNT(*) AS permiso
      FROM dato_centro_educativo
      WHERE cve_centro='$newcct';";
      $this->query = $select; 
      $this->get_results_from_query();
      foreach($this->rows as $Key => $value){
        $obj = new StdClass;
        $obj->permiso=$value['permiso'];            
      }         
      return $obj->permiso; 
    }

    public function update_ce_cct($newcct,$correo_electronico){
      $correo_electronico=$this->realescapestring($correo_electronico);
      $newcct=$this->realescapestring($newcct);
      $this->query="UPDATE dato_centro_educativo
      SET cve_centro='$newcct', correo_electronico='$correo_electronico'
      WHERE cve_centro='$newcct'";
     // print_r($this->query);
      $this->execute_single_query();
    }

    public function insert_ce_cct($newcct,$correo_electronico){
      $correo_electronico=$this->realescapestring($correo_electronico);
      $newcct=$this->realescapestring($newcct);
      $this->query="INSERT INTO dato_centro_educativo (cve_centro, correo_electronico)
      VALUES ($newcct, $correo_electronico);";
      $this->execute_single_query();
    }

  }
?>