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
class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $estado;
    private $idCategoria;
    private $imagen;
    
    private $categoria;
    
    public function __construct() {
    }
    
    function getCategoria() : Categoria{
        return is_null($this->categoria) ? ($this->categoria = CategoriaDAO::getInstance()->getCategoriaById($this->idCategoria)) : $this->categoria;
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

    function getIdCategoria() {
        return $this->idCategoria;
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

    function setIdCategoria($categoria) {
        $this->idCategoria= $categoria;
    }
    
    function getImagen() {
        return $this->imagen;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
}
