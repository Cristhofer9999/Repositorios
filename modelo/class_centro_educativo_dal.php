<?php
include("class_centro_educativo.php");
include("class_db.php");
class centro_educativo_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();
	}

	function existeCct($cct){
        $cct=$this->db_conn->real_escape_string($cct);
  
            $sql = "select count(*) from centro_educativo ";
          $sql .= "where cve_centro='$cct'";
  
             $this->set_sql($sql);
          $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
          $total_de_registro = mysqli_num_rows($rs);
          $renglon= mysqli_fetch_array($rs);
          $cuantos= $renglon[0];
  
          return $cuantos;
        }


}//end class
?>