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

    public function showProductosPromocionTable(array $productosPromocion, int $cantidad) {
        ?>
        <table class="table bg-primary text-center text-white table-hover">
            <thead class="bg-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($productosPromocion as $productoPromocion) 
                        $this->showProductoPromocionTable($productoPromocion, $cantidad);
                ?>
            </tbody>
        </table>
        <?php
    }

    public function showProductoPromocionTable(ProductoPromocion $productoPromocion, int $cantidad) {
        ?>
<tr>
    <td><?php echo $productoPromocion->getProducto()->getNombre();?></td>
    <td><?php echo $productoPromocion->getPrecioUnitario();?></td>
    <td><?php echo ($cantidad)?></td>
    <td><?php echo $productoPromocion->getPrecioUnitario()*$cantidad;?></td>
</tr>
<?php
    }

    public function showProductoPromocion(ProductoPromocion $productoPromocion) {
        $producto = $productoPromocion->getProducto();
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
                            <?php echo "$" . $productoPromocion->getPrecioUnitario() . " MXN" ?>
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
                <div class="row align-items-end py-3 pb-5 mh-1-5">
                    <img class="img-thumbnail img-fluid  " src="images/cat.jpg">
                </div>
            </div>
        </div>
        <?php
    }

}
