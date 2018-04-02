<?php

include_once 'lib/connection/Connection.php';
include_once 'lib/model/dto/Pedido.php';
include_once 'lib/model/dto/Cliente.php';
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/model/dto/PromocionPedido.php';
include_once 'lib/controller/ClienteController.php';
include_once 'lib/controller/ProductoPedidoController.php';
include_once 'lib/controller/PromocionPedidoController.php';
include_once 'lib/view/PedidoView.php';
include_once 'lib/utils/drfunctions.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PedidoController {

    private $products;
    private $promos;
    private $client;
    private $pedido;
    private $productoPedidoController;
    private $promocionPedidoController;
    private $dao;
    
    function __construct($products, $promos, $client, $pedido) {
        $this->setProducts($products);
        $this->setPromos($promos);
        $this->setClient($client);
        $this->setPedido($pedido);
        $this->productoPedidoController = new ProductoPedidoController($this->products);
        $this->promocionPedidoController = new PromocionPedidoController($this->promos);
        if(!is_null($this->getPedido()))
            $this->getPedido()->setCosto($this->getTotal());
        $this->dao = PedidoDAO::getInstance();
    }
    
    function getDao() : PedidoDAO{
        return $this->dao;
    }
    
    public function showPedidoFromDatabase($idPedido) {
        $pedidoView = new PedidoView();
        $pedidoView->showPedido($this->getDao()->getPedidoById($idPedido));
    }
    
    public function pedir() {
        Connection::getInstance()->beginTransaction();
        try {
            if($this->confirmPedido())
                if(!$this->insertAll())
                    return false;
            Connection::getInstance()->getPDO()->commit();
        } catch (Exception $exc) {
            echo $exc->getMessage()."<br>".$exc->getTraceAsString()."<br>";
            Connection::getInstance()->getPDO()->rollBack();
            return false;
        } finally {
            Connection::getInstance()->endTransaction();
            Connection::getInstance()->closeConnection();
        }
        return true;
    }
    
    private function insertAll() {
        $inserted = boolval(true);
        if($this->productoPedidoController->hasProducts())
            $inserted =  $inserted && $this->productoPedidoController->registerProductsPedido ($this->getPedido ()->getIdPedido());
        if($this->promocionPedidoController->hasPromos())
            $inserted = $inserted && $this->promocionPedidoController->registerPromocionesPedido($this->getPedido()->getIdPedido());
        return $inserted;
    }
    
    private function confirmPedido() {
        $clientController = new ClienteController();
        try {
            if(isEmpty($this->getClient()->getIdCliente()))
                $clientController->createClient($this->client);
            $this->getPedido()->setIdCliente($this->getClient()->getIdCliente());
            $this->createPedido();
            return true;
        } catch (Exception $exc) {
            echo $exc->getMessage()."<br>".$exc->getTraceAsString()."<br>";
            if(Connection::getInstance()->getPDO()->inTransaction())
                Connection::getInstance()->getPDO()->rollBack();
            return false;
        }
    }

    private function createPedido() {
        $this->getDao()->savePedido($this->pedido);
    }
    
    private function getTotal() {
        return $this->productoPedidoController->getTotal() + $this->promocionPedidoController->getTotal();
    }
    
    function getProducts() : array{
        return $this->products;
    }

    function getPromos() : array{
        return $this->promos;
    }

    function getClient() : Cliente{
        return $this->client;
    }

    function getPedido(){
        return $this->pedido;
    }

    function setProducts($products) {
        $this->products = $products;
    }

    function setPromos($promos) {
        $this->promos = $promos;
    }

    function setClient($client) {
        $this->client = $client;
        if(is_null($this->client))
            return;
        $dbClient = null;
        if(!isEmpty($this->getClient()->getIdCliente()))
            $dbClient = ClienteDAO::getInstance ()->getOrUpdate ($this->getClient());
        else if(!isEmpty($this->getClient()->getTelefono()))
            $dbClient = ClienteDAO::getInstance ()->readClientByPhone ($this->getClient ()->getTelefono ());
        if(!is_null($dbClient))
            $this->client = $dbClient;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }
}
