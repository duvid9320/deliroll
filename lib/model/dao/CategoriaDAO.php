<?php
include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Categoria.php';
include_once 'lib/model/dao/GenericDAO.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class CategoriaDAO extends GenericDAO{
    private static $instance;
    
    public function __construct() {
        parent::__construct();
    }
    
    public static function getInstance() : CategoriaDAO{
        return is_null(self::$instance) ? (self::$instance = new CategoriaDAO()) : self::$instance;
    }    
    
    public function getCategoriaById($id){
        try {
            $stm = $this->getConn()->getPDO()->prepare("SELECT * FROM categoria WHERE id = ?");
            $stm->execute([$id]);
            return $stm->fetchObject('Categoria');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }
    
    public function getAll(){
        return parent::getConn()->getDataObjects("select * from categoria","Categoria");
    }
}
