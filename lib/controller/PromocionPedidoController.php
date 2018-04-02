<?php
include_once 'lib/view/PromocionPedidoView.php';
include_once 'lib/model/dto/PromocionPedido.php';
include_once 'lib/model/dao/PromocionPedidoDAO.php';
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

    private $serializedPromos;

    function __construct($serializedPromos) {
        $this->serializedPromos = $serializedPromos;
    }

    public function hasPromos() {
        return !is_null($this->serializedPromos) && !empty($this->serializedPromos);
    }

    public function registerPromocionesPedido($idPedido) {
        $dao = PromocionPedidoDAO::getInstance();
        if (!$this->hasPromos())
            return false;
        foreach ($this->serializedPromos as $promo)
            if (!$dao->createPromocionPedido($this->unserializePromocionPedido($promo)->setIdPedido($idPedido)))
                return false;
        return true;
    }

    public function showPromos(bool $unserialized) {
        if (!$this->hasPromos())
            return;
        $view = new PromocionPedidoView();
        ?>
        <div class="col-12">
            <h2 class="text-center">Promociones</h2>
            <?php
            if(boolval($unserialized))
                foreach ($this->serializedPromos as $promo)
                    $view->showPromo($promo);
            else
                foreach ($this->serializedPromos as $promo)
                    $view->showPromo(unserialize($promo));
            ?>
        </div>
        <?php
    }

    public function showModifyPromos() {
        if (!$this->hasPromos())
            return;
        $view = new PromocionPedidoView();
        foreach ($this->serializedPromos as $promo)
            $view->showModifyPromo(unserialize($promo));
    }

    public function getTotal() {
        $total = doubleval(0);
        if ($this->hasPromos())
            foreach ($this->serializedPromos as $promo)
                $total += $this->unserializePromocionPedido($promo)->getSubTotal();
        return $total;
    }

    public function unserializePromocionPedido($serialized): PromocionPedido {
        return unserialize($serialized);
    }

}
