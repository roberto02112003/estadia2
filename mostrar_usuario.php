<?php 
session_start();

// Asegúrate de que la sesión esté iniciada y el ID del usuario esté disponible
if (!isset($_SESSION['ID'])) {
    // Redirige al usuario a la página de inicio de sesión o muestra un mensaje de error
    header("Location: inicio.php");
    exit();
}

include "controladores/conexion.php";
include "controladores/funcion_eliminar_u.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/Style.css">
    <title>Página principal</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg menu">
        <a class="nav-link liga" href="sesion_i.php">INICIO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link liga" href="cita_vista.php">CITAS CREADAS</a>
                <a class="nav-link liga" href="alta_citas.php">AGENDAR CITAS</a>
                <a class="nav-link liga" href="contacto_i.php">CONTACTO</a>
                <a class="nav-link liga" href="myv_i.php">MISIÓN Y VISIÓN</a>
                <a class="nav-link disabled" href="mostrar_usuario.php">PERFIL</a>
            </div>
        </div>
        <form class="form-inline">
            <a class="btn btn-outline-danger" href="inicio.php">Cerrar Sesión</a>
        </form>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-7">
                <div class="card carta_perfil">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="informacion">INFORMACIÓN DE CUENTA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card_cuerpo">
                        <?php
                        $sql = $conexion->query("SELECT * FROM usuarios WHERE ID = '$_SESSION[ID]'");
                        if ($sql->num_rows > 0) {
                            while($valor = $sql->fetch_object()) { ?>
                                <h3><?= htmlspecialchars($valor->Nombre) ?></h3>
                                <h5>Usuario:</h5>
                                <p><?= htmlspecialchars($valor->usuario) ?></p>
                                <h5>Teléfono:</h5>
                                <p><?= htmlspecialchars($valor->Telefono) ?></p>
                                <h5>Correo:</h5>
                                <p><?= htmlspecialchars($valor->correo) ?></p>
                                <div class="btn_modal_paciente">
                                    <a class="btn btn-outline-primary" href="editar_usuario.php">Editar</a>
                                    <a onclick="return eliminar()" href="?ID=<?= $valor->ID ?>" class="btn btn-outline-danger">Eliminar</a>
                                </div>
                            <?php } 
                        } else {
                            echo "<p>No se encontró la información del usuario.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</main>
<footer>
    <div class="container">
        <section class="row">
            <section class="col-4">
                <h2>Ubicación</h2>
                <p>Av Patricio Trueba de Regil s/n, San Rafael, 24090 San Francisco de Campeche, Camp.</p>
            </section>
            <section class="col-4">
                <h2>Síguenos</h2>
                <img src="img/Redes_sociales/Dakirby309-Simply-Styled-YouTube.24.png" alt="">
                <img src="img/Redes_sociales/instagram.png" height="20" width="20" alt="">
                <img src="img/Redes_sociales/Limav-Flat-Gradient-Social-Linkedin.24.png" alt="">
                <img src="img/Redes_sociales/Papirus-Team-Papirus-Apps-Gnome-twitch.24.png" alt="">
                <img src="img/Redes_sociales/Yootheme-Social-Bookmark-Social-facebook-box-blue.24.png" alt="">
                <p>&copy; 2024 Política de privacidad</p>
            </section>
        </section>
    </div>
</footer>
</body>
</html>
