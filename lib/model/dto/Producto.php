<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $estado;
    private $categoria;
    private $imagen;
    
    public function __construct() {
    }
    
    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    function getImagen() {
        return $this->imagen;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
}
