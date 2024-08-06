<?php
include "conexion.php";
session_start();

if (!empty($_POST["btniniciar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"];
        $sql=$conexion->query("SELECT * FROM usuarios where  usuario='$usuario' and contrasena='$contrasena' ");
        if ($valor=$sql->fetch_object()) {
            $_SESSION["ID"]=$valor->ID;
            $_SESSION["usuario"]=$valor->usuario;
            $_SESSION["contrasena"]=$valor ->contrasena;
            header("location: ../sesion_i.php");
            
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
        
    } else {
        echo"<div class='alert alert-danger'>Campos vacios</div>";
    }
    
}


?>