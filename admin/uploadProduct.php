<!DOCTYPE html>
<?php
include_once 'lib/controller/MenuController.php';
include_once 'lib/utils/drfunctions.php';
?>
<html lang="es-mx">
    <head>
        <meta charset="utf-8">
        <title>Upload product</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <?php include_once 'lib/modules/header.php'; ?>
    </head>
    <body>
        <?php
        include_once 'lib/modules/nav.php';
        ?>

        <div class="container my-5">
            <div class="row justify-content-center">
                <form class="col-xl-8 col-xs-12">
                    <div class="form-group row">
                        <label for="productName" class="col-xl-3 col-xs-4 col-form-label">Nombre</label>
                        <div class="col-xl-9 col-xs-8">
                            <input name="nombre" required="" type="text" class="form-control" id="productName" placeholder="Nombre del producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="productDescription" class="col-xl-3 col-xs-4 col-form-label">Descripción</label>
                        <div class="col-xl-9 col-xs-8">
                            <textarea name="descripcion" required="" class="form-control" placeholder="Descripción del producto" id="productDescription" name="" rows="4" cols="20" >
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="productPrice" class="col-xl-3 col-xs-4 col-form-label">Precio</label>
                        <div class="col-xl-9 col-xs-8">
                            <input name="precio" placeholder="Ingresa el precio del producto"type="text" class="form-control" id="productPrice" required pattern="[0-9]+[\.[0-9]{1,2}]{0,1}"/>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-xl-3 col-xs-4">¿Está disponible?</div>
                        <div class="col-xl-9 col-xs-8">
                            <div class="form-check">
                                <input name="estado" class="form-check-input" type="checkbox" id="gridCheck1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-xs-4 col-form-label" for="categoryId">Seleccione la categoría del producto</label>
                        <div class="input-group col-xl-9 col-xs-8">
                            <select id="categoryId" name="idCategoria" data-live-search="true" class="form-control">
                                <option class="align-items-center" value="1" >Bebidas</option>
                                <option class="align-items-center" value="2" >Otra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-xs-4 col-form-label" for="image">Imagen del producto</label>
                        <div class="custom-file col-xl-9 col-xs-8">
                            <input name="imagen" required="" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Subir imagen</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-9 col-xs-8">
                            <button type="submit" class="btn btn-primary">Registrar producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        include_once 'lib/modules/footer.php';
        include_once 'lib/modules/footerScript.php';
        ?>
    </body>
</html>