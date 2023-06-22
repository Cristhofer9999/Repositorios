<?php
include("class_c_estados.php");
include("class_db2.php");
class estados_dal extends class_db2{
	
  function __construct()
  {
    parent::__construct();
  }

  function __destruct()
  {

  }
  //*********************************************************************************
	//*********************************************************************************
  //Obtener listado
  function listado(){
      $this->set_sql("select * from cebasica.estados");

      $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        ?>
        <div class="box-body">
         <div id="estados_wrapper" class="dataTables_wrapper from-inline dt-bootstrap">
           <div class="col-sm-6"></div>
           <div class="col-sm-6"></div>
         </div>
         <div class="row">
          <div class="col-sm-12">
            <table id="estados" class="table table-bordered table-hover dataTable" role="grid" aria-decribedby="estados_info">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="estados" rowspan="1" colspan="1" aria-label="Clave: activate to sort column ascending">
                  Clave
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="estados" rowspan="1" colspan="1" aria-label="Clave Estado: activate to sort column ascending">
                  Clave Estado
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="estados" rowspan="1" colspan="1" aria-label="Nombre de Estado: activate to sort column ascending">
                  Nombre de Estado
                  </th>
                  <th class="sorting_asc" tabindex="0" aria-controls="estados" rowspan="1" colspan="1" aria-label="Código CURP: activate to sort column ascending">
                  Codigo CURP
                  </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="estados" rowspan="1" colspan="1">
                  Editar
                  </th>
                </tr>
              </thead>
      <tbody>
        <?php
        while($renglon = mysqli_fetch_assoc($rs)) {

           $cve_pais=utf8_encode($renglon["cve_pais"]);
           $cve_estado=utf8_encode($renglon["cve_estado"]);
           $nombre_estado=utf8_encode($renglon["nombre_estado"]);
           $codigo_curp=utf8_encode($renglon["codigo_curp"]);
     
          ?>
               
                 <tr role="row" class="odd">
                  <td class="sorting_1"><?=$cve_pais?></td>
                  <td><?=$cve_estado?></td>
                  <td><?=$nombre_estado?></td>
                  <td><?=$codigo_curp?></td>
                  <td><button class="btn btn-success btn-sm" data-toggle="modal" title="Editar" id="btn_editar1" data-target="#Editar_estado" onclick="editarEstados('<?=$cve_pais?>','<?=$cve_estado?>','<?=$nombre_estado?>','<?=$codigo_curp?>')"><i class="fa fa-pencil"></i></button></td>
                 </tr>
              
      <?php
          $i++;
    }
    ?>
     </tbody>
        </table>
     </div>
    </div>
    </div>
    <?php
  }
  //***********************************************************************************************
  function get_datos_all(){
    	  $this->set_sql("select * from cebasica.estados");

    
    	  $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
           	$obj_det = new estados;
           	$obj_det->setCve_pais($renglon["cve_pais"]);
			      $obj_det->setCve_estado($renglon["cve_estado"]);
			      $obj_det->setNombre_estado($renglon["nombre_estado"]);
			      $obj_det->setCodigo_curp($renglon["codigo_curp"]);
	    	    $i++;
			      $lista[$i]=$obj_det;
			      unset($obj_det);
		    }
        return $lista;
  }
  //***********************************************************************************************
  function get_datos_by_pais($pais){
        $this->set_sql("select * from cebasica.estados where cve_pais='$pais'");

        $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new estados;
            $obj_det->setCve_pais($renglon["cve_pais"]);
            $obj_det->setCve_estado($renglon["cve_estado"]);
            $obj_det->setNombre_estado($renglon["nombre_estado"]);
            $obj_det->setCodigo_curp($renglon["codigo_curp"]);
            $i++;
           $lista[$i]=$obj_det;
           unset($obj_det);
        }
        return $lista;
  }
  /*
    // Funcion para mostrar los datos dependiendo de la cve_pais y cve_estado
  */
  function get_datos_by_pais_estado($pais,$cve_estado)
  {
    $this->set_sql("select * from cebasica.estados where cve_pais='$pais' AND cve_estado='$cve_estado'");

        $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new estados;
            $obj_det->setCve_pais($renglon["cve_pais"]);
            $obj_det->setCve_estado($renglon["cve_estado"]);
            $obj_det->setNombre_estado($renglon["nombre_estado"]);
            $obj_det->setCodigo_curp($renglon["codigo_curp"]);
            $i++;
           $lista[$i]=$obj_det;
           unset($obj_det);
        }
        return $lista;
  }
  //*********************************************************************************
  //Mostrar Opciones por tipo de movimiento
  function mostrar_las_opciones_por_pais($pais){
    	$this->set_sql("select * from cebasica.estados where cve_pais='$pais'");

     	$rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
      $total_de_registro = mysqli_num_rows($rs);
      $i=0;
      
      while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new estados;
            $obj_det->setCve_pais($renglon["cve_pais"]);
            $obj_det->setCve_estado($renglon["cve_estado"]);
            $obj_det->setNombre_estado($renglon["nombre_estado"]);
            $obj_det->setCodigo_curp($renglon["codigo_curp"]);
            $i++;
           $lista[$i]=$obj_det;
           unset($obj_det);
        }
        return $lista;
  }

  function mostrar_las_opciones_por_pais_gemelo($pais){
      $this->set_sql("select * from cebasica.estados where cve_pais='$pais'");

      $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
      $total_de_registro = mysqli_num_rows($rs);
      $i=0;
      
      $est= utf8_encode('<option value="">SELECCIONE UNA OPCIÓN</option>');
      while($renglon = mysqli_fetch_assoc($rs)) {
          $cve_pais=$renglon["cve_pais"];
          $cve_estado=$renglon["cve_estado"];
          $descrip=utf8_encode($renglon["nombre_estado"]);
          
          $est.= '<option value="'.$cve_estado.'">'.$descrip.'</option>';
            
          $i++;
      }
      
      print $est;
  }
  //*********************************************************************************
  //Obtener listado
  function mostrar_las_opciones_por_tipo_de_movimiento_y_seleccionar($pais,$estado){
    	 $this->set_sql("select * from cebasica.estados where cve_pais='$pais'");
    
    	 $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
       $total_de_registro = mysqli_num_rows($rs);
       $i=0;
       print "<select class='form-control' name='f_cve_estado' id='f_cve_estado'>";
       while($renglon = mysqli_fetch_assoc($rs)) {
        	$cve_pais=$renglon["cve_pais"];
          $cve_estado=$renglon["cve_estado"];
        	$descrip=utf8_encode($renglon["nombre_estado"]);
        	?>
           	<option value="<?=$cve_estado?>" <?php if ($cve_estado==$estado){print "selected";}?>><?=$descrip?></option>
            <?php
        	$i++;
		   }
		    print "</select>";
  }

  function mostrar_las_opciones_por_pais_y_estado_disabled($pais,$estado){
    	 $this->set_sql("select * from cebasica.estados where cve_pais='$pais' and cve_estado='$estado'");
    
    	 $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
       $total_de_registro = mysqli_num_rows($rs);
       $i=0;
       print "<select class='form-control' name='f_cve_estado' id='f_cve_estado' disabled>";
       while($renglon = mysqli_fetch_assoc($rs)) {
        	$cve_pais=$renglon["cve_pais"];
          $cve_estado=$renglon["cve_estado"];
        	$descrip=utf8_encode($renglon["nombre_estado"]);
        	?>
           	<option value="<?=$cve_estado?>" <?php if ($cve_estado==$estado){print "selected";}?>><?=$descrip?></option>
            <?php
        	$i++;
		   }
		    print "</select>";
  }

  /*
    Funcion para obtener el codigo curp en base al cve_estado y al cve_pais
  */
  function obtener_codigo_curp_by_estado($cve_estado,$cve_pais)
  {
      $this->set_sql("select codigo_curp from cebasica.estados where cve_estado='$cve_estado' and cve_pais='$cve_pais'");

      $rs = mysqli_query( $this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
      $total_de_registro = mysqli_num_rows($rs);
      $i=0;
      while($renglon = mysqli_fetch_assoc($rs)) {
          $codigo =$renglon["codigo_curp"];
          $i++;
       }
       return $codigo;
  }

  /*
    Funcion para obtener el nombre del estado 
  */
	function getNombreEstado($cve_pais,$cve_estado){
  		  $sql = "select nombre_estado from cebasica.estados ";
        $sql .= "where cve_pais ='$cve_pais' and cve_estado='$cve_estado'";

	   	  $this->set_sql($sql);
    
    	  $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_estados = mysqli_num_rows($rs);
        
        if ($total_de_estados==1){
        	$renglon= mysqli_fetch_array($rs);
        	$descripcion_estado= $renglon[0];
        }
        else{
        	$descripcion_estado='Sin Descripción';
        }
        
        return $descripcion_estado;
  	}
    /*
    Funcion para obtener el nombre del estado 
  */
  function getNombreEstado_by_codigo_curp($cve_pais,$cve_curp){
        $sql = "SELECT * from cebasica.estados where cve_pais ='$cve_pais' and codigo_curp='$cve_curp'";
       
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query ) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_registro>0){
            $obj_det = new estados;
            $obj_det->setCve_pais($renglon["cve_pais"]);
            $obj_det->setCve_estado($renglon["cve_estado"]);
            $obj_det->setNombre_estado($renglon["nombre_estado"]);
            $obj_det->setCodigo_curp($renglon["codigo_curp"]);
        }
        return $obj_det;
    }
    //*********************************************************************************
  //Insertar
    function insertar($obj){

      $sql = "insert into cebasica.estados (";
      $sql .= "cve_pais,";
      $sql .= "cve_estado, ";
      $sql .= "nombre_estado, ";
      $sql .= "codigo_curp ";

      $sql .= ") ";
      $sql .= "values(";
      $sql .= "'{$obj->getCve_pais()}' ,";
      $sql .= "'{$obj->getCve_estado()}', ";
      $sql .= "'{$obj->getNombre_estado()}', ";
      $sql .= "'{$obj->getCodigo_curp()}' ";

      $sql .= ")";


      $this->set_sql($sql);

      mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

      if(mysqli_affected_rows($this->db_conn)==1) {
         $insertado=1;
      }else{
         $insertado=0;
      }

    return $insertado;
    }
    //*********************************************************************************
    //Actualizar
    function actualizar($obj){

      $sql = "update cebasica.estados set ";
      $sql .= "nombre_estado='{$obj->getNombre_estado()}', ";
      $sql .= "codigo_curp='{$obj->getCodigo_curp()}' ";
      $sql .= "where cve_pais ='{$obj->getCve_pais()}'";
      $sql .= "and cve_estado='{$obj->getCve_estado()}' ";

      $this->set_sql($sql);
    
      mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
      if(mysqli_affected_rows($this->db_conn)==1) {
         $actualizado=1;
      }else{
         $actualizado=0;
      }

     return $actualizado;
    }
    //*********************************************************************************
    //existe
    function existe($cve_pais,$cve_estado,$nombre_estado,$codigo_curp){
      $sql = "select count(*) from cebasica.estados ";
      $sql .= "where cve_pais='$cve_pais'  ";
      $sql .= "and cve_estado='$cve_estado'  ";
      $sql .= "and nombre_estado='$nombre_estado'  ";
      $sql .= "and codigo_curp='$codigo_curp'  ";

      $this->set_sql($sql);
       
      $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
}
}
?>