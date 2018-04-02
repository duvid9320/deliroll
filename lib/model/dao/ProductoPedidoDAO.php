<?php

include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/connection/Connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPedidoDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPedidoDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    static function getInstance(): ProductoPedidoDAO {
        return is_null(self::$instance) ? (self::$instance = new ProductoPedidoDAO()) : self::$instance;
    }

    public function getProductosPedido($idPedido) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM ProductoPedido WHERE idPedido = ?");
            if($stm->execute([$idPedido]))
                return $stm->fetchAll (PDO::FETCH_CLASS, 'ProductoPedido');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }
    
    public function createProductoPedido(ProductoPedido $productoPedido) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("INSERT INTO ProductoPedido VALUES (?,?,?)");
            if ($stm->execute([$productoPedido->getIdProducto(), $productoPedido->getIdPedido(), $productoPedido->getCantidad()]))
                return true;
            else
                throw new Exception("Información de producto pedido no válida");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
        return false;
    }

}
