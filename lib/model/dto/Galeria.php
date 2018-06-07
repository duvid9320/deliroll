<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Galeria
 *
 * @author Dave
 */
class Galeria {
    private $id;
    private $ruta;
    private $orden;
    
    public function __construct() {
        ;
    }
    
    function getId() {
        return $this->id;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getOrden() {
        return $this->orden;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }
}
