<?php

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
    public function __construct() {
        ;
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
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}
