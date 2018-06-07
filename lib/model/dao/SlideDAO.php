<?php
include_once 'lib/model/dto/Slide.php';
include_once 'lib/model/dao/GenericDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlideDAO
 *
 * @author Dave
 */
class SlideDAO extends GenericDAO{
    private static $instance;
    
    public function __construct() {
        parent::__construct();
    }
    
    public static function getInstance() : SlideDAO{
        return is_null(self::$instance) ? (self::$instance = new SlideDAO()) : self::$instance;
    }
    
    public function getImages(){
        return parent::getConn()->getDataObjects("select * from slide order by orden","Slide");
    }
}
