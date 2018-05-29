<?php
include_once 'lib/model/dao/CategoriaDAO.php';
include_once 'lib/view/ProductoView.php';
include_once 'lib/model/dao/ProductoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class MenuController {

    public function showMenuCategorias() {
        $categorias = CategoriaDAO::getInstance()->getAll();
        ?>
        <div class="sidenav bg-b">
            <?php foreach ($categorias AS $categoria) { ?>
                <a href="#<?php echo $this->castCategoria($categoria)->getNombre() ?>"><?php echo $this->castCategoria($categoria)->getNombre() ?></a>
            <?php } ?>
        </div>
        <?php
    }

    public function showSubMenuCategorias() {
        $categorias = CategoriaDAO::getInstance()->getAll();
        foreach ($categorias AS $categoria) {
            ?>
            <div class="container-fluid" id="<?php echo $this->castCategoria($categoria)->getNombre() ?>">
                <div class=" text-center col-md-12 col-xl-12 col-xs-12 tag bg-4">
                    <h3><?php echo $this->castCategoria($categoria)->getNombre() ?></h3>
                </div>
                <div class="row ml-0">
                    <?php $this->showProductos($categoria); ?>
                </div>
            </div>
            <?php
        }
    }

    private function showProductos(Categoria $categoria) {
        $productos = ProductoDAO::getInstance()->getArticulosDisponiblesByCategoria($categoria->getIdCategoria());
        foreach ($productos as $producto) {?>
            <div class="col-sm-4 col-lg-2 img-col prl-0 my-2">
                <img src="<?php echo $this->castProducto($producto)->getRuta()?>" alt="" class="img-product">
            </div>
            <div class="col-sm-8 col-lg-4 my-2">
                
                    <h3><?php echo $this->castProducto($producto)->getNombre() ?></h3>
                <h4> $<?php echo $this->castProducto($producto)->getPrecio()?> MXN</h4>
                <?php echo $this->castProducto($producto)->getDescripcion() ?>
            </div>
            
<?php
        }
    }

    private function castProducto($object): Articulo {
        return $object;
    }

    private function castCategoria($object): Categoria {
        return $object;
    }

}
