<?php

include_once 'lib/model/dto/ProductoPedido.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPedidoView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPedidoView {

    public function showProductoPedidoRow(ProductoPedido $productoPedido) {
        ?>
        <tr>
            <td><?php echo $productoPedido->getProducto()->getNombre()?></td>
            <td>$<?php echo $productoPedido->getProducto()->getPrecio()?> MXN</td>
            <td><?php echo $productoPedido->getCantidad() ?></td>
            <td>$<?php echo $productoPedido->getSubTotal()?> MXN</td>
        </tr>
        <?php
    }

    public function showModifyProductoPedidoRow(ProductoPedido $productoPedido) {
        ?>
        <tr class="">
            <form name="delete-form" action="pedido.php?action=update" method="POST">
                <td> <button class="form-control btn btn-danger" type="submit" name="delete-product" value="<?php echo $productoPedido->getIdProducto()?>"><i class="fas fa-times-circle"><span class="sr-only">Eliminar</span></i></button>  </td>
            </form>
            <td><?php echo $productoPedido->getProducto()->getNombre()?></td>
            <td>$<?php echo $productoPedido->getProducto()->getPrecio()?> MXN</td>
            <td>$<?php echo $productoPedido->getSubTotal()?> MXN</td>
            <form name="update-form" action="pedido.php?action=update" method="POST">
                <td><input placeholder="cantidad" name="cantidad" class=" form-control" type="number" min="1" step="1" required name="cantidad" value="<?php echo $productoPedido->getCantidad() ?>" /> </td>
                <td> <button class="form-control btn btn-warning" type="submit" name="update-product" value="<?php echo $productoPedido->getIdProducto()?>"><i class="fas fa-edit"><span class="sr-only">Editar</span></i></button> </td>
            </form>
        </tr>
        <?php
    }

}
