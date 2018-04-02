<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author david
 */
class Connection {

    private static $dns = 'mysql:dbname=deliroll;host=localhost';
    private static $user = 'admin';
    private static $password = 'admin';
    private static $connection;
    private $pdo;
    private $transaction;

    private function __construct() {
        $this->setPDO();
    }
    
    public function beginTransaction() {
        $this->getPDO()->beginTransaction();
        $this->transaction = true;
    }
    
    public function endTransaction() {
        $this->transaction = false;
    }

    private function setPDO() {
        try {
            $this->pdo = new PDO(Connection::$dns, Connection::$user, Connection::$password);
            $this->pdo->query("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            self::$connection = null;
            echo 'Error al conectar <br>' . $e->getTraceAsString();
        }
    }
    
    public function getPDO() : PDO{
        if(is_null($this->pdo))
            $this->setPDO ();
        return $this->pdo;
    }

    public function closeConnection() {
        if(!$this->transaction)
            $this->pdo = null;
    }
    
    public function getDataObjects($sql, $className): array {
        try {
            $result = $this->getResult($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, $className);
            return $result->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $result->closeCursor();
        }
    }

    public function getDataObject($sql, $className) {
        try {
            $stm = $this->getResult($sql);
            return $stm->fetchObject($className);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
        }
    }

    public function getResult($sql): PDOStatement {
        try {
            return $this->getPDO()->query($sql);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        } finally {
            $this->closeConnection();
        }
    }

    public function executeSQL($sql) : bool{
        try {
            $stm = $this->getPDO()->prepare($sql);
            return $stm->execute() && $stm->rowCount() > 0;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        } finally {
            $stm->closeCursor();
        }
    }

    public static function getInstance(): Connection {
        return is_null(self::$connection) ? (self::$connection = new Connection()) : self::$connection; 
    }

}
