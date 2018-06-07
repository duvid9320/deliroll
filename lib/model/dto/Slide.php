<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slide
 *
 * @author Dave
 */
class Slide {
    private $id;
    private $ruta;
    private $titulo;
    private $descripcion;
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

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
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

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }
}
