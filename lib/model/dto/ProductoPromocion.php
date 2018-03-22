<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPromocion
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPromocion {
    private $idProducto;
    private $idPromocion;
    private $precioUnitario;
    
    public function __construct() {
        ;
    }
    
    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdPromocion() {
        return $this->idPromocion;
    }

    function getPrecioUnitario() {
        return $this->precioUnitario;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setIdPromocion($idPromocion) {
        $this->idPromocion = $idPromocion;
    }

    function setPrecioUnitario($precioUnitario) {
        $this->precioUnitario = $precioUnitario;
    }
}
