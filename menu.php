<!DOCTYPE html>
<?php
include_once 'lib/controller/MenuController.php';
include_once 'lib/utils/drfunctions.php';
?>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <title>Menú DeliRoll</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <?php include_once 'lib/modules/header.php'; ?>
    </head>
    <body>
        <?php
        include_once 'lib/modules/nav.php';
        ?>
            <?php
                include_once 'lib/modules/menu/menu.php';
            ?>   
        <?php
        include_once 'lib/modules/footer.php';
        include_once 'lib/modules/footerScript.php';
        ?>
    </body>
</html>
