<?php

session_start();

?>
<!doctype html>
<html lang="en">
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
                <a class="nav-link liga" href="mostrar_usuario.php">PERFIL</a>
            </div>
        </div>
        <form class="form-inline">
            <a class="btn btn-outline-danger" href="inicio.php">Cerrar Sesión</a>
        </form>
    </nav>
</header>
  <body>
  
      <main>
     
      
      <form class="col-4 p-3 m-auto"  method="POST">
         <h3 class="text-center text-dark">Modificar perfil </h3>
         <input type="hidden" name="ID" value="<?= $_GET["ID"]?>">
         <?php
       include "controladores/conexion.php";
       include 'controladores/modificar.php';
      $sql=$conexion->query("SELECT * from usuarios where ID='$_SESSION[ID]' ");
      while($valor=$sql->fetch_object()) { ?>

         <div class="mb-3">
             <label for="Nombre" class="form-label">Nombre</label>
             <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $valor->Nombre ?>">
         </div>

         <div class="mb-3">
             <label for="usuario" class="form-label">Usuario:</label>
             <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $valor->usuario ?>">
         </div>

         <div class="mb-3">
             <label for="Telefono" class="form-label">Telefono</label>
             <input type="number" class="form-control" id="Telefono" name="Telefono" value="<?= $valor->Telefono ?>">
         </div>
         <div class="mb-3">
             <label for="correo" class="form-label">Correo</label>
             <input type="mail" class="form-control" id="correo" name="correo" value="<?= $valor->correo ?>">
         </div>
         
       

        
         <?php }
         ?>
         <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
        <a class="btn btn-secondary" href="mostrar_usuario.php">Atras</a>
     </form>
<br><br>
     <footer>
        <div class="container">
        <br>
            <section class="row" >
                <section class="col-4">
                    <h2>Ubicación</h2>
                    <p>Av Patricio Trueba de Regil s/n, San Rafael, 24090 San Francisco de Campeche, Camp.</p>
                    <br>
                    
                    </section>
                    <section class="col-4">
                        <h2>Síguenos</h2>
                        <img src="img/Redes_sociales/Dakirby309-Simply-Styled-YouTube.24.png" alt="">
                        <img src="img/Redes_sociales/instagram.png" height="20"width="20"alt="">
                        <img src="img/Redes_sociales/Limav-Flat-Gradient-Social-Linkedin.24.png" alt="">
                        <img src="img/Redes_sociales/Papirus-Team-Papirus-Apps-Gnome-twitch.24.png" alt="">
                        <img src="img/Redes_sociales/Yootheme-Social-Bookmark-Social-facebook-box-blue.24.png" alt="">
                        <p>&copy; 2024 Politica de privacidad</p>
                    </section>
                  
                    </div>
    </footer>
      </main>
      
    

   
   
  </body>
</html>