<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class Categoria {

    public static function guardarCategoria(array $data) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descripcion)");
        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        var_dump($data);
        try{
            return $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
            return false;
        } finally {
            $stmt->closeCursor();
        }
    }

    
    public static function getCategorias(){
        try {
            $stm = Conexion::conectar()->prepare("SELECT id, nombre FROM categoria");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return NULL;
        } finally {
            $stm->closeCursor();
        }
    }
}
