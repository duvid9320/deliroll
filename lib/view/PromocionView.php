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

    public function showPromocion(Promocion $promocion) {
        $productoPromocionController = new ProductoPromocionController();
        ?>
        <div class="row promo-container">
            <div class="container py-5">
                <div class="row align-items-start justify-content-center py-5 promo-title">
                    <div class="col-md-6 col-sm-12 text-left">
                        <h1 class="">Promocion-<?php echo $promocion->getIdPromocion() ?></h1>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <h1 class=""><?php echo $promocion->getDia() ?></h1>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="container px-5">
                        <div class="row align-items-center justify-content-center">
                        <?php $productoPromocionController->showProductosPromocion($promocion) ?>
                        </div>
                    </div>
                    <h1 class="col text-center my-5 promo-title">Total promoción $<?php echo $promocion->getTotal()?> MXN (Cada una)</h1>
                </div>
                <form class="row align-items-end py-3 form-group justify-content-center p-5" name="addPromo<?php echo $promocion->getIdPromocion()?>" action="cart.php" method="POST">
                    <input type="hidden" name="idPromo" value="<?php echo $promocion->getIdPromocion()?>"/>
                    <input class="col-xl-1 col-xs-12 form-control" pattern="[1-9]{1,1}[0-9]*" type="text" name="cantidad" value="1" placeholder="cantidad" required/>
                    <button class="col-xl-3 col-xs-12 btn btn-primary" type="submit" name="enviar">
                        <i class="fas fa-cart-plus " > Agregar</i>
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

}
