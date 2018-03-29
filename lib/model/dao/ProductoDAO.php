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
class ProductoDAO {
    private static $instance;
    
    private function __construct() {
    }
    
    public static function getInstance() : ProductoDAO{
        return is_null(self::$instance) ? (self::$instance = new ProductoDAO()) : self::$instance;
    }
    
    public function getProductoById($id){
        $stm = Connection::getInstance()->getPDO()->prepare("SELECT * FROM Producto WHERE idProducto = ?");
        $stm->execute([$id]);
        return $stm->fetchObject('Producto');
    }
    public function getProductosCategoria($categoria){
        return Connection::getInstance()->getDataObjects(
                "SELECT * from Producto WHERE idCategoria = '$categoria'", 
                "Producto"
                );
    }
}
