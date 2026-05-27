<?php
require_once 'GestorTramites.php';
$gestor = new GestorTramites();
$datos = $gestor->leerDatos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 30px; margin: 0; }
        .contenedor { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #0056b3; color: white; }
        .estado-form { display: flex; gap: 10px; }
        select { padding: 5px; }
        button { background-color: #28a745; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px; }
        .volver { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #0056b3; }
    </style>
</head>
<body>

    <main class="contenedor">
        <a href="index.php" class="volver">← Volver al menú principal</a>
        <h1>Bandeja de Trámites (BPM)</h1>

        <h2>1. Inscripciones de Materias</h2>
        <table>
            <tr>
                <th>ID Trámite</th>
                <th>CI</th>
                <th>RU</th>
                <th>Estudiante</th>
                <th>Materias</th>
                <th>Estado Actual</th>
                <th>Actualizar Estado</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($datos['tramites_inscripcion'] as $tramite): ?>
            <tr>
                <td><?= $tramite['id_tramite'] ?></td>
                <td><?= $tramite['ci_estudiante'] ?></td>
                <td><?= $tramite['ru_estudiante'] ?></td>
                <td><?= $tramite['nombre'] ?></td>
                <td><?= implode(", ", $tramite['materias_solicitadas']) ?></td>
                <td><strong><?= $tramite['estado'] ?></strong></td>
                <td>
                    <form action="procesar_actualizacion.php" method="POST" class="estado-form">
                        <input type="hidden" name="tipo_tramite" value="inscripcion">
                        <input type="hidden" name="id_tramite" value="<?= $tramite['id_tramite'] ?>">
                        <select name="nuevo_estado">
                            <option value="En Revisión">En Revisión</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Rechazado">Rechazado</option>
                        </select>
                        <button type="submit">Guardar</button>
                    </form>
                </td>
                <td>
                    <a href="editar_inscripcion.php?id=<?= $tramite['id_tramite'] ?>" class="volver" style="margin:0;">✏️ Editar Materias</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>2. Emisión de Certificados</h2>
        <table>
            <tr>
                <th>ID Trámite</th>
                <th>CI</th>
                <th>RU</th>
                <th>Tipo Certificado</th>
                <th>Estado Actual</th>
                <th>Actualizar Estado</th>
            </tr>
            <?php foreach($datos['tramites_certificados'] as $tramite): ?>
            <tr>
                <td><?= $tramite['id_tramite'] ?></td>
                <td><?= $tramite['ci_estudiante'] ?></td>
                <td><?= $tramite['ru_estudiante'] ?></td>
                <td><?= $tramite['tipo_certificado'] ?></td>
                <td><strong><?= $tramite['estado'] ?></strong></td>
                <td>
                    <form action="procesar_actualizacion.php" method="POST" class="estado-form">
                        <input type="hidden" name="tipo_tramite" value="certificado">
                        <input type="hidden" name="id_tramite" value="<?= $tramite['id_tramite'] ?>">
                        <select name="nuevo_estado">
                            <option value="Solicitado">Solicitado</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Entregado">Entregado</option>
                        </select>
                        <button type="submit">Guardar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>

</body>
</html>