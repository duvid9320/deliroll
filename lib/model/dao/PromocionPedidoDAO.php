<?php

include_once 'lib/model/dto/PromocionPedido.php';
include_once 'lib/connection/Connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionPedidoDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionPedidoDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    static function getInstance(): PromocionPedidoDAO {
        return is_null(self::$instance) ? (self::$instance = new PromocionPedidoDAO()) : self::$instance;
    }

    public function getPromocionesPedido($idPedido) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM PromocionPedido WHERE idPedido = ?");
            if ($stm->execute([$idPedido]))
                return $stm->fetchAll(PDO::FETCH_CLASS, 'PromocionPedido');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function createPromocionPedido(PromocionPedido $promocionPedido) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("INSERT INTO PromocionPedido VALUES (?,?,?)");
            if ($stm->execute([$promocionPedido->getIdPedido(), $promocionPedido->getIdPromocion(), $promocionPedido->getCantidad()]))
                return true;
            else
                throw new Exception("Información de producto promocion no válida");
            return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

}
