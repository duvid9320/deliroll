<?php
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/view/ProductoPedidoView.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPedidoController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPedidoController {

    public function getTotal(array $productosPedido){
        $total = 0.0;
        foreach ($productosPedido as $productoPedido) 
            $total += $this->getProductoPedido ($productoPedido)->getSubTotal ();
        return $total;
    }
    
    public function getProductoPedido($serialized) : ProductoPedido{
        return unserialize($serialized);
    }
    
    public function showProductosPedido(array $productosPedido) {
        $productoPedidoView = new ProductoPedidoView();
        ?>
        <table class="table bg-primary text-center text-white table-hover">
            <thead class="bg-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productosPedido as $productoPedido) 
                    $productoPedidoView->showProductoPedidoRow(unserialize($productoPedido));
                ?>
            </tbody>
        </table>
        <?php
    }

}
