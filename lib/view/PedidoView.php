<?php
include_once 'lib/model/dto/Pedido.php';
include_once 'lib/controller/ProductoPedidoController.php';
include_once 'lib/controller/PromocionPedidoController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PedidoView {

    public function showPedido(Pedido $pedido) {
        $productoPedidoController = new ProductoPedidoController($pedido->getProductosPedido());
        $promocionPedidoController = new PromocionPedidoController($pedido->getPromosPedido());
        ?>
        <div class="container my-5">
            <h1 class="text-center ">Cliente: <?php echo $pedido->getCliente()->getNombre() ?><br> Estado: <?php echo $pedido->getEstado() ? " Atendido " : "Pendiente" ?></h1>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="col col-xs-12">
                            <?php
                            $productoPedidoController->showTableProductosPedido(true);
                            ?>
                        </div>
                        <div class="col col-xs-12">
                            <?php
                            $promocionPedidoController->showPromos(true);
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-8 col-xs-12  text-center my-5">
                        <h2>Detalles del pedido:</h2><h4><?php echo $pedido->getDetalles() ?></h4><br>
                        <h2>Fecha: </h2><h4><?php echo $pedido->getFecha() ?></h4><br>
                        <h2>Tipo: </h2><h4><?php echo $pedido->getTipo() ?></h4><br>
                        <h2>Total: </h2><h4>$<?php echo $pedido->getCosto() ?> MXN</h4><br>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
