<?php
class estados {

    protected $cve_pais;
    protected $cve_estado;
    protected $nombre_estado;
    protected $codigo_curp;

    public function setCve_pais($cve_pais) { $this->cve_pais=$cve_pais; }
    public function getCve_pais() { return $this->cve_pais; }

    public function setCve_estado($cve_estado) { $this->cve_estado=$cve_estado; }
    public function getCve_estado() { return $this->cve_estado; }

    public function setNombre_estado($nombre_estado) { $this->nombre_estado=$nombre_estado; }
    public function getNombre_estado() { return $this->nombre_estado; }

    public function setCodigo_curp($codigo_curp) { $this->codigo_curp=$codigo_curp; }
    public function getCodigo_curp() { return $this->codigo_curp; }

}
?>