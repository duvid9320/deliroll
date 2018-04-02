<?php
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/view/ProductoPedidoView.php';
include_once 'lib/model/dao/ProductoPedidoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoPedidoController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ProductoPedidoController {

    private $serializedProductosPedido;

    function __construct($serializedProductosPedido) {
        $this->serializedProductosPedido = $serializedProductosPedido;
    }

    public function hasProducts() {
        return !is_null($this->serializedProductosPedido) && !empty($this->serializedProductosPedido);
    }

    public function registerProductsPedido($idPedido) {
        if(!$this->hasProducts())
            return false;
        $dao = ProductoPedidoDAO::getInstance();
        foreach ($this->serializedProductosPedido as $productoPedido)
            if (!$dao->createProductoPedido($this->unserializeProductoPedido($productoPedido)->setIdPedido($idPedido)))
                return false;
        return true;
    }

    public function getTotal() {
        $total = doubleval(0);
        if ($this->hasProducts())
            foreach ($this->serializedProductosPedido as $productoPedido)
                $total += $this->unserializeProductoPedido($productoPedido)->getSubTotal();
        return $total;
    }

    public function unserializeProductoPedido($serialized): ProductoPedido {
        return is_object($serialized) ? $serialized : unserialize($serialized);
    }

    public function showTableProductosPedido(bool $unserialized = false) {
        if (!$this->hasProducts())
            return;
        $productoPedidoView = new ProductoPedidoView();
        ?>
        <div class="col-12">
            <h2 class="text-center">Productos</h2>
            <table class="table table-responsive-sm text-center table-bordered table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(boolval($unserialized))
                        foreach ($this->serializedProductosPedido as $productoPedido)
                            $productoPedidoView->showProductoPedidoRow($productoPedido);
                    else 
                        foreach ($this->serializedProductosPedido as $productoPedido)
                            $productoPedidoView->showProductoPedidoRow($this->unserializeProductoPedido($productoPedido));
                    ?>
                    <tr class="bg-primary text-center text-white">
                        <td colspan="4">
                            <h1>$<?php echo $this->getTotal() ?> MXN</h1>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }

    public function showTableModifyProductosPedido() {
        if (!$this->hasProducts())
            return;
        $productoPedidoView = new ProductoPedidoView();
        ?>
        <table class="table table-responsive-sm text-center table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>¿Eliminar?</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Sub-total</th>
                    <th>Cantidad</th>
                    <th>¿Modificar?</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->serializedProductosPedido as $productoPedido)
                    $productoPedidoView->showModifyProductoPedidoRow($this->unserializeProductoPedido($productoPedido));
                ?>
                <tr class="bg-primary text-center text-white">
                    <td colspan="6">
                        <h1>$<?php echo $this->getTotal() ?> MXN</h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

}
