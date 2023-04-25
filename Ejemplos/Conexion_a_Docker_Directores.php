<?php
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

//clase conexion a la bd
if (class_exists("class_db")!=true){
	class class_db{
		var $db_conn;
		var $db_name;
		var $db_query;

		function __construct(){
			$this->set_db("172.23.125.147:3306" , "root" , "root" ,"Prueba");
			//$this->set_db("172.20.30.251" , "destadistica_usr" , "c0nsult4" ,"centros_educativos");
			#echo "Error: Si se pudo conectar a MySQL." . PHP_EOL;
		}

		function __destruct(){
			$this->close_db();
		}

		function set_db($host,$user,$passwd,$db){
			if (!isset($this->db_conn)){
				$this->db_conn=mysqli_connect($host,$user,$passwd,$db);
			 	$this->db_conn-> set_charset("utf8");
				$this->db_name=$db;

				if (!$this->db_conn) {
				    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
				    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				    exit;
				}
				else{
					
					echo "Si se conecto ";

				}

			}
		}

		function close_db(){
			if (isset($db_conn)){
				mysqli_close($db_conn);
			}
		}


		function set_sql($sql){
			$this->db_query=$sql;
		}

	}//end class
}//evitar la redefinicion de clase
?>