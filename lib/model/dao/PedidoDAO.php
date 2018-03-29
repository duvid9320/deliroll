<?php

include_once 'lib/model/dto/Pedido.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoDAO
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PedidoDAO {
    private static $instance;
    
    private function __construct() {
    }
    
    public static function getInstance() : PedidoDAO{
        return is_null(self::$instance) ? (self::$instance = new PedidoDAO()) : self::$instance ;
    }
    
    public function getPedidoById($id) {
        $stm = Connection::getInstance()->getPDO()->prepare("SELECT * FROM Pedido WHERE idPedido = ?");
        $stm->execute([$id]);
        return $stm->fetchObject('Pedido');
    }
}
