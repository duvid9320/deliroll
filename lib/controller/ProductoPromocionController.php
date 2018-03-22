<?php
include_once 'lib/model/dao/ProductoDAO.php';
include_once 'lib/model/dao/ProductoPromocionDAO.php';
include_once 'lib/view/ProductoPromocionView.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPromocionController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPromocionController {
    
    public function showProductosPromocion(Promocion $promocion){
        $productoDAO = new ProductoDAO();
        $productoPromocionDAO = new ProductoPromocionDAO();
        $productoPromocionView = new ProductoPromocionView();
        foreach ($productoPromocionDAO->getProductosPromocion($promocion->getIdPromocion()) as $productoPromocion) 
            $productoPromocionView->showProductoPromocion($productoPromocion, $productoDAO->getProductoById($productoPromocion->getIdProducto()));
    }
}
