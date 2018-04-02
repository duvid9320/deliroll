<?php

include_once 'lib/model/dto/Promocion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    public function getPromocionById($id) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM Promocion WHERE idPromocion = ?");
            $stm->execute([$id]);
            return $stm->fetchObject('Promocion');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public static function getInstance(): PromocionDAO {
        return is_null(self::$instance) ? (self::$instance = new PromocionDAO()) : self::$instance;
    }

    public function getPromociones() {
        return parent::getConn()->getDataObjects("SELECT * FROM Promocion", "Promocion");
    }

}
