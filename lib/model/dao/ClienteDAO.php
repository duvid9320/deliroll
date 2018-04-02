<?php

include_once 'lib/model/dto/Cliente.php';
include_once 'lib/connection/Connection.php';
include_once 'lib/model/dao/GenericDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ClienteDAO extends GenericDAO {

    private static $instance;

    public function __construct() {
        parent::__construct();
    }

    static function getInstance(): ClienteDAO {
        return is_null(self::$instance) ? (self::$instance = new ClienteDAO()) : self::$instance;
    }

    public function saveClient(Cliente &$client) {
        $pdo = parent::getConn()->getPDO();
        try {
            $stm = $pdo->prepare('INSERT INTO Cliente (nombre, telefono, direccion) VALUES (?,?,?)');
            if ($stm->execute([$client->getNombre(), $client->getTelefono(), $client->getDireccion()]))
                $client->setIdCliente($pdo->lastInsertId());
            else
                throw new Exception("Información de cliente no válida");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
        return true;
    }

    public function readClient($id): Cliente {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM Cliente WHERE idCliente = ?");
            if ($stm->execute([$id]))
                return $stm->fetchObject("Cliente");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function readClientByPhone($phone): Cliente {
        try {
            $stm = parent::getConn()->getPDO()->prepare("SELECT * FROM Cliente WHERE telefono = ?");
            if ($stm->execute([$phone]) && $stm->rowCount() > 0)
                return $stm->fetchObject("Cliente");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
        return new Cliente();
    }

    public function updateClient(Cliente $cliente) {
        try {
            $stm = parent::getConn()->getPDO()->prepare("UPDATE Cliente SET nombre = ?, telefono = ?, direccion = ? WHERE idCliente = ?");
            if ($stm->execute([$cliente->getNombre(), $cliente->getTelefono(), $cliente->getDireccion(), $cliente->getIdCliente()]) && $stm->rowCount() > 0)
                return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        } finally {
            $stm->closeCursor();
            parent::closeConnection();
        }
    }

    public function getOrUpdate(Cliente $cliente) {
        $dbClient = $this->readClient($cliente->getIdCliente());
        if ($this->clientsAreEquals($dbClient, $cliente))
            return $cliente;
        else
            $this->updateClient($cliente);
        return $cliente;
    }

    private function clientsAreEquals(Cliente $client1, Cliente $client2) {
        return $client1->getDireccion() == $client2->getDireccion() && $client1->getNombre() == $client2->getNombre() && $client1->getTelefono() == $client2->getTelefono();
    }

}
