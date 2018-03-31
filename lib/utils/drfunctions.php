<?php
/**/

function getPostString($name){
    return filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
}

function getPostInt($name){
    return intval(filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT));
}

function postVarExists($name){
    return filter_has_var(INPUT_POST, $name);
}

function getGetString($name){
    return filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
}

function getGetInt($name){
    return intval(filter_input(INPUT_POST, $name, FILTER_SANITIZE_NUMBER_INT));
}

function getVarExists($name){
    return filter_has_var(INPUT_GET, $name);
}

?>