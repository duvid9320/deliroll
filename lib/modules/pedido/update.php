<?php
include_once 'lib/utils/drfunctions.php';
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
            ?>
            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                <strong>La promoción se ha modificado en el pedido!</strong> cantidad de promociones en el pedido: <?php echo $promo->getCantidad()?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
}

function deletePromo($id) {
    if (!isset($_SESSION['promos']))
        return;
    foreach ($_SESSION['promos'] as $key => $producto)
        if (getPromo($producto)->getIdPromocion() == $id) {
            unset($_SESSION['promos'][$key]);
            ?>
            <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
                <strong>La promoción se ha eliminado del pedido!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
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
            ?>
            <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
                <strong>El producto <?php echo getProduct($producto)->getProducto()->getNombre()?> se ha eliminado del pedido!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
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
            ?>
            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                <strong>El pedido se ha modificado!</strong> <?php echo $producto->getCantidad()?> producto(s) <?php echo $producto->getProducto()->getNombre()?> en el pedido
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
}

function getProduct($serialized) : ProductoPedido{
    return unserialize($serialized);
}

function showUpdateForms() {
    $productoPedidoController = new ProductoPedidoController();
    $promocionPedidoController = new PromocionPedidoController();
    $total = doubleval(0);
    $productos = &$_SESSION['productos'];
    $promos = &$_SESSION['promos'];
    $total += is_null($productos) ? 0.0 : $productoPedidoController->getTotal($productos);
    $total += is_null($promos) ? 0.0 : $promocionPedidoController->getTotal($promos);
    ?>
    <div class="container my-5">
        <h1 class="text-center ">Modificar el Pedido</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-xs-12">
                    <?php
                    if (!is_null($productos) && !empty($productos)) {
                        ?>
                        <div class="col-12">
                            <h2 class="text-center">Productos</h2>
                            <?php $productoPedidoController->showTableModifyProductosPedido($productos); ?>
                        </div>
                        <?php
                    } if (!is_null($promos) && !empty($promos)) {
                        ?>
                        <div class="col-12">
                            <h2 class="text-center">Promociones</h2>
                            <?php $promocionPedidoController->showModifyPromos($promos); ?>
                        </div>
                    <?php }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <?php
}
