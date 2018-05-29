<?php
session_start();

if (!$_SESSION["validar"]) {

    header("location:ingreso");

    exit();
}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";
?>
<!--=====================================
Categoria
======================================-->

<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12 my-3">

    <button id="btnAgregarCategoria" class="btn btn-info btn-lg">Agregar Categoria</button>

    <!--==== AGREGAR ARTÍCULO  ====-->

    <div id="agregarCategoria" style="display:none">

        <form method="post" enctype="multipart/form-data">

            <input name="nombreCategoria" type="text" placeholder="Nombre de la Categoria" class="form-control" required>

            <textarea name="descripcionCategoria" id="" cols="30" rows="5" placeholder="Descripción de la categoria" class="form-control"  maxlength="45" required></textarea>
            
            <input type="submit" id="guardarArticulo" value="Guardar Categoria" class="btn btn-primary">

        </form>

    </div>

    <?php
    $controller = new GestorCategoria();
    $controller->guardarCategoria();
    ?>

    <hr>

    <!--==== EDITAR ARTÍCULO  ====-->

<!--    <ul id="editarCategoria">

        <?php
//        $mostrarArticulo = new GestorArticulos();
//        $mostrarArticulo->mostrarArticulosController();
//        $mostrarArticulo->borrarArticuloController();
//        $mostrarArticulo->editarArticuloController();
        ?>

    </ul>

    <button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Artículos</button>

    <button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Artículos</button>-->

</div>

<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->

