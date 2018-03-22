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
        include_once 'lib/modules/nav.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h4>Cliente</h4>
                    <form action="">
                        <div class="form-group">
                            <label class="sr-only" for="nombre">Nombre:</label>
                            <input class="" id="nombre" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="telefono">Teléfono:</label>
                            <input class="" id="telefono" type="text" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="domicilio">Domicilio:</label>
                            <input class="" id="domicilio" type="text" placeholder="Domicilio">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="codigopostal">Codigo Postal:</label>
                            <input class="" id="codpost" type="text" placeholder="Codigo Postal">
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
                            <textarea name="name" rows="8" cols="60" placeholder="Aclaraciones (opcional)"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h4>Pedido</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Marinero-Roll</td>
                                <td>$75</td>
                                <td>4</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <td>Marinero-Roll</td>
                                <td>$75</td>
                                <td>4</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <td>Marinero-Roll</td>
                                <td>$75</td>
                                <td>4</td>
                                <td>$300</td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="precio">
                        <span class="precio-total">Total: $</span>
                        <span class="precio-fraction">900</span>
                        <span class="precio-decimal-separator">.</span>
                        <span class="precio-cents">00</span>
                    </span>
                    <center style="align-self: end;">
                        <button type="button" class="btn btn-default">Confirmar</button>
                    </center>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                Restricciones:
                <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo
                do consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

        <?php
        include_once 'lib/modules/footer.php';
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
