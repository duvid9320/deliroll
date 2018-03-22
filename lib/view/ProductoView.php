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
        <div class="menu-container col-xl-4 col-xs-12">
            <div class="container">
                <table class="table">
                    <thead>
                    <th>
                        <h1 class="menu-title">
                            <?php echo $producto->getNombre() ?>
                        </h1>
                    </th>
                    <th class="">
                        <h1 class="menu-price">
                            <?php echo "$".$producto->getPrecio()." MXN" ?>
                        </h1>
                    </th>
                    </thead>
                </table>
            </div>
            <div class="container descripcion">
                <span class="descripcion"><?php echo $producto->getDescripcion()?></span>
            </div>
            <div class="container img-producto">
                <img class="img-thumbnail img-responsive " src="images/cat.jpg">
                <div class="btn-container">
                    <a class="btn-add-cart" style=""><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>
        </div>

        <?php
    }

}
