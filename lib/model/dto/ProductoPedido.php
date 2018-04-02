<?php
include_once 'Producto.php';
include_once 'lib/model/dao/ProductoDAO.php';
include_once 'Pedido.php';
include_once 'lib/model/dao/PedidoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPedido
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPedido {
    private $idProducto;
    private $idPedido;
    private $cantidad;
    
    private $producto;
    private $pedido;
    
    public function __construct() {
    }
    
    public function getSubTotal() {
        return doubleval($this->getProducto()->getPrecio() * $this->getCantidad());
    }
    
    public function getProducto() : Producto{
        return is_null($this->producto) ? ($this->producto = ProductoDAO::getInstance()->getProductoById($this->idProducto)) : $this->producto;
    }
    
    public function getPedido() : Pedido {
        return is_null($this->pedido) ? ($this->pedido = PedidoDAO::getInstance()->getPedidoById($this->idPedido)) : $this->pedido;
    }
    
    function getIdProducto() {
        return $this->idProducto;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
        return $this;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
        return $this;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
        return $this;
    }
}
