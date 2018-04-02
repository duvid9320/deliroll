<?php
include_once 'lib/utils/drfunctions.php';
include_once 'lib/model/dao/ClienteDAO.php';
include_once 'lib/model/dao/ProductoPedidoDAO.php';
include_once 'lib/model/dao/PromocionPedidoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class Pedido {
    private $idPedido;
    private $fecha;
    private $idCliente;
    private $estado;
    private $tipo;
    private $detalles;
    private $costo;
    
    private $cliente;
    private $productosPedido;
    private $promosPedido;
    public function __construct() {
        if(isEmpty($this->idPedido) )
            return;
        $this->cliente = ClienteDAO::getInstance ()->readClient ($this->idCliente);
        $this->productosPedido = ProductoPedidoDAO::getInstance()->getProductosPedido($this->idPedido);
        $this->promosPedido = PromocionPedidoDAO::getInstance()->getPromocionesPedido($this->idPedido);
    }
    
    function getCliente() : Cliente{
        return $this->cliente;
    }

    function getProductosPedido() {
        return $this->productosPedido;
    }

    function getPromosPedido() {
        return $this->promosPedido;
    }
    
    public function __toString() {
        return "idPedido: $this->idPedido<br>Fecha: $this->fecha<br>idCliente: $this->idCliente<br>Estado: $this->estado<br>Tipo: $this->tipo<br>Detalles: $this->detalles<br>Total: $this->costo<br>";
    }
    
    function getIdPedido() {
        return $this->idPedido;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDetalles() {
        return $this->detalles;
    }

    function getCosto() {
        return $this->costo;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
        return $this;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
        return $this;
    }

    function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    function setDetalles($detalles) {
        $this->detalles = $detalles;
        return $this;
    }

    function setCosto($costo) {
        $this->costo = $costo;
        return $this;
    }
    
}
