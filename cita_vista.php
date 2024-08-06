<?php
session_start();
include "controladores/conexion.php";

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['ID'])) {
    header("Location: inicio.php");
    exit();
}

// Consulta para obtener todas las citas
$sql = "SELECT * FROM cita";
$result = $conexion->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conexion->error);
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
    <link rel="stylesheet" href="css/style.css">
    <title>Citas Creadas</title>
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
                <a class="nav-link disabled" href="cita_vista.php">CITAS CREADAS</a>
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
    <div class="container tabla_citas">
        <div class="card">
            <h5 class="card-header">Citas Agendadas</h5>
            <div class="card-body">
                <?php if (isset($_GET['message'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars($_GET['message']) ?>
                    </div>
                <?php } ?>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th hidden scope="col">ID</th>
                            <th scope="col">Área</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Comentarios</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td hidden><?= htmlspecialchars($row['id_c']) ?></td>
                                    <td><?= htmlspecialchars($row['area']) ?></td>
                                    <td><?= htmlspecialchars($row['fecha']) ?></td>
                                    <td><?= htmlspecialchars($row['hora']) ?></td>
                                    <td><?= htmlspecialchars($row['comentario']) ?></td>
                                    <td>
                                        <a href="editar_cita.php?id_c=<?= htmlspecialchars($row['id_c']) ?>" class="btn btn-outline-primary">Editar</a>
                                        <a onclick="return eliminar()" href="controladores/funcion_eliminar.php?id_c=<?= htmlspecialchars($row['id_c']) ?>" class="btn btn-outline-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "<tr><td colspan='6'>No hay citas agendadas.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<br><br><br><br><br>
<footer>
    <div class="container">
        <section class="row">
            <section class="col-4">
                <h2>Ubicación</h2>
                <p>Av Patricio Trueba de Regil s/n, San Rafael, 24090 San Francisco de Campeche, Camp.</p>
            </section>
            <section class="col-8">
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

<script>
function eliminar() {
    return confirm("¿Estás seguro de que deseas eliminar esta cita?");
}
</script>
</body>
</html>
