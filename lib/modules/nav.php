<?php
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/model/dto/PromocionPedido.php';
session_start();

function debugCart() {
    if (isset($_SESSION['productos']))
        foreach ($_SESSION['productos'] as $product)
            var_dump(unserialize($product));

    if (isset($_SESSION['promos']))
        foreach ($_SESSION['promos'] as $promo)
            var_dump(unserialize($promo));
}

function getProductCount() {
    return isset($_SESSION['productos']) ? count($_SESSION['productos']) : 0;
}

function getPromoCount() {
    return isset($_SESSION['promos']) ? count($_SESSION['promos']) : 0;
}
?>


<nav class="navbar navbar-nav navbar-dark bg-dark text-white sticky-top navbar-expand-lg ">
    <a style="font-size: 200%" class="navbar-brand brand logo" href="index.php"><i class="fas fa-utensils"><i class="fas fa-utensil-spoon"></i> DeliRoll</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarDeliRoll" aria-controls="navBarDeliRoll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBarDeliRoll" >
        <ul class="navbar-nav mr-auto align-items-center ">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> <i class="fas fa-home text-white"> Home</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php"><i class="fas fa-list-alt text-white"> Menú</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promos.php"><i class="fas fa-list-ol text-white"> Promociones</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acercade.php"><i class="fas fa-info-circle text-white"> Acerca de</i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shipping-fast text-white"> Pedido</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="pedido.php?action=confirm">Confirmar Pedido</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pedido.php?action=update">Modificar Pedido</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pedido.php?action=delete">Eliminar Todo el Pedido</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pedido.php?action=query">Ver estado del pedido</a>
                </div>
            </li>
        </ul>
        <form class="form-inline float-right align-items-center">
            <a class="navbar-text"><span  class="badge" style="font-size: 200%"> <i class="fas fa-shopping-cart"  ></i> <span id="productCount"><?php echo getProductCount() + getPromoCount() ?></span> </span></a>
        </form>
    </div>
</nav>
