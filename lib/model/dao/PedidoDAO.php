<?php

include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Pedido.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PedidoDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    public static function getInstance(): PedidoDAO {
        return is_null(self::$instance) ? (self::$instance = new PedidoDAO()) : self::$instance;
    }

    public function getPedidoById($id) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM Pedido WHERE idPedido = ?");
            $stm->execute([$id]);
            return $stm->fetchObject('Pedido');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function savePedido(Pedido &$pedido) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("INSERT INTO Pedido (fecha, idCliente, estado, tipo, detalles, costo) VALUES (?,?,?,?,?,?)");
            if ($stm->execute([$pedido->getFecha(), $pedido->getIdCliente(), $pedido->getEstado() ? 1 : 0, $pedido->getTipo(), $pedido->getDetalles(), $pedido->getCosto()]) && $stm->rowCount() > 0)
                $pedido->setIdPedido(parent::getConn()->getPDO()->lastInsertId());
            else
                throw new Exception("Información del pedido no válida");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
        return true;
    }
}
