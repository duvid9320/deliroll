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
class ProductoPromocionDAO {
    public function __construct() {
        ;
    }
    
    public function getProductosPromocion($idPromocion){
        return Connection::getInstance()->getDataObjects(
                "SELECT * FROM ProductoPromocion WHERE idPromocion = '$idPromocion'",
                'ProductoPromocion'
                );
    }
}
