<?php
include_once 'lib/model/dto/Producto.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoView {

    public function showProductos(array $productos) {
        ?>

        <div class="row">
            <?php
            foreach ($productos as $producto) {
                $this->showProducto($producto);
            }
            ?>
        </div>
        <?php
    }
    
    
    public function showProducto(Producto $producto) {
        ?>
        <div class="py-5 product text-white col-xl-4 col-md-6 col-xs-12">
            <div class="row px-3">
                    <div class="col-xl-6 col-xs-12">
                        <h1 class="product-title">
                            <?php echo $producto->getNombre() ?>
                        </h1>
                    </div>
                    <div class="col-xl-6 col-xs-12">
                        <h1 class="product-price">
                            <?php echo "$".$producto->getPrecio()." MXN" ?>
                        </h1>
                    </div>
            </div>
            <div class="container description">
            <table class="table">
                <thead>
                <th>
                    <span class=""><?php echo $producto->getDescripcion()?></span>
                </th>
                </thead>
            </table>
            </div>
            <div class="container img-product">
                <img class="img-thumbnail img-fluid  " src="images/cat.jpg">
                <div class="btn-container">
                    <a class="btn-add-cart" style=""><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>
        </div>

        <?php
    }

}
