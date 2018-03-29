<?php
include_once 'lib/model/dto/PromocionPedido.php';
include_once 'lib/model/dao/ProductoPromocionDAO.php';
include_once 'lib/view/ProductoPromocionView.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionPedidoView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionPedidoView {

    public function showPromo(PromocionPedido $promo) {
        $productoPromocionView = new ProductoPromocionView();
        ?>
        <h1>Promocion del día <?php echo $promo->getPromocion()->getDia() ?></h1>
        <h1>Promociones ordenadas <?php echo $promo->getCantidad() ?></h1>
                <?php
                $productoPromocionView->showProductosPromocionTable(ProductoPromocionDAO::getInstance()->getProductosPromocion($promo->getIdPromocion()), $promo->getCantidad());
                ?>
        <h1>SubTotal $<?php echo $promo->getSubTotal() ?> MXN</h1>
        <?php
    }

}
