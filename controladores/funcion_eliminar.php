<?php
// Asegúrate de incluir la conexión a la base de datos
include "../controladores/conexion.php";

// Verifica si se ha proporcionado un ID de cita y si no está vacío
if (!empty($_GET["id_c"])) {
    $id_c = intval($_GET["id_c"]); // Asegúrate de que el ID sea un entero

    // Prepara la consulta para evitar inyecciones SQL
    $sql = "DELETE FROM cita WHERE id_c = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_c);

    if ($stmt->execute()) {
        // Redirige a la página de citas después de eliminar la cita
        header("Location: ../cita_vista.php");
    } else {
        die("Error al eliminar la cita: " . $conexion->error);
    }

    $stmt->close();
}
?>
