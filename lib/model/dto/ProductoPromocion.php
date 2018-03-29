<?php
include_once 'Producto.php';
include_once 'lib/model/dao/ProductoDAO.php';
include_once 'Promocion.php';
include_once 'lib/model/dao/PromocionDAO.php';
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
    
    private $producto;
    private $promocion;
    
    public function __construct() {
        $this->getProducto();
    }
    
    public function getProducto() : Producto {
        return is_null($this->producto) ? ($this->producto = ProductoDAO::getInstance()->getProductoById($this->idProducto)) : $this->producto;
    }
    
    public function getPromocion() : Promocion {
        return is_null($this->promocion) ? ($this->promocion = PromocionDAO::getInstance()->getPromocionById($this->idPromocion)) : $this->promocion;
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
