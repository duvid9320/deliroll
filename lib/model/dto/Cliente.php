<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class Cliente {
    private $idCliente;
    private $nombre;
    private $telefono;
    private $direccion;
    public function __construct() {
    }
    
    public function __toString() {
        return "idCliente: $this->idCliente<br>Nombre: $this->nombre<br>Telefono: $this->telefono<br>Direccion: $this->direccion<br>";
    }
    
    function getIdCliente() {
        return $this->idCliente;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
        return $this;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
        return $this;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
        return $this;
    }
}
