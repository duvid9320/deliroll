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
    
    public function getProductoById($id){
        $productos = Connection::getInstance()->getDataObjects(
                "SELECT * FROM Producto WHERE idProducto = '$id'", 
                'Producto'
                );
        return $productos != null ? $productos[0] : null;
    }
    public function getProductosCategoria($categoria){
        return Connection::getInstance()->getDataObjects(
                "select * from Producto where categoria = '$categoria'", 
                "Producto"
                );
    }
}
