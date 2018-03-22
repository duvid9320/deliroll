<?php

include_once 'lib/model/dto/ProductoPromocion.php';

/**
 * Description of Promocion
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class Promocion {
    private $idPromocion;
    private $dia;
    private $fechaInicio;
    private $fechaFin;
    private $total;
    private $estado;
    
    
    public function __construct() {
        ;
    }
    
    function getIdPromocion() {
        return $this->idPromocion;
    }

    function getDia() {
        return $this->dia;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getTotal() {
        return $this->total;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdPromocion($idPromocion) {
        $this->idPromocion = $idPromocion;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}
