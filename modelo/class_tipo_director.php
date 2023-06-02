<?php
if(class_exists('tipo_director')!=true)
{
    class tipo_director{
        public $cve_tipo_director;
        public $tipo_director;


                //Constructor
                public function __construct
                (
            $cve_tipo_director=NULL,
            $tipo_director=NULL
                )

                {
            $this->cve_tipo_director=$cve_tipo_director;
            $this->tipo_director=$tipo_director;
                
        }//End Constructor

   }//end class
}//avoid redefine class
?>