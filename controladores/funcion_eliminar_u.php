<?php
include 'conexion.php';
if (!empty($_GET["ID"])) {
    $ID=$_GET["ID"];
    $sql=$conexion->query(" DELETE from usuarios where ID=$ID ");
    session_destroy ();
    header ('location: inicio.php');
    
}
    
?>