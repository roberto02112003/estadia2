<?php
session_start();
include '../controladores/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/Style.css">
    <title>Inicio de sesion</title>
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
                      <a class="nav-link disabled" href="myv.php">MISION Y VISION</a>

                      </div>
                    </div>
                    <form class="form-inline">
                    <a class="btn btn-outline-success" href="eleccion_i.php">Iniciar sesion</a>
                    <a class="btn btn-outline-success" href="eleccion.php">Registrarse</a>
                      </form>
                  </nav>
                  </div>
    </header>
    
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
<div class="card">
  <h5 class="card-header">INICIA SESION</h5>
  <div class="card-body">
  <form method="POST" >

  <div class="form-group">
          <?php
          include "../controladores/login.php";
          ?> 
      <br>
    <label for="inputAddress">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario" pattern="[A-Za-z0-9-]{1,1000000}" placeholder="Ingresa tu usuario">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Contraseña</label>
    <input type="password" class="form-control" id="contrasena" pattern="[A-Za-z0-9-]{1,1000000}" name="contrasena" placeholder="Ingresa tu contraseña">
  </div>
  <button type="submit" value="Guardar" name="btniniciar" class="btn btn-primary">Enviar</button>
  <a class="btn btn-outline-danger"href="../inicio.php">Cancelar</a>
</form>
  </div>
  </div>
</div>
</div>

</body>
</html>