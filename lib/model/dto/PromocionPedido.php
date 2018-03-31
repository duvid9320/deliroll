<?php
include_once 'lib/model/dto/Pedido.php';
include_once 'lib/model/dao/PedidoDAO.php';
include_once 'lib/model/dto/Promocion.php';
include_once 'lib/model/dao/PromocionDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionPedido
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionPedido {
    private $idPedido;
    private $idPromocion;
    private $cantidad;
    
    private $pedido;
    private $promocion;
    
    public function __construct() {
        ;
    }
    
    public function getSubTotal() {
        return doubleval($this->cantidad * $this->getPromocion()->getTotal());
    }
    
    public function getPedido() : Pedido {
        return is_null($this->pedido) ? ($this->pedido = PedidoDAO::getInstance()->getPedidoById($this->idPedido)) : $this->pedido;
    }
    
    public function getPromocion() : Promocion {
        return is_null($this->promocion) ? ($this->promocion = PromocionDAO::getInstance()->getPromocionById($this->idPromocion)) : $this->promocion;
    }
    
    function getIdPedido() {
        return $this->idPedido;
    }

    function getIdPromocion() {
        return $this->idPromocion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
        return $this;
    }

    function setIdPromocion($idPromocion) {
        $this->idPromocion = $idPromocion;
        return $this;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
        return $this;
    }
}
