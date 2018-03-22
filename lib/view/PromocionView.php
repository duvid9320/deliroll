<?php
include_once 'lib/model/dto/Promocion.php';
include_once 'lib/controller/ProductoPromocionController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionView {
    
    public function showPromocion(Promocion $promocion){
        $productoPromocionController = new ProductoPromocionController();
        ?>
            <div class="row">
                <div class="promo-container col-xl-12 col-xs-12">
                    <table class="table">
                        <thead>
                        <th>
                            <h1 class="menu-title">Promocion <?php echo $promocion->getIdPromocion() ?></h1>
                        </th>
                        <th>
                            <h1 class="menu-price"><?php echo $promocion->getDia() ?></h1>
                        </th>
                        </thead>
                    </table>
                    <div class="row">
                        <?php $productoPromocionController->showProductosPromocion($promocion) ?>
                    </div>
                    <table class="table">
                        <thead>
                        <th>
                            <h1 class="menu-title">Total $<?php echo $promocion->getTotal()?> MXN</h1>
                        </th>
                        <th class="">
                            <h1 class="menu-price"><button class="btn-primary"><i class="fas fa-cart-plus"> Lo quiero!</i></button></h1>
                        </th>
                        </thead>
                    </table>
                </div>

            </div>
        <?php
    }
}
