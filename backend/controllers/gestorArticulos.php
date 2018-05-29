<?php

class GestorArticulos {
    #MOSTRAR IMAGEN ARTÍCULO
    #------------------------------------------------------------

    public function mostrarImagenController($datos) {

        list($ancho, $alto) = getimagesize($datos);

        if ($ancho < 800 || $alto < 400) {

            echo 0;
        } else {

            $aleatorio = mt_rand(100, 999);
            $ruta = "../../views/images/articulos/temp/articulo" . $aleatorio . ".jpg";
            $origen = imagecreatefromjpeg($datos);
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            imagejpeg($destino, $ruta);

            echo $ruta;
        }
    }

    #GUARDAR ARTICULO
    #-----------------------------------------------------------

    public function guardarArticuloController() {

        if (isset($_POST["tituloArticulo"])) {

            $imagen = $_FILES["imagen"]["tmp_name"];

            $borrar = glob("views/images/articulos/temp/*");

            foreach ($borrar as $file) {

                unlink($file);
            }

            $aleatorio = mt_rand(100, 999);

            $ruta = "views/images/articulos/articulo" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($imagen);

            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);

            imagejpeg($destino, $ruta);

            $datosController = array("titulo" => $_POST["tituloArticulo"],
                "introduccion" => $_POST["introArticulo"] . "...",
                "ruta" => $ruta,
                "contenido" => $_POST["contenidoArticulo"],
                "precio" => $_POST["precio"],
                "estado" => isset($_POST['estado']) && $_POST['estado'] == 'ON' ? '1' : '0',
                "idCategoria" => $_POST["idCategoria"]
            );

            $respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "articulos");

            if ($respuesta == "ok") {

                echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
							  } 
					});


				</script>';
            } else {

                var_dump($respuesta);
            }
        }
    }

    #MOSTRAR ARTICULOS
    #-----------------------------------------------------------

    public function mostrarArticulosController() {

        $respuesta = GestorArticulosModel::mostrarArticulosModel("articulos");

        foreach ($respuesta as $row => $item) {
            ?>
            <li id="<?php echo $item["id"] ?>" class="bloqueArticulo">
                <span class="handleArticle">
                    <a href="index.php?action=articulos&idBorrar=<?php echo $item["id"] . '&rutaImagen=' . $item["ruta"] ?>">
                        <i class="fa fa-times btn btn-danger"></i>
                    </a>
                    <i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
                </span>
                <img src="<?php echo $item["ruta"] ?>" class="img-thumbnail">
                <h1><?php echo $item["titulo"] ?></h1>
                <h2><?php echo $item["precio"] ?></h2>
                <p><?php echo $item["introduccion"] ?></p>
                <input id="contenido" type="hidden" name="contenido" value="<?php echo $item["contenido"] ?>">
                <input id="estado" type="hidden" name="estado" value="<?php echo $item["estado"] ?>">
                <a href="#articulo<?php echo $item["id"] ?>" data-toggle="modal">
                    <button class="btn btn-default">Leer Más</button>
                </a>

                <hr>

            </li>

            <div id="articulo<?php echo $item["id"] ?>" class="modal fade">

                <div class="modal-dialog modal-content">

                    <div class="modal-header" style="border:1px solid #eee">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title"><?php echo $item["titulo"] ?></h3>

                    </div>

                    <div class="modal-body" style="border:1px solid #eee">

                        <img src="<?php echo $item["ruta"] ?>" width="100%" style="margin-bottom:20px">
                        <p class="parrafoContenido"><?php echo $item["contenido"] ?></p>

                    </div>

                    <div class="modal-footer" style="border:1px solid #eee">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

                </div>

            </div> <?php
        }
    }

    #BORRAR ARTICULO
    #------------------------------------

    public function borrarArticuloController() {

        if (isset($_GET["idBorrar"])) {

            unlink($_GET["rutaImagen"]);

            $datosController = $_GET["idBorrar"];

            $respuesta = GestorArticulosModel::borrarArticuloModel($datosController, "articulos");

            if ($respuesta == "ok") {

                echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
							  } 
					});


				</script>';
            }
        }
    }

    #ACTUALIZAR ARTICULO
    #-----------------------------------------------------------

    public function editarArticuloController() {

        $ruta = "";

        if (isset($_POST["editarTitulo"])) {

            if (isset($_FILES["editarImagen"]["tmp_name"])) {

                $imagen = $_FILES["editarImagen"]["tmp_name"];

                $aleatorio = mt_rand(100, 999);

                $ruta = "views/images/articulos/articulo" . $aleatorio . ".jpg";

                $origen = imagecreatefromjpeg($imagen);

                $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);

                imagejpeg($destino, $ruta);

                $borrar = glob("views/images/articulos/temp/*");

                foreach ($borrar as $file) {

                    unlink($file);
                }
            }

            if ($ruta == "") {

                $ruta = $_POST["fotoAntigua"];
            } else {

                unlink($_POST["fotoAntigua"]);
            }
            
            $datosController = array("id" => $_POST["id"],
                "titulo" => $_POST["editarTitulo"],
                "introduccion" => $_POST["editarIntroduccion"],
                "ruta" => $ruta,
                "contenido" => $_POST["editarContenido"],
                "precio" => $_POST['editarPrecio'],
                "idCategoria" => $_POST['editarIdCategoria'],
                "estado" => isset($_POST['editarEstado']) ? "1":"0" 
                );

            $respuesta = GestorArticulosModel::editarArticuloModel($datosController, "articulos");

            if ($respuesta == "ok") {

                echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
							  } 
					});


				</script>';
            } else {

                var_dump($respuesta);
            }
        }
    }

    #ACTUALIZAR ORDEN 
    #---------------------------------------------------

    public function actualizarOrdenController($datos) {

        GestorArticulosModel::actualizarOrdenModel($datos, "articulos");

        $respuesta = GestorArticulosModel::seleccionarOrdenModel("articulos");

        foreach ($respuesta as $row => $item) {

            echo ' <li id="' . $item["id"] . '" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar=' . $item["id"] . '&rutaImagen=' . $item["ruta"] . '">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
					<img src="' . $item["ruta"] . '" class="img-thumbnail">
					<h1>' . $item["titulo"] . '</h1>
					<p>' . $item["introduccion"] . '</p>
					<input type="hidden" value="' . $item["contenido"] . '">
					<a href="#articulo' . $item["id"] . '" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="articulo' . $item["id"] . '" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">' . $item["titulo"] . '</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="' . $item["ruta"] . '" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">' . $item["contenido"] . '</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';
        }
    }

}
