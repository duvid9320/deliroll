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
    
    public function __construct() {
    }
    
    public function getAll(){
        return Connection::getInstance()->getDataObjects("select * from Categoria","Categoria");
    }
}
