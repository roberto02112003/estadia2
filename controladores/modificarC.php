<?php
session_start();
include "conexion.php";

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['ID'])) {
    header("Location: inicio.php");
    exit();
}

// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $id_c = $_POST['id_c'];
    $area = $_POST['area'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $comentario = $_POST['comentario'];

    // Actualiza la cita en la base de datos
    $sql = "UPDATE cita SET area = ?, fecha = ?, hora = ?, comentario = ? WHERE id_c = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $area, $fecha, $hora, $comentario, $id_c);

    if ($stmt->execute()) {
        header("Location: ../cita_vista.php?");
        exit();
    } else {
        die("Error en la actualización: " . $conexion->error);
    }
} else {
    // Si no se ha enviado el formulario, redirige al usuario
    header("Location: cita_vista.php");
    exit();
}
?>
