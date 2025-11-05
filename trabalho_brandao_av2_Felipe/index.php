<?php

include_once "topo.php";
include_once "menu.php";

//conteudos das paginas
if(empty($_SERVER['QUERY_STRING'])){
    $var = "principal";
    include_once "$var.php";
}else{
    $pg = $_GET['pg'];
    include_once "$pg.php";

    }
include_once "rodape.php";
?>

