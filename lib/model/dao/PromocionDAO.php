<?php

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
class PromocionDAO {
    
    public function __construct() {
        ;
    }
    
    public function getPromociones(){
        return Connection::getInstance()->getDataObjects("select * from Promocion", "Promocion");
    }
}
