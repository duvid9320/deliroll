<?php
include_once 'lib/model/dto/ProductoPedido.php';
    session_start();
    
    function getProductCount(){
        return isset($_SESSION['productos']) ? count($_SESSION['productos']) : 0;
    }
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white ">
    <a style="font-size: 200%" class="navbar-brand brand logo" href="index.php"><i class="fas fa-utensils"><i class="fas fa-utensil-spoon"></i> DeliRoll</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarDeliRoll" aria-controls="navBarDeliRoll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBarDeliRoll" >
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> <i class="fas fa-home"> Home</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php"><i class="fas fa-list-alt"> Menú</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promociones.php"><i class="fas fa-list-ol"> Promociones</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acercade.php"><i class="fas fa-info-circle"> Acerca de</i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shipping-fast"> Pedido</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ingresarAuto.jsp">Ingresar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="modificarAuto.jsp">Modificar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="eliminarAuto.jsp">Eliminar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="ConsultaAutos">Consultar</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
            <form class="form-inline float-right align-items-center">
                <a class="navbar-text"><span  class="badge" style="font-size: 200%"> <i class="fas fa-shopping-cart"  ></i> <span id="productCount"><?php echo getProductCount()?></span> </span></a>
            </form>
    </div>
</nav>
