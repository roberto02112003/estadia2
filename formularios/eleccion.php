<?php 
include '../controladores/alta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/Style.css">
    <title>Elección</title>
    <script>
        function validateForm() {
            // Obtener los valores de los campos
            var usuario = document.getElementById('usuario').value.trim();
            var contrasena = document.getElementById('contrasena').value.trim();
            var nombre = document.getElementById('Nombre').value.trim();
            var telefono = document.getElementById('Telefono').value.trim();
            var correo = document.getElementById('correo').value.trim();

            // Verificar si alguno de los campos está vacío después de recortar los espacios
            if (usuario === "" || contrasena === "" || nombre === "" || telefono === "" || correo === "") {
                alert("Ningún campo debe estar vacío o contener solo espacios en blanco.");
                return false; // Evitar el envío del formulario
            }

            return true; // Permitir el envío del formulario
        }
    </script>
</head>
<body>
    
<header>
    <div>
        <nav class="navbar navbar-expand-lg menu">
            <a class="nav-link liga" href="../inicio.php">INICIO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link disabled">CITAS CREADAS</a>
                    <a class="nav-link disabled" href="alta_citas.php">AGENDAR CITAS</a>
                    <a class="nav-link disabled" href="contacto.php">CONTACTO</a>
                    <a class="nav-link disabled" href="myv.php">MISIÓN Y VISIÓN</a>
                </div>
            </div>
            <form class="form-inline">
                <a class="btn btn-outline-success" href="eleccion_i.php">Iniciar sesión</a>
                <a class="btn btn-outline-success" href="eleccion.php">Registrarse</a>
            </form>
        </nav>
    </div>
</header>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="card">
            <h5 class="card-header">REGÍSTRATE</h5>
            <div class="card-body">
                <form class="container" action="../controladores/alta.php" method="POST" onsubmit="return validateForm()">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>

                    <div class="form-group col-md-6">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" required placeholder="Ingresa tu usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="Ingresa tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Número Telefónico</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ejemplo: 981-139-7736">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required placeholder="Ejemplo: roberto@gmail.com">
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <a class="btn btn-outline-primary" href="eleccion_i.php">Iniciar sesión</a>
                            <button type="submit" value="Guardar" name="btnregistrar" class="btn btn-outline-success">Registrarte</button>
                            <a class="btn btn-outline-danger" href="../inicio.php">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
