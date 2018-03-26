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
                            <h1 class="product-title">Promocion <?php echo $promocion->getIdPromocion() ?></h1>
                        </th>
                        <th>
                            <h1 class="product-price"><?php echo $promocion->getDia() ?></h1>
                        </th>
                        </thead>
                    </table>
                    <div class="row p-3">
                        <?php $productoPromocionController->showProductosPromocion($promocion) ?>
                    </div>
                    <table class="table mt-3">
                        <thead>
                        <th>
                            <h1 class="product-title">Total $<?php echo $promocion->getTotal()?> MXN</h1>
                        </th>
                        <th class="">
                            <h1 class="product-price"><button class="btn-primary btn form-control-lg form-control" style="font-size: 150%"><i class="fas fa-cart-plus"></i></button></h1>
                        </th>
                        </thead>
                    </table>
                </div>

            </div>
        <?php
    }
}
