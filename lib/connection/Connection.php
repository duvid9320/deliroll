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

    private static $dns = 'mysql:dbname=deliroll;host=127.0.0.1';
    private static $user = 'admin';
    private static $password = 'admin';
    private static $connection;
    private $pdo;

    private function __construct() {
        $this->setPDO();
    }

    private function setPDO() {
        try {
            $this->pdo = new PDO(Connection::$dns, Connection::$user, Connection::$password);
            $this->pdo->query("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            Connection::$connection = null;
            echo 'Error al conectar <br>' . $e->getMessage();
        }
    }

    public function getDataObjects($sql, $className): array {
        $result = $this->getResult($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $className);
        return $result->fetchAll();
    }

    public function getResult($sql): PDOStatement {
        try {
            return $this->pdo != null ? $this->pdo->query($sql) : null;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function executeSQL($sql) : bool{
        try {
            return $this->pdo != null ? $this->pdo->exec($sql) > 0 : false;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getInstance(): Connection {
        Connection::$connection = Connection::$connection != null ? Connection::$connection : new Connection();
        return Connection::$connection;
    }

}
