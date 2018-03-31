<?php
include_once 'lib/model/dao/ProductoDAO.php';
include_once 'lib/model/dto/ProductoPedido.php';
include_once 'lib/model/dto/PromocionPedido.php';
session_start();

if(filter_has_var(INPUT_POST, 'idProducto'))
    addProduct();
else if(filter_has_var(INPUT_POST, 'idPromo'))
    addPromo ();
else
    header ("Location: index.php");



