<?php
include_once 'lib/utils/drfunctions.php';
include_once 'lib/controller/PedidoController.php';

if(!cookieExists('idPedido'))
    showWindowAlertAndRedirect("No haz confirmado ningún pedido el día de hoy", "menu.php");
$pedidoController = new PedidoController(NULL, NULL, NULL, NULL);
$pedidoController->showPedidoFromDatabase(getCookie('idPedido'));
