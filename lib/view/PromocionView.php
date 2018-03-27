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
            <div class="row promo-container">
                    <div class="col-lg-6 col-xs-12">
                            <h1 class="product-title">Promocion <?php echo $promocion->getIdPromocion() ?></h1>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                            <h1 class="product-price"><?php echo $promocion->getDia() ?></h1>
                    </div>
                <div class="container">
                    <div class="row">
                        <?php $productoPromocionController->showProductosPromocion($promocion) ?>
                    </div>
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
        <?php
    }
}
