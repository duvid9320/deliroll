<?php
if(!filter_has_var(INPUT_POST, 'idProducto'))
    header ("Location: index.php");

include_once 'lib/model/dao/ProductoDAO.php';
include_once 'lib/model/dto/ProductoPedido.php';
session_start();

if(filter_has_var(INPUT_POST, 'idProducto'))
    addProduct();

function addProduct(){
    $productoPedido = new ProductoPedido();
    $productoPedido->setCantidad((int)filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_NUMBER_INT));
    $productoPedido->setIdProducto(filter_input(INPUT_POST, 'idProducto', FILTER_SANITIZE_STRING));
    if(!updateProduct($productoPedido->getIdProducto(), $productoPedido->getCantidad()))
        $_SESSION['productos'][] = serialize($productoPedido);
    header("Location: menu.php?categoria=". filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING)."#menu");
}

function getProduct($serializedObject) : ProductoPedido{
    return unserialize($serializedObject);
}

function updateProduct($id, $cantidad){
    if(!isset($_SESSION['productos']))
        return false;
    foreach ($_SESSION['productos'] as $key => $producto)
        if(getProduct($producto)->getIdProducto()==$id){
            $producto = getProduct($producto);
            $producto->setCantidad($cantidad+$producto->getCantidad());
            $_SESSION['productos'][$key] = serialize($producto);
            return true;
        }
}
