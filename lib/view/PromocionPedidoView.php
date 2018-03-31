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
        <table class="table table-bordered table-responsive-sm text-center table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (ProductoPromocionDAO::getInstance()->getProductosPromocion($promo->getIdPromocion()) as $pp)
                    $productoPromocionView->showProductoPromocionTable($pp, $promo->getCantidad());
                ?>
                <tr class="bg-primary text-white">
                    <td colspan="4">
                        <h1>$<?php echo $promo->getSubTotal() ?> MXN</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    public function showModifyPromo(PromocionPedido $promo) {
        $productoPromocionView = new ProductoPromocionView();
        ?>
        <table class="table table-bordered table-responsive-sm text-center table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (ProductoPromocionDAO::getInstance()->getProductosPromocion($promo->getIdPromocion()) as $pp)
                    $productoPromocionView->showProductoPromocionTable($pp, $promo->getCantidad());
                ?>
                <tr class="bg-primary text-white">
                    <td colspan="4">
                        <h1>$<?php echo $promo->getSubTotal() ?> MXN</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-xs-12">
                    <form name="update-product-promo" action="pedido.php?action=update" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-xl-3 col-xs-6">Promociones: </label>
                            <input class="form-control col-xl-3 col-xs-6"type="number" min="1" step="1" name="cantidad" value="<?php echo $promo->getCantidad() ?>" />
                            <button class="btn btn-warning form-control col-xl-3 col-xs-6"type="submit" name="update-promo" value="<?php echo $promo->getIdPromocion() ?>"><i class="fas fa-edit"> Modificar</i></button>
                        <form name="delete-product-promo" action="pedido.php?action=update" method="POST">
                            <button class="btn btn-danger form-control col-xl-3 col-xs-6" type="submit" name="delete-promo" value="<?php echo $promo->getIdPromocion() ?>"><i class="fas fa-times-circle"> Eliminar del pedido</i></button>
                        </form>
                        
                        </div>                     
                    </form>
                </div>
                <div class="col-xl-8 col-xs-12">
                    
                </div>


            </div>
        </div>
        <?php
    }

}
