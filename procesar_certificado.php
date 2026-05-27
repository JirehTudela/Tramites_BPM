<?php
require_once 'GestorTramites.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoCertificado = [
        "id_tramite" => "CER-" . rand(1000, 9999),
        "ci_estudiante" => $_POST['ci_estudiante'],
        "ru_estudiante" => $_POST['ru_estudiante'],
        "tipo_certificado" => $_POST['tipo_certificado'],
        "fecha_solicitud" => date("Y-m-d"),
        "estado" => "Solicitado"
    ];

    $gestor = new GestorTramites();
    $gestor->registrarCertificado($nuevoCertificado);

    echo "<h2>¡Solicitud de certificado enviada con éxito!</h2>";
    echo "<a href='index.php'>Volver al inicio</a>";
}
?>