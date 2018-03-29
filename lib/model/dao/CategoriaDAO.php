<?php
include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Categoria.php';


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
class CategoriaDAO {
    private static $instance;
    
    private function __construct() {
    }
    
    public static function getInstance() : CategoriaDAO{
        return is_null(self::$instance) ? (self::$instance = new CategoriaDAO()) : self::$instance;
    }    
    
    public function getCategoriaById($id){
        $stm = Connection::getInstance()->getPDO()->prepare("SELECT * FROM Categoria WHERE idCategoria = ?");
        $stm->execute([$id]);
        return $stm->fetchObject('Categoria');
    }
    
    public function getAll(){
        return Connection::getInstance()->getDataObjects("select * from Categoria","Categoria");
    }
}
