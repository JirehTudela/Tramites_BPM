<?php
require_once 'GestorTramites.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaInscripcion = [
        "id_tramite" => "INS-" . rand(1000, 9999),
        "ci_estudiante" => $_POST['ci_estudiante'],
        "ru_estudiante" => $_POST['ru_estudiante'],
        "nombre" => $_POST['nombre'],
        "materias_solicitadas" => isset($_POST['materias']) ? $_POST['materias'] : [],
        "fecha_solicitud" => date("Y-m-d"),
        "estado" => "En Revisión"
    ];

    $gestor = new GestorTramites();
    $gestor->registrarInscripcion($nuevaInscripcion);

    echo "<h2>¡Inscripción registrada con éxito!</h2>";
    echo "<a href='index.php'>Volver al inicio</a>";
}
?>