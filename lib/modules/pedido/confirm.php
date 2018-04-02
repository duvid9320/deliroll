<?php
include_once 'lib/utils/drfunctions.php';
include_once 'lib/controller/ProductoPedidoController.php';
include_once 'lib/controller/PromocionPedidoController.php';
$productoPedidoController = new ProductoPedidoController(getSessionVarOrElseNull('productos'));
$promocionPedidoController = new PromocionPedidoController(getSessionVarOrElseNull('promos'));
$clientController = new ClienteController(cookieExists('idCliente') ? getCookie('idCliente') : "");
?>
<div class="container my-5">
    <h1 class="text-center ">Detalle del Pedido</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-xs-12">
                        <?php 
                        $productoPedidoController->showTableProductosPedido(false); 
                        $promocionPedidoController->showPromos(false); 
                        ?>
            </div>

            <div class="col-xl-6 col-xs-12">
                <div class="col-12">
                    <?php $clientController->showClientForm($productoPedidoController->getTotal()+$promocionPedidoController->getTotal(), isset($_SESSION['promos']))?>
                </div>
            </div>
        </div>
    </div>
</div>
