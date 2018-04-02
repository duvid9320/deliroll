<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class GenericDAO {
    private $conn;
    
    public function __construct() {
        $this->setConn(Connection::getInstance());
    }
    
    protected function closeConnection() {
        $this->getConn()->closeConnection();
    }
    
    protected function getConn() : Connection {
        return $this->conn;
    }

    private function setConn($conn) {
        $this->conn = $conn;
    }
}
