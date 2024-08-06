<?php
session_start();
include "controladores/conexion.php";

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['ID'])) {
    header("Location: inicio.php");
    exit();
}

// Obtiene el ID de la cita desde la URL
$id_c = $_GET['id_c'];

// Consulta para obtener la información de la cita
$sql = "SELECT * FROM cita WHERE id_c = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_c);
$stmt->execute();
$result = $stmt->get_result();
$cita = $result->fetch_assoc();

if (!$cita) {
    die("Cita no encontrada.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/Style.css">
    <title>Editar Cita</title>
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
                <a class="nav-link liga" href="mostrar_usuario.php">PERFIL</a>
            </div>
        </div>
        <form class="form-inline">
            <a class="btn btn-outline-danger" href="inicio.php">Cerrar Sesión</a>
        </form>
    </nav>
</header>

<main>
    <div class="container">
        <h2>Editar Cita</h2>
        <form action="controladores/modificarC.php" method="post">
            <input type="hidden" name="id_c" value="<?= htmlspecialchars($cita['id_c']) ?>">
            <div class="form-group">
                <label for="area">Área</label>
                <input type="text" class="form-control" id="area" name="area" value="<?= htmlspecialchars($cita['area']) ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= htmlspecialchars($cita['fecha']) ?>" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="<?= htmlspecialchars($cita['hora']) ?>" required>
            </div>
            <div class="form-group">
                <label for="comentario">Comentarios</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3" required><?= htmlspecialchars($cita['comentario']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</main>

<footer>
    <div class="container">
        <br>
        <section class="row">
            <section class="col-4">
                <h2>Ubicación</h2>
                <p>Av Patricio Trueba de Regil s/n, San Rafael, 24090 San Francisco de Campeche, Camp.</p>
                <br>
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
