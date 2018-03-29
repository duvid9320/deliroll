<?php

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
    
    public function __construct() {
        ;
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
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDetalles($detalles) {
        $this->detalles = $detalles;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }
}
