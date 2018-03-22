<?php

include_once 'lib/model/dao/CategoriaDAO.php';
include_once 'lib/view/CategoriaView.php';
include_once 'lib/view/ProductoView.php';
include_once 'lib/model/dao/ProductoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class MenuController {
    public function showCategorias(){
        $view = new CategoriaView();
        $dao = new CategoriaDAO();
        $view->showCategorias($dao->getAll());
    }
    
    public function showProductosCategoria($idCategoria){
        $view = new ProductoView();
        $productoDAO = new ProductoDAO();
        $view->showProductos($productoDAO->getProductosCategoria($idCategoria));
    }
}
