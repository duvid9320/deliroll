<?php
include_once 'lib/model/dto/Galeria.php';
include_once 'lib/model/dao/GenericDAO.php';
include_once 'lib/connection/Connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GaleriaDAO
 *
 * @author Dave
 */
class GaleriaDAO extends GenericDAO{
    private static $instance;
    
    public function __construct() {
        parent::__construct();
    }
    
    public static function getInstance() : GaleriaDAO{
        return is_null(self::$instance) ? (self::$instance = new GaleriaDAO()) : self::$instance;
    }    
    
    public function getAll() {
        return parent::getConn()->getDataObjects("select * from galeria order by orden","Galeria");
    }
}
