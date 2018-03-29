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

}
