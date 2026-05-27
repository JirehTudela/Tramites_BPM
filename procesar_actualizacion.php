<?php
require_once 'GestorTramites.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gestor = new GestorTramites();

    $accion = isset($_POST['accion']) ? $_POST['accion'] : 'estado';

    if ($accion === 'estado') {
        $tipo = $_POST['tipo_tramite'];
        $id = $_POST['id_tramite'];
        $estado = $_POST['nuevo_estado'];

        if ($tipo === "inscripcion") {
            $gestor->actualizarEstadoInscripcion($id, $estado);
        } else if ($tipo === "certificado") {
            $gestor->actualizarEstadoCertificado($id, $estado);
        }

    } else if ($accion === 'materias') {
        $id = $_POST['id_tramite'];
        $nuevasMaterias = isset($_POST['materias']) ? $_POST['materias'] : [];
        
        $gestor->actualizarMateriasInscripcion($id, $nuevasMaterias);
    }

    header("Location: panel_admin.php");
    exit();
}
?>