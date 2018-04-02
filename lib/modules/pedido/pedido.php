<?php
include_once 'lib/utils/drfunctions.php';
include_once 'lib/model/dto/Cliente.php';
include_once 'lib/controller/PedidoController.php';
include_once 'lib/utils/drfunctions.php';
include_once 'lib/modules/pedido/pedido.php';

if(getGetString('action') == 'query')
    include_once 'lib/modules/pedido/query.php';
else if (!sessionArrayIsValid('productos') && !sessionArrayIsValid('promos'))
    showWindowAlertAndRedirect("No tienes productos en el pedido", "menu.php");
else if (getGetString('action') == 'confirm')
    include_once 'lib/modules/pedido/confirm.php';
else if (getGetString('action') == 'update')
    include_once 'lib/modules/pedido/update.php';
else if (getGetString('action') == 'delete') {
    unset($_SESSION['productos']);
    unset($_SESSION['promos']);
    header("Location: pedido.php?action=confirm");
} else if (postVarExists('confirm-form'))
    commitPedido();

function commitPedido() {
    $pedidoController = new PedidoController(getSessionVarOrElseNull('productos'), getSessionVarOrElseNull('promos'), getClienteFromView(), getPedidoFromView());
    if ($pedidoController->pedir()) {
        savePedidoInCookie($pedidoController->getPedido());
        showSuccessAlert("Hola " . $pedidoController->getClient()->getNombre() . " tu pedido ha sido procesado!", "en unos momentos recibiras una llamada de confirmación.");
        unset($_SESSION['productos']);
        unset($_SESSION['promos']);
    } else
        showDangerAlert("Error al procesar el pedido", "");
}

function savePedidoInCookie(Pedido $pedido) {
    setcookie('idCliente', $pedido->getIdCliente(), time() + (10 * 365 * 24 * 60 * 60));
    setcookie('idPedido', $pedido->getIdPedido(), time() + (2 * 60 * 60));
}

function getPedidoFromView(): Pedido {
    $pedido = new Pedido();
    return $pedido->setDetalles(getPostString('detail'))->setEstado(false)->setFecha(date("Y-m-d H:i:s"))->setTipo(getPostString('type'));
}

function getClienteFromView(): Cliente {
    $client = new Cliente();
    if(cookieExists("idCliente"))
        $client->setIdCliente (getCookie ("idCliente"));
    return $client->setDireccion(getPostString('address'))->setNombre(getPostString('name'))->setTelefono(getPostString('phone'));
}
