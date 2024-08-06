<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = isset($_REQUEST['ID']) ? $_REQUEST['ID'] : null;
    $Nombre = isset($_REQUEST['Nombre']) ? $_REQUEST['Nombre'] : null;
    $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
    $Telefono = isset($_REQUEST['Telefono']) ? $_REQUEST['Telefono'] : null;
    $contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;
    $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : null;

    // Datos de conexión
    $hostDB = 'localhost';
    $nameDB = 'citas';
    $userDB = 'root';
    $passwordDB = '';

    try {
        // Configuración de conexión
        $hostPDO = "mysql:host=$hostDB;dbname=$nameDB;charset=utf8mb4";
        $myConexion = new PDO($hostPDO, $userDB, $passwordDB);
        $myConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar INSERT
        $myInsert = $myConexion->prepare('INSERT INTO usuarios (ID, Nombre, contrasena, usuario, Telefono, correo)
                                           VALUES (:ID, :Nombre, :contrasena, :usuario, :Telefono, :correo)');

        // Ejecutar la consulta
        $myInsert->execute(array(
            'ID' => $ID,
            'Nombre' => $Nombre,
            'usuario' => $usuario,
            'Telefono' => $Telefono,
            'contrasena' => $contrasena,
            'correo' => $correo
        ));

        // Redireccionar a consulta
        header('Location: ../formularios/eleccion_i.php');
        exit(); // Asegúrate de salir después de redirigir
    } catch (PDOException $e) {
        // Manejo de errores
        echo 'Error: ' . $e->getMessage();
    }
}
?>
