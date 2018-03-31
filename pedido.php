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
        include_once 'lib/utils/drfunctions.php';

        if (!isset($_SESSION['productos']) && empty($_SESSION['productos']) && !isset($_SESSION['promos']) && empty($_SESSION['promos'])) {
            ?>
            <script type="text/javascript">
                alert("No tienes ningún producto ó promoción en el carrito.");
                window.location = "index.php";
            </script>
            <?php
        }else if (getGetString('action') == 'confirm')
            include_once 'lib/modules/pedido/confirm.php';
        else if (getGetString('action') == 'update')
            include_once 'lib/modules/pedido/update.php';
        else if (getGetString('action') == 'delete') {
            unset($_SESSION['productos']);
            unset($_SESSION['promos']);
            header("Location: pedido.php?action=confirm");
        }
        include_once 'lib/modules/footer.php';
        ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
