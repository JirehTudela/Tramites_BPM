<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal de Trámites - UMSA</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px; 
            background-color: #f4f4f9; 
            margin: 0;
        }
        .contenedor { 
            max-width: 600px; 
            margin: 0 auto; 
            background: white; 
            padding: 40px 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
        }
        h1 { color: #333; margin-bottom: 10px; }
        p { color: #666; margin-bottom: 30px; }
        .boton { 
            display: block; 
            background-color: #0056b3; 
            color: white; 
            padding: 15px 20px; 
            text-decoration: none; 
            border-radius: 8px; 
            margin: 15px auto;
            font-size: 18px;
            max-width: 300px;
            transition: background-color 0.3s;
        }
        .boton:hover { background-color: #004494; }
        .boton-alt { background-color: #28a745; }
        .boton-alt:hover { background-color: #218838; }
    </style>
</head>
<body>

    <main class="contenedor">
        <h1>Portal de Trámites Universitarios</h1>
        <p>Seleccione el trámite que desea realizar:</p>
        
        <nav aria-label="Menú principal de trámites">
            <a href="form_inscripcion.php" class="boton" aria-label="Ir al formulario de inscripción de materias">
                Inscripción de Materias
            </a>
            
            <a href="form_certificado.php" class="boton boton-alt" aria-label="Ir al formulario de emisión de certificados">
                Emisión de Certificados
            </a>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">
            <a href="panel_admin.php" class="boton" style="background-color: #6c757d;" aria-label="Ir al panel de administración">
                Ver y Actualizar Trámites
            </a>
        </nav>
    </main>

</body>
</html>