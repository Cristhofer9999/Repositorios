<?php
    include('class_tipo_director.php');
    include('class_db.php');
    class tipo_director_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }
        
        function obtener_lista_tipo_director(){
            $sql="select * from tipo_director";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($rs);
            $obj_det=null;
            if ($total_cursos>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det= new tipo_director(
                        $renglon["cve_tipo_director"],
                        $renglon["tipo_director"]
                    );
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }
                return $lista;
            }
        }

    }

?>