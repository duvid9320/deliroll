<?php
include_once 'lib/utils/drfunctions.php';
$promocionController = new PromocionController();

if (postVarExists('add-promo'))
    addPromo();

function addPromo() {
    $pedido = new PromocionPedido();
    $pedido->setIdPromocion((int) getPostString('idPromo'))->setCantidad((int) getPostString('cantidad'));
    if (!updatePromo($pedido->getIdPromocion(), $pedido->getCantidad()))
        $_SESSION['promos'][] = serialize($pedido);
    header("Refresh:10;");
    ?>
    <div class="text-center alert alert-success alert-dismissible fade show m-0 container-fluid" role="alert">
        <strong>La promoción se ha agregado al pedido!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}

function updatePromo($id, $cantidad) {
    if (!isset($_SESSION['promos']))
        return false;
    foreach ($_SESSION['promos'] as $idx => $promo) {
        if (getPromo($promo)->getIdPromocion() == $id) {
            $promo = getPromo($promo);
            $_SESSION['promos'][$idx] = serialize($promo->setCantidad($cantidad+$promo->getCantidad()));
            ?>
    <div class="text-center alert alert-warning alert-dismissible fade show m-0 container-fluid" role="alert">
        <strong>La promoción ya existe, se ha incrementado la cantidad a <?php echo $promo->getCantidad()?> promociones</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
            return true;
        }
    }
}

function getPromo($serialized): PromocionPedido {
    return unserialize($serialized);
}

function debug() {
    foreach ($_REQUEST as $key => $value) {
        echo $key . " => " . $value . "<br>";
    }
}
?>
<div class="container-fluid">
    <?php
    $promocionController->showPromociones();
    ?>
</div>