<?php

include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Articulo.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    public static function getInstance(): ProductoDAO {
        return is_null(self::$instance) ? (self::$instance = new ProductoDAO()) : self::$instance;
    }

    public function getProductoById($id) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM articulos WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetchObject('Articulo');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function getArticulosDisponiblesByCategoria($categoria) {
        return parent::getConn()->getDataObjects("SELECT * from articulos WHERE idCategoria = '$categoria' AND estado = '1'", "Articulo");
    }

}
