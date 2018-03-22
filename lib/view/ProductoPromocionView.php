<?php
include_once 'lib/model/dto/ProductoPromocion.php';
include_once 'lib/model/dto/Producto.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPromocionView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPromocionView {

    public function showProductoPromocion(ProductoPromocion $productoPromocion, Producto $producto) {
        ?>
        <div class="menu-container col-xl-4 col-md-6 col-xs-12">
            <div class="container">
                <table class="table">
                    <thead>
                    <th>
                        <h1 class="menu-title"><?php echo $producto->getNombre()?></h1>
                    </th>
                    <th class="">
                        <h1 class="menu-price">$<?php echo $productoPromocion->getPrecioUnitario();?> MXN</h1>
                    </th>
                    </thead>
                </table>
            </div>
            <div class="container descripcion">
                <span class="descripcion"><?php echo $producto->getDescripcion()?></span>
            </div>
            <div class="container img-producto">
                <img class="img-thumbnail img-responsive " src="images/cat.jpg">
            </div>
        </div>
        <?php
    }
}
