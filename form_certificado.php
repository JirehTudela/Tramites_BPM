<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Emisión de Certificados</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 40px; margin: 0; }
        .contenedor { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        label { font-weight: bold; display: block; margin-top: 15px; color: #555; }
        input[type="text"] { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; background-color: #28a745; color: white; padding: 12px; border: none; cursor: pointer; border-radius: 5px; margin-top: 20px; font-size: 16px; }
        button:hover { background-color: #218838; }
        .volver { display: block; text-align: center; margin-bottom: 20px; text-decoration: none; color: #0056b3; }
    </style>
</head>
<body>

    <main class="contenedor">
        <a href="index.php" class="volver">← Volver al menú principal</a>
        <h2>Trámite: Certificados</h2>
        
        <form action="procesar_certificado.php" method="POST">
            <label>CI del Estudiante:</label>
            <input type="text" name="ci_estudiante">

            <label>RU del Estudiante:</label>
            <input type="text" name="ru_estudiante">
            
            <label>¿Qué certificado desea solicitar?</label>
            <input type="text" name="tipo_certificado" required placeholder="Ej: Certificado de Estudiante Regular">
            
            <button type="submit">Solicitar Certificado</button>
        </form>
    </main>

</body>
</html>