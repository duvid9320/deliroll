<?php
$productoPedidoController = new ProductoPedidoController();
$promocionPedidoController = new PromocionPedidoController();
$total = doubleval(0);
$productos = &$_SESSION['productos'];
$promos = &$_SESSION['promos'];
$total += is_null($productos) ? 0.0 : $productoPedidoController->getTotal($productos);
$total += is_null($promos) ? 0.0 : $promocionPedidoController->getTotal($promos);
?>
<div class="container my-5">
    <h1 class="text-center ">Detalle del Pedido</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-xs-12">
                <?php
                if (!is_null($productos) && !empty($productos)) {
                    ?>
                    <div class="col-12">
                        <h2 class="text-center">Productos</h2>
                        <?php $productoPedidoController->showTableProductosPedido($productos); ?>
                    </div>
                    <?php
                } if (!is_null($promos) && !empty($promos)) {
                    ?>
                    <div class="col-12">
                        <h2 class="text-center">Promociones</h2>
                        <?php $promocionPedidoController->showPromos($promos); ?>
                    </div>
                <?php }
                ?>
            </div>

            <div class="col-xl-6 col-xs-12">
                <div class="col-12">
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
                        <h1 class="text-center">Total $<?php echo $total ?> MXN</h1>
                        <button class="btn btn-success form-control" type="submit" value="confirmar" name="pedido" >
                            <i class="fas fa-check-circle"> Confirmar</i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
