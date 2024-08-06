<?php


if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["Nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["Telefono"]) and !empty($_POST["correo"]) ) {
        
     
        $Nombre=$_POST["Nombre"];
        $usuario=$_POST["usuario"];
        $Telefono=$_POST["Telefono"];
        $correo=$_POST["correo"];


        $sql=$conexion->query("UPDATE usuarios set Nombre='$Nombre', usuario='$usuario', Telefono=$Telefono, correo=$correo  where ID='$_SESSION[ID]'");
        if ($sql==1) {
            header("location: ../mostrar_usuario.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el perfil.</div>";
        }
        
    }else{
        echo "<div class='alert alert-warning'>Campos vacios</div>";
    }
}

?>