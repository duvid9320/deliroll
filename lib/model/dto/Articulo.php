<?php
include_once 'Categoria.php';
include_once 'lib/model/dao/CategoriaDAO.php';
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
class Articulo {
    private $id;
    private $titulo;
    private $introduccion;
    private $ruta;
    private $contenido;
    private $orden;
    private $precio;
    private $estado;
    private $idCategoria;
    
    public function __construct() {
    }
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getIntroduccion() {
        return $this->introduccion;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getOrden() {
        return $this->orden;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIntroduccion($introduccion) {
        $this->introduccion = $introduccion;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setOrden($orden) {
        $this->orden = $orden;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }
}
