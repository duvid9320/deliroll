<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php include_once 'lib/modules/header.php'; ?>
        <title>Pedidos</title>
    </head>
    <body>
        <?php
        include_once 'lib/controller/ProductoPedidoController.php';
        include_once 'lib/controller/PromocionPedidoController.php';
        include_once 'lib/modules/nav.php';
        ?>
        <div class="container-fluid ">
            
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-xs-12">
                    <h4 class="text-center">Cliente</h4>
                    <form action="">
                        <div class="form-group">
                            <label class="sr-only" for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="telefono">Teléfono:</label>
                            <input class="form-control" id="telefono" type="text" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="domicilio">Domicilio:</label>
                            <input class="form-control" id="domicilio" type="text" placeholder="Domicilio">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="codigopostal">Codigo Postal:</label>
                            <input class="form-control" id="codpost" type="text" placeholder="Codigo Postal">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="ciudad">
                                <option selected>Ciudad</option>
                                <option value="1">Amacuzac</option>
                                <option value="2">Jojutla</option>
                                <option value="3">Puente de Ixtla</option>
                                <option value="4">Tlaltizapan</option>
                                <option value="5">Tlaquiltenango</option>
                                <option value="6">Xoxocotla</option>
                                <option value="7">Zacatepec</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="codigopostal">Aclaraciones:</label>
                            <textarea class="form-control" name="name" rows="8" cols="60" placeholder="Aclaraciones (opcional)"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="container my-5 py-5 ">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-xs-12">
                        <h1 class="text-center">Detalle del Pedido</h1>
                    <div class="container my-5">
                        <h1 class="text-center">Productos</h1>
                        <?php
                        $productoPedidoController = new ProductoPedidoController();
                        if(isset($_SESSION['productos']))
                            $productoPedidoController->showProductosPedido($_SESSION['productos']);
                        ?>
                        <span >
                            <?php
                        if(isset($_SESSION['productos']))
                                echo 'Total $'.$productoPedidoController->getTotal($_SESSION['productos']).' MXN';
                            ?>
                        </span>
                        <?php
                            $promocionPedidoController = new PromocionPedidoController();
                            if(isset($_SESSION['promos']))
                                $promocionPedidoController->showPromos($_SESSION['promos']);
                        ?>
                        <center style="align-self: end;">
                            <button type="button" class="btn btn-default">Confirmar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
            
            
        </div>
        <?php
        include_once 'lib/modules/footer.php';
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
