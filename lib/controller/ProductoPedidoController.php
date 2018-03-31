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
            $total += $this->getProductoPedido($productoPedido)->getSubTotal ();
        return $total;
    }
    
    public function getProductoPedido($serialized) : ProductoPedido{
        return unserialize($serialized);
    }
    
    public function showTableProductosPedido(array $productosPedido) {
        $productoPedidoView = new ProductoPedidoView();
        ?>
        <table class="table table-responsive-sm text-center table-bordered table-hover">
            <thead class="bg-dark text-white">
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
                <tr class="bg-primary text-center text-white">
                    <td colspan="4">
                        <h1>$<?php echo $this->getTotal($productosPedido)?> MXN</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }
 
    public function showTableModifyProductosPedido(array $productosPedido) {
        $productoPedidoView = new ProductoPedidoView();
        ?>
        <table class="table table-responsive-sm text-center table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>¿Eliminar?</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Sub-total</th>
                    <th>Cantidad</th>
                    <th>¿Modificar?</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productosPedido as $productoPedido) 
                    $productoPedidoView->showModifyProductoPedidoRow(unserialize($productoPedido));
                ?>
                <tr class="bg-primary text-center text-white">
                    <td colspan="6">
                        <h1>$<?php echo $this->getTotal($productosPedido)?> MXN</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

}
