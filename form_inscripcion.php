<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción de Materias</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 40px; margin: 0; }
        .contenedor { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        label { font-weight: bold; display: block; margin-top: 15px; color: #555; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; background-color: #0056b3; color: white; padding: 12px; border: none; cursor: pointer; border-radius: 5px; margin-top: 20px; font-size: 16px; }
        button:hover { background-color: #004494; }
        .volver { display: block; text-align: center; margin-bottom: 20px; text-decoration: none; color: #0056b3; }
    </style>
</head>
<body>

    <main class="contenedor">
        <a href="index.php" class="volver">← Volver al menú principal</a>
        <h2>Trámite: Inscripción</h2>
        
        <form action="procesar_inscripcion.php" method="POST">
            <label>CI del Estudiante:</label>
            <input type="text" name="ci_estudiante">

            <label>RU del Estudiante:</label>
            <input type="text" name="ru_estudiante">
            
            <label>Nombre Completo:</label>
            <input type="text" name="nombre" required placeholder="Nombres y Apellidos">
            
            <label>¿A cuántas materias desea inscribirse?</label>
            <input type="number" id="cantidad_materias" min="1" max="7" required placeholder="Ingrese un número entre 1 y 7">
            
            <div id="cajas_dinamicas"></div>
            
            <button type="submit">Enviar Solicitud</button>
        </form>
    </main>

    <script>
        document.getElementById('cantidad_materias').addEventListener('input', function() {
            const cantidad = parseInt(this.value) || 0;
            const contenedor = document.getElementById('cajas_dinamicas');
            contenedor.innerHTML = ''; // Limpiamos si el usuario cambia el número
            
            for (let i = 0; i < cantidad; i++) {
                contenedor.innerHTML += `
                    <label>Nombre de la Materia ${i + 1}:</label>
                    <input type="text" name="materias[]">
                `;
            }
        });
    </script>

</body>
</html>