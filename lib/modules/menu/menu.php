<?php
$controller = new MenuController();



function debug(){
    
foreach ($_REQUEST as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
}

function addProduct() {
    $pedido = new ProductoPedido();
    $pedido->setCantidad((int) getPostString('cantidad'))->setIdProducto((int) getPostString('idProducto'));
    if (!updateProduct($pedido->getIdProducto(), $pedido->getCantidad()))
        $_SESSION['productos'][] = serialize($pedido);
    header("Refresh:10;");
    ?>
    <div class="text-center alert alert-success alert-dismissible fade show m-0 container-fluid" role="alert">
        <strong><?php echo $pedido->getCantidad()?> producto(s) <?php echo $pedido->getProducto()->getNombre()?> se ha(n) agregado al pedido!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
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
             ?>
    <div class="text-center alert alert-warning alert-dismissible fade show m-0 container-fluid" role="alert">
        <strong>El producto <?php echo $producto->getProducto()->getNombre()?> ya existe en el pedido, se ha incrementado la cantidad a <?php echo $producto->getCantidad() ?> producto(s) en el pedido</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
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