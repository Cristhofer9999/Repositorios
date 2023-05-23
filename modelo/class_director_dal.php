<?php
    include("class_director.php");
    include("class_db.php");

    class director_dal extends class_db
    {
        function __construct()
        {
            parent::__construct();
        }

        function __destruct()
        {
            parent:: __destruct();
        }
        
        function directorCct($cct)
        {
            $cct=$this->db_conn->real_escape_string($cct);

            $sql = "select * from director ";
            $sql .= "where cve_centro = '$cct'";

            $this->set_sql($sql);
            $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            $arr = mysqli_fetch_array($rs);

            return $arr;

            // if($arr)
            // {
            //     return new self($arr['nombre'], $arr['curp'], $cct);
            // }
            // else
            // {
            //     return false;
            // }
        }
    }
?>