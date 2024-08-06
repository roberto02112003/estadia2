<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Style.css">
    <title>Agendar Citas</title>
</head>
<body class="body_index">
    <header>
        <div>
            <nav class="navbar navbar-expand-lg menu">
                <a class="nav-link liga" href="sesion_i.php">INICIO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link liga" href="cita_vista.php">CITAS CREADAS</a>
                        <a class="nav-link disabled" href="alta_citas.php">AGENDAR CITAS</a>
                        <a class="nav-link liga" href="contacto_i.php">CONTACTO</a>
                        <a class="nav-link liga" href="myv_i.php">MISION Y VISION</a>
                        <a class="nav-link liga" href="mostrar_usuario.php">PERFIL</a>
                    </div>
                </div>
                <form class="form-inline">
                    <a class="btn btn-outline-danger" href="inicio.php">Cerrar Sesión</a>
                </form>
            </nav>
        </div>
    </header>

    <main>
        <div class="container mt-5">
            <div class="card">
                <h5 class="card-header">Agendar Cita</h5>
                <div class="card-body">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_SESSION['error']); ?>
                        </div>
                        <?php unset($_SESSION['error']); // Limpia el mensaje de error después de mostrarlo ?>
                    <?php endif; ?>

                    <form action="controladores/alta_cita.php" method="post">
                        <div class="form-group">
                            <label for="area">Área</label>
                            <input type="text" class="form-control" id="area" name="area" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora</label>
                            <input type="time" class="form-control" id="hora" name="hora" required>
                        </div>
                        <div class="form-group">
                            <label for="comentario">Comentarios</label>
                            <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <br>
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

</body>
</html>
