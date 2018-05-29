<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorCategoria
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class GestorCategoria {

    public function guardarCategoria() {
        if (!isset($_POST['nombreCategoria']) || !isset($_POST['descripcionCategoria']))
            return;

        $respuesta = Categoria::guardarCategoria([
            "nombre" => $_POST['nombreCategoria'],
            "descripcion" => $_POST['descripcionCategoria']
        ]);
        
        if ($respuesta) {
            echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La categoria se ha creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "categoria";
							  } 
					});


				</script>';
        } else {

            echo $respuesta;
        }
    }

}
