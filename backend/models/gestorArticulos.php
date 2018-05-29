<?php

require_once "conexion.php";

class GestorArticulosModel {
    #GUARDAR ARTICULO
    #------------------------------------------------------------

    public function guardarArticuloModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, contenido, orden, precio, estado, idCategoria) VALUES (:titulo, :introduccion, :ruta, :contenido, :orden, :precio, :estado, :idCategoria)");

        $stmt->bindParam(":titulo", $datosModel["titulo"]);
        $stmt->bindParam(":introduccion", $datosModel["introduccion"]);
        $stmt->bindParam(":ruta", $datosModel["ruta"]);
        $stmt->bindParam(":contenido", $datosModel["contenido"]);
        $stmt->bindParam(":precio", $datosModel["precio"]);
        $stmt->bindParam(":estado", $datosModel["estado"]);
        $stmt->bindParam(":idCategoria", $datosModel["idCategoria"]);
        $stmt->bindParam(":orden", $orden = '1');
        
        var_dump($datosModel);
        var_dump($stmt);
        
         try{
            return $stmt->execute() ? "ok" : $stmt->errorInfo();
        } catch (Exception $ex) {
            return $ex->getTraceAsString();
        } finally {
            $stmt->closeCursor();
        }
    }

    #MOSTRAR ARTÍCULOS
    #------------------------------------------------------

    public function mostrarArticulosModel($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido, precio, estado FROM $tabla ORDER BY orden ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }

    #BORRAR ARTICULOS
    #-----------------------------------------------------

    public function borrarArticuloModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
    }

    #ACTUALIZAR ARTICULOS
    #---------------------------------------------------

    public function editarArticuloModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado, titulo = :titulo, introduccion = :introduccion, ruta = :ruta, contenido = :contenido, precio = :precio, idCategoria = :idCategoria WHERE id = :id");

        $stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datosModel['precio']);
        $stmt->bindParam(":idCategoria", $datosModel['idCategoria']);
        $stmt->bindParam(":estado", $datosModel['estado']);
        
        try{
            return $stmt->execute() ? "ok" : $stmt->errorInfo();
        } catch (Exception $ex) {
            return $ex->getTraceAsString();
        } finally {
            $stmt->closeCursor();
        }
    }

    #ACTUALIZAR ORDEN 
    #---------------------------------------------------

    public function actualizarOrdenModel($datos, $tabla) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

        $stmt->bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["ordenArticulos"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    #SELECCIONAR ORDEN 
    #---------------------------------------------------

    public function seleccionarOrdenModel($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
    }

}
