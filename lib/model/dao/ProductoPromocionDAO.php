<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPromocionDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPromocionDAO extends GenericDAO{
    private static $instance;
    
    public function __construct() {
        parent::__construct();
    }
    
    public static function getInstance() : ProductoPromocionDAO{
        return is_null(self::$instance) ? (self::$instance = new ProductoPromocionDAO()) : self::$instance;
    }

    public function getProductosPromocion($idPromocion){
        return parent::getConn()->getDataObjects("SELECT * FROM ProductoPromocion WHERE idPromocion = '$idPromocion'",'ProductoPromocion');
    }
}
