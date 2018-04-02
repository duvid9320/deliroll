<?php

include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Producto.php';
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
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM Producto WHERE idProducto = ?");
            $stm->execute([$id]);
            return $stm->fetchObject('Producto');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function getProductosCategoria($categoria) {
        return parent::getConn()->getDataObjects("SELECT * from Producto WHERE idCategoria = '$categoria'", "Producto");
    }

}
