<?php
// =========================================================================
// VALIDACIONES Y ESCRITURA EN EL ARCHIVO (PUNTOS 2, 4 Y 5)
// =========================================================================
$mensaje_exito = "";
$mensaje_error = "";
$archivo = "bitacora.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de datos eliminando espacios en blanco innecesarios
    $fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
    $actividad = isset($_POST['actividad']) ? trim($_POST['actividad']) : '';
    $responsable = isset($_POST['responsable']) ? trim($_POST['responsable']) : '';

    // Punto 4: Validar que no se agreguen campos vacíos
    if (empty($fecha) || empty($actividad) || empty($responsable)) {
        $mensaje_error = "Todos los campos son obligatorios. Por favor, rellene el formulario.";
    } else {
        // Sanitización para evitar que se interprete código HTML/Script malicioso
        $fecha_limpia = htmlspecialchars($fecha);
        $actividad_limpia = htmlspecialchars($actividad);
        $responsable_limpia = htmlspecialchars($responsable);

        // Punto 2: Dar formato específico al registro de la actividad
        $registro = "Fecha: " . $fecha_limpia . PHP_EOL;
        $registro .= "Actividad: " . $actividad_limpia . PHP_EOL;
        $registro .= "Responsable: " . $responsable_limpia . PHP_EOL;
        $registro .= "--------------------------------------------------" . PHP_EOL;

        // Guardar el archivo en modo "Append" sin borrar las actividades anteriores
        // FILE_APPEND añade al final. LOCK_EX previene problemas de escritura simultánea.
        if (file_put_contents($archivo, $registro, FILE_APPEND | LOCK_EX) !== false) {
            $mensaje_exito = "Actividad registrada con éxito en la bitácora.";
        } else {
            $mensaje_error = "Hubo un error al intentar guardar en el archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bitácoras de Seguridad</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 30px; background-color: #f4f4f9; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2 { color: #0056b3; border-bottom: 2px solid #eeeff2; padding-bottom: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        textarea { height: 80px; resize: vertical; }
        button { background-color: #0056b3; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #004494; }
        .alert { padding: 12px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .bitacora-vistas { background-color: #f8f9fa; border-left: 4px solid #0056b3; padding: 15px; border-radius: 4px; font-family: Courier, monospace; overflow-x: auto; }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema de Control de Bitácoras Diarias</h1>
    <p>Empresa de Seguridad - Registro Digital Ligero</p>

    <?php if (!empty($mensaje_error)): ?>
        <div class="alert alert-error"><?php echo $mensaje_error; ?></div>
    <?php endif; ?>
    
    <?php if (!empty($mensaje_exito)): ?>
        <div class="alert alert-success"><?php echo $mensaje_exito; ?></div>
    <?php endif; ?>

    <h2>Registrar Nueva Actividad</h2>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="form-group">
            <label for="responsable">Responsable del Turno:</label>
            <input type="text" id="responsable" name="responsable" required placeholder="Nombre completo del guardia">
        </div>

        <div class="form-group">
            <label for="actividad">Descripción de la Actividad / Incidente:</label>
            <textarea id="actividad" name="actividad" required placeholder="Ej: Revisión perimetral completada sin novedades."></textarea>
        </div>

        <button type="submit">Guardar en Bitácora</button>
    </form>

    <h2>Historial General de Actividades</h2>
    <?php
    if (file_exists($archivo) && filesize($archivo) > 0) {
        echo '<div class="bitacora-vistas">';
        // Se abre el archivo y se lee su contenido completo
        $contenido = file_get_contents($archivo);
        // Se muestra dentro de una etiqueta <pre> para conservar los saltos de línea del formato original
        echo '<pre>' . $contenido . '</pre>';
        echo '</div>';
    } else {
        echo '<p>No hay registros guardados en la bitácora todavía.</p>';
    }
    ?>
</div>

</body>
</html>