<?php
include_once 'lib/model/dto/Categoria.php';
/**
 * Description of CategoriaView
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class CategoriaView {

    public function showCategorias(array $categorias) {
        ?>
<div class="row justify-content-center bg-dark">
    <?php
        foreach ($categorias as $categoria){
            $this->showCategoria ($categoria);
        }
        ?>
</div>
    <?php
    }
    
    public function showCategoria(Categoria $categoria){
        ?>
    <div class="category col-xl-4 col-md-6 col-xs-12">
        <img src="images/cat.jpg" alt= "<?php echo $categoria->getNombre()?>">
        <a class="btn" href="menu.php?categoria=<?php echo $categoria->getIdCategoria();?>#menu"> <?php echo $categoria->getNombre();?></a>
        </div>
        <?php
    }
}
