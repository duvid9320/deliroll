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
ARTÍCULOS ADMINISTRABLE          
======================================-->

<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

    <button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Artículo</button>

    <!--==== AGREGAR ARTÍCULO  ====-->

    <div id="agregarArtículo" style="display:none">

        <form method="post" enctype="multipart/form-data">


            <label class="col-form-label" for="idCategoria">Selecciona la Categoria del articulo</label>
            <select id="idCategoriaSelect" name="idCategoria" data-live-search="true" class="col-form-control form-control">
                <?php
                $categoriaModel = new Categoria();
                $categorias = $categoriaModel->getCategorias();
                foreach ($categorias as $row) {
                    ?>"
                    <option class="align-items-center" value="<?php echo $row['id'] ?>" > <?php echo $row['nombre'] ?></option>
                    <?php
                }
                ?>
            </select> <br>
            <input name="tituloArticulo" type="text" placeholder="Título del Artículo" class="form-control" required>

            <input placeholder="Ingresa el precio del artículo"type="text" class="form-control" name="precio" required pattern="[0-9]+[\.[0-9]{1,2}]*"/><br>

            <textarea name="introArticulo" id="" cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control"  maxlength="170" required></textarea>

            <input id="estado" class="form-check-input" type="checkbox" name="estado" value="ON" checked="checked" />

            <label class="form-check-label" for="estado">¿Está Disponible?</label>

            <input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

            <div id="arrastreImagenArticulo">	

            </div>

            <textarea name="contenidoArticulo" id="" cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" required></textarea>

            <input type="submit" id="guardarArticulo" value="Guardar Artículo" class="btn btn-primary">

        </form>

    </div>

    <?php
    $controller = new GestorArticulos();
    $controller->guardarArticuloController();
    ?>

    <hr>

    <!--==== EDITAR ARTÍCULO  ====-->

    <ul id="editarArticulo">

        <?php
        $mostrarArticulo = new GestorArticulos();
        $mostrarArticulo->mostrarArticulosController();
        $mostrarArticulo->borrarArticuloController();
        $mostrarArticulo->editarArticuloController();
        ?>

    </ul>

    <button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Artículos</button>

    <button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Artículos</button>

</div>

<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->

