

<?php
    include_once 'lib/controller/MenuController.php';

    $menuController = new MenuController();
    $menuController->showMenuCategorias();
    ?>
<div class="container-fluid menu bg-white">
<?php
    $menuController->showSubMenuCategorias();
    ?>

</div>