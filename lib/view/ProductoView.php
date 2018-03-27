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
        <div class="row" id="menu">
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
        <div class="product text-white col-xl-4 col-md-6 col-xs-12 pt-4">
            <div class="container px-4">
                <div class="row align-items-start py-3 mh-1-5">
                    <div class="col-xl-6 col-xs-12 px-1">
                        <h1 class="product-title">
                            <?php echo $producto->getNombre() ?>
                        </h1>
                    </div>
                    <div class="col-xl-6 col-xs-12 px-1">
                        <h1 class="product-price">
                            <?php echo "$" . $producto->getPrecio() . " MXN" ?>
                        </h1>
                    </div>
                </div>
                <div class="row align-items-center py-3 mh-1-5">
                    <table class="table">
                        <thead>
                        <th class="description">
                            <?php echo $producto->getDescripcion() ?>
                        </th>
                        </thead>
                    </table>
                </div>
                <div class="row align-items-end py-3 mh-1-5">
                    <img class="img-thumbnail img-fluid  " src="images/cat.jpg">
                </div>
                <form class="row align-items-end py-3  justify-content-center " name="addProduct<?php echo $producto->getIdProducto() ?>" action="cart.php" method="POST">
                    <input type="hidden" name="idProducto" value="<?php echo $producto->getIdProducto() ?>"/>
                    <input type="hidden" name="categoria" value="<?php echo $producto->getCategoria() ?>"/>
                    <input class="col-md-3 col-xs-4 form-control" pattern="[1-9]{1,1}[0-9]*" type="text" name="cantidad" value="1" placeholder="cantidad" required/>
                    <input class="col-md-4 col-xs-12 form-control btn btn-primary" type="submit" value="Lo quiero!" name="enviar"/>
                </form>
            </div>
        </div>
        <?php
    }

}
