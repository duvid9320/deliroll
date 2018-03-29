<?php
include_once 'lib/model/dao/ProductoDAO.php';
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/model/dto/PromocionPedido.php';
session_start();

if(filter_has_var(INPUT_POST, 'idProducto'))
    addProduct();
else if(filter_has_var(INPUT_POST, 'idPromo'))
    addPromo ();
else
    header ("Location: index.php");

function addPromo() {
    $pedido = new PromocionPedido();
    $pedido->setIdPromocion((int)filter_input(INPUT_POST, 'idPromo',FILTER_SANITIZE_NUMBER_INT))->setCantidad((int)filter_input(INPUT_POST, 'cantidad',FILTER_SANITIZE_NUMBER_INT));
    if(!updatePromo($pedido->getIdPromocion(), $pedido->getCantidad()))
        $_SESSION['promos'][] = serialize ($pedido);
    header("Location: promos.php");
}

function updatePromo($id, $cantidad){
    if(!isset($_SESSION['promos']))
        return false;
    foreach ($_SESSION['promos'] as $idx => $promo) {
        if(getPromo($promo)->getIdPromocion()==$id){
            $promo = getPromo($promo);
            $_SESSION['promos'][$idx] = serialize($promo->setCantidad($cantidad+$promo->getCantidad()));
            return true;
        }
    }
}

function getPromo($serialized) : PromocionPedido{
    return unserialize($serialized);
}

function addProduct(){
    $pedido = new ProductoPedido();
    $pedido->setCantidad((int)filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_NUMBER_INT))->setIdProducto((int)filter_input(INPUT_POST, 'idProducto', FILTER_SANITIZE_NUMBER_INT));
    if(!updateProduct($pedido->getIdProducto(), $pedido->getCantidad()))
        $_SESSION['productos'][] = serialize($pedido);
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
            $_SESSION['productos'][$key] = serialize($producto->setCantidad($cantidad+$producto->getCantidad()));
            return true;
        }
}
