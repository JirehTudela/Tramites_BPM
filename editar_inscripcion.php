<?php
require_once 'GestorTramites.php';

// Verificamos que hayamos recibido un ID por la URL
if (!isset($_GET['id'])) {
    header("Location: panel_admin.php");
    exit();
}

$id_editar = $_GET['id'];
$gestor = new GestorTramites();
$datos = $gestor->leerDatos();
$tramite_actual = null;

// Buscamos los datos actuales de este trámite
foreach($datos['tramites_inscripcion'] as $tramite) {
    if($tramite['id_tramite'] === $id_editar) {
        $tramite_actual = $tramite;
        break;
    }
}

if (!$tramite_actual) {
    echo "Trámite no encontrado.";
    exit();
}

$cantidad_actual = count($tramite_actual['materias_solicitadas']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Inscripción</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 40px; margin: 0; }
        .contenedor { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        label { font-weight: bold; display: block; margin-top: 15px; color: #555; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; background-color: #ffc107; color: black; padding: 12px; border: none; cursor: pointer; border-radius: 5px; margin-top: 20px; font-size: 16px; font-weight: bold;}
        button:hover { background-color: #e0a800; }
        .volver { display: block; text-align: center; margin-bottom: 20px; text-decoration: none; color: #0056b3; }
    </style>
</head>
<body>

    <main class="contenedor">
        <a href="panel_admin.php" class="volver">← Cancelar y volver al Panel</a>
        <h2>Editando Trámite: <?= $tramite_actual['id_tramite'] ?></h2>
        <p><strong>Estudiante:</strong> <?= $tramite_actual['nombre'] ?> (RU: <?= $tramite_actual['ru_estudiante'] ?>)</p>
        
        <form action="procesar_actualizacion.php" method="POST">
            <input type="hidden" name="accion" value="materias">

            <input type="hidden" name="id_tramite" value="<?= $tramite_actual['id_tramite'] ?>">
            
            <label>¿A cuántas materias desea inscribirse ahora?</label>
            <input type="number" id="cantidad_materias" min="1" max="7" required value="<?= $cantidad_actual ?>" required placeholder="Ingrese un número entre 1 y 7">
            
            <div id="cajas_dinamicas">
                <?php foreach($tramite_actual['materias_solicitadas'] as $index => $materia): ?>
                    <label>Nombre de la Materia <?= $index + 1 ?>:</label>
                    <input type="text" name="materias[]" required value="<?= htmlspecialchars($materia) ?>">
                <?php endforeach; ?>
            </div>
            
            <button type="submit">Guardar Nuevas Materias</button>
        </form>
    </main>

    <script>
        // Si el usuario cambia el número, regeneramos las cajas en blanco
        document.getElementById('cantidad_materias').addEventListener('input', function() {
            const cantidad = parseInt(this.value) || 0;
            const contenedor = document.getElementById('cajas_dinamicas');
            contenedor.innerHTML = ''; 
            
            for (let i = 0; i < cantidad; i++) {
                contenedor.innerHTML += `
                    <label>Nueva Materia ${i + 1}:</label>
                    <input type="text" name="materias[]" required placeholder="Ej: Nueva Materia">
                `;
            }
        });
    </script>

</body>
</html>