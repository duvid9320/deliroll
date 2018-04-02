<?php
include_once 'lib/utils/drfunctions.php';
$controller = new MenuController();

function addProduct() {
    $pedido = new ProductoPedido();
    $pedido->setCantidad((int) getPostString('cantidad'))->setIdProducto((int) getPostString('idProducto'));
    if (!updateProduct($pedido->getIdProducto(), $pedido->getCantidad()))
        $_SESSION['productos'][] = serialize($pedido);
    header("Refresh:10;");
    showSuccessAlert($pedido->getCantidad()." producto(s) ".$pedido->getProducto()->getNombre()." se ha(n) agregado al pedido!", "");
}

function getProduct($serializedObject): ProductoPedido {
    return unserialize($serializedObject);
}

function updateProduct($id, $cantidad) {
    if (!isset($_SESSION['productos']))
        return false;
    foreach ($_SESSION['productos'] as $key => $producto)
        if (getProduct($producto)->getIdProducto() == $id) {
            $producto = getProduct($producto);
            $_SESSION['productos'][$key] = serialize($producto->setCantidad($cantidad + $producto->getCantidad()));
            showWarningAlert("El producto ".$producto->getProducto()->getNombre()." ya existe en el pedido, se ha incrementado la cantidad a ". $producto->getCantidad()." producto(s) en el pedido", "");
    return true;
        }
}
?>

<div class="container-fluid">
    <?php
    if (postVarExists('add-product'))
        addProduct();
    if (getVarExists('categoria'))
        $controller->showProductosCategoria(getGetString('categoria'));
    else
        $controller->showCategorias();
    ?>
</div>