<?php
session_start();

// Configuración de conexión
$hostDB = 'localhost';
$nameDB = 'citas';
$userDB = 'root';
$passwordDB = '';

// Crear conexión
$hostPDO = "mysql:host=$hostDB;dbname=$nameDB;";
$myConexion = new PDO($hostPDO, $userDB, $passwordDB);

// Obtener datos del formulario
$area = isset($_POST['area']) ? $_POST['area'] : null;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
$hora = isset($_POST['hora']) ? $_POST['hora'] : null;
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;

// Validar que la fecha y hora sean futuras
$currentDateTime = new DateTime();
$inputDateTime = new DateTime("$fecha $hora");

if ($inputDateTime <= $currentDateTime) {
    $_SESSION['error'] = 'La fecha y hora deben ser futuras';
    header('Location: ../alta_citas.php');
    exit();
}

// Calcular el intervalo de 5 minutos antes y después de la hora de la cita
$interval = new DateInterval('PT5M');
$startInterval = clone $inputDateTime;
$endInterval = clone $inputDateTime;
$startInterval->sub($interval);
$endInterval->add($interval);

// Validar intervalos de citas
$query = $myConexion->prepare("
    SELECT * FROM cita
    WHERE fecha = :fecha
    AND (
        (hora BETWEEN :start_interval AND :end_interval) 
        OR (hora BETWEEN :start_interval_previous AND :end_interval_previous)
    )
");
$query->execute([
    'fecha' => $fecha,
    'start_interval' => $startInterval->format('H:i:s'),
    'end_interval' => $endInterval->format('H:i:s'),
    'start_interval_previous' => $inputDateTime->format('H:i:s'),
    'end_interval_previous' => $inputDateTime->format('H:i:s'),
]);

if ($query->rowCount() > 0) {
    $_SESSION['error'] = 'No se puede crear una cita dentro de un intervalo de 5 minutos de una cita existente';
    header('Location: ../alta_citas.php');
    exit();
}

// Preparar e insertar la cita
$myInsert = $myConexion->prepare('INSERT INTO cita (area, fecha, hora, comentario) VALUES (:area, :fecha, :hora, :comentario)');
$myInsert->execute([
    'area' => $area,
    'fecha' => $fecha,
    'hora' => $hora,
    'comentario' => $comentario
]);

// Redireccionar después de la inserción
header('Location: ../sesion_i.php');
exit();
?>
