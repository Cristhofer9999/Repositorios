<?php
   // include("class_director.php");
    include("class_db.php");

    class centro_dal extends class_db
    {
        function __construct()
        {
            parent::__construct();
        }

        function __destruct()
        {
            parent:: __destruct();
        }
        
        function datosCentroCct($cct)
        {
            $cct=$this->db_conn->real_escape_string($cct);

           // $sql = "select * from director ";
           // $sql .= "where cve_centro = '$cct'";
           $sql ="SELECT
           ce.cve_centro, ce.nombre_centro, ce.cve_turno, ce.cve_sostenimiento,
           dc.calle, dc.cve_localidad, lo.localidad,
           cc.nombre_colonia,
           es.estatus, 
           so.sostenimiento,
           mu.cve_municipio, mu.municipio, 
           ne.nivel_educativo
           FROM  centro_educativo AS ce 
           JOIN dato_centro_educativo AS dc ON ce.cve_centro = dc.cve_centro
           JOIN estatus AS es ON ce.cve_estatus = es.cve_estatus
           JOIN municipio AS mu ON dc.cve_municipio = mu.cve_municipio
           JOIN nivel_educativo AS ne ON ce.cve_nivel_educativo = ne.cve_nivel_educativo
           JOIN localidad AS lo ON dc.cve_localidad = lo.cve_localidad AND dc.cve_municipio = lo.cve_municipio
           JOIN dependencia_administrativa AS dp ON ce.cve_dependencia_administrativa = dp.cve_dependencia_administrativa
           JOIN sostenimiento AS so ON ce.cve_sostenimiento = so.cve_sostenimiento AND ce.cve_dependencia_administrativa = so.cve_dependencia_administrativa AND( substr( ce.cve_centro, 3, 1 ) = so.cve_clasificador ) and dp.cve_dependencia_administrativa = so.cve_dependencia_administrativa
           JOIN cat_colonias_luna AS cc ON dc.cve_incr_cp = cc.cve_incr_cp
           WHERE ce.cve_centro = '$cct' ";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $arr = mysqli_fetch_array($rs);

            return $arr;
        }
    
    
        function get_entidad_nac_director($cve_pais,$cve_estado){
            $cve_pais=$this->db_conn->real_escape_string($cve_pais);
            $cve_estado=$this->db_conn->real_escape_string($cve_estado);
            $sql="select nombre_estado from cebasica.estados where 
            cve_pais='$cve_pais' and cve_estado='$cve_estado'";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $valor=$renglon[0];
            return $valor;
        }

        function get_pais_nac_director($cve_pais,$cve_estado){
            $cve_pais=$this->db_conn->real_escape_string($cve_pais);
            $sql="select nombre_pais from cebasica.pais_continente where 
            cve_pais='$cve_pais'";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $valor=$renglon[0];
            
            if ($cve_estado>32){
                return 'PAIS EXTRANJERO';
            }
            else{
                return $valor;
            }
            
        }
    
    }

?>