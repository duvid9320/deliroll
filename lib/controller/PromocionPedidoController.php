<?php
include_once 'lib/view/PromocionPedidoView.php';
include_once 'lib/model/dto/PromocionPedido.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionPedidoController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionPedidoController {

    public function showPromos(array $promos) {
        $view = new PromocionPedidoView();
        foreach ($promos as $promo) 
            $view->showPromo (unserialize ($promo));
    }
}
