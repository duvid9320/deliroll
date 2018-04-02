<?php
include_once 'lib/utils/drfunctions.php';
include_once 'lib/controller/PromocionPedidoController.php';
update();
showUpdateForms();

function update() {
    if (postVarExists('update-product'))
        updateProduct(getPostString('update-product'), getPostString('cantidad'));
    else if (postVarExists('delete-product'))
        deleteProduct(getPostString('delete-product'));
    else if (postVarExists('delete-promo'))
        deletePromo(getPostString('delete-promo'));
    else if (postVarExists('update-promo'))
        updatePromo(getPostString('update-promo'), getPostInt('cantidad'));
    if (empty($_SESSION['productos']) && empty($_SESSION['promos']))
        header("Location: index.php");
}

function updatePromo($id, $cantidad) {
    if (!isset($_SESSION['promos']))
        return;
    foreach ($_SESSION['promos'] as $key => $promo)
        if (getPromo($promo)->getIdPromocion() == $id) {
            $promo = getPromo($promo);
            $_SESSION['promos'][$key] = serialize($promo->setCantidad($cantidad));
            showSuccessAlert("La promoción se ha modificado en el pedido!","cantidad de promociones en el pedido: ".$promo->getCantidad());
        }
}

function deletePromo($id) {
    if (!isset($_SESSION['promos']))
        return;
    foreach ($_SESSION['promos'] as $key => $producto)
        if (getPromo($producto)->getIdPromocion() == $id) {
            unset($_SESSION['promos'][$key]);
            showDangerAlert("La promoción se ha eliminado del pedido!", "");
        }
    if (empty($_SESSION['promos']))
        unset($_SESSION['promos']);
}

function getPromo($serialized): PromocionPedido {
    return unserialize($serialized);
}

function deleteProduct($id) {
    if (!isset($_SESSION['productos']))
        return;
    foreach ($_SESSION['productos'] as $key => $producto)
        if (getProduct($producto)->getIdProducto() == $id) {
            unset($_SESSION['productos'][$key]);
            showDangerAlert("El producto ".getProduct($producto)->getProducto()->getNombre()." se ha eliminado del pedido!", "");
        }
    if (empty($_SESSION['productos']))
        unset($_SESSION['productos']);
}

function updateProduct($id, $cantidad) {
    if (!isset($_SESSION['productos']))
        return;
    foreach ($_SESSION['productos'] as $key => $producto)
        if (getProduct($producto)->getIdProducto() == $id) {
            $producto = getProduct($producto);
            $_SESSION['productos'][$key] = serialize($producto->setCantidad($cantidad));
            showSuccessAlert("El pedido se ha modificado!", $producto->getCantidad()." producto(s) ".$producto->getProducto()->getNombre()." en el pedido");
        }
}

function getProduct($serialized) : ProductoPedido{
    return unserialize($serialized);
}

function showUpdateForms() {
$productoPedidoController = new ProductoPedidoController(getSessionVarOrElseNull('productos'));
$promocionPedidoController = new PromocionPedidoController(getSessionVarOrElseNull('promos'));
    ?>
    <div class="container my-5">
        <h1 class="text-center ">Modificar el Pedido</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-xs-12">
                    <?php 
                        $productoPedidoController->showTableModifyProductosPedido(); 
                        $promocionPedidoController->showModifyPromos(); 
                        ?>
                </div>

            </div>
        </div>
    </div>
    <?php
}
