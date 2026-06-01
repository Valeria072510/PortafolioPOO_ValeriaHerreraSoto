<?php
// procesar.php

// Verificar que los datos hayan sido enviados por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombres']) && isset($_POST['precios'])) {
    
    // ==========================================
    // PUNTO 2: Almacenar en arreglos paralelos
    // ==========================================
    $productos = $_POST['nombres']; // Arreglo unidimensional de nombres
    $precios = $_POST['precios'];   // Arreglo unidimensional de precios (en formato string inicialmente)

    // Convertir todos los precios a valores flotantes (numéricos) para realizar operaciones
    $precios = array_map('floatval', $precios);

    // ==========================================
    // PUNTO 3: Calcular y procesar la información
    // ==========================================
    
    // A) Precio total usando array_sum()
    $totalVenta = array_sum($precios);
    
    // B) Promedio de precios
    $cantidadProductos = count($precios);
    $promedioPrecios = $cantidadProductos > 0 ? $totalVenta / $cantidadProductos : 0;
    
    // C) Producto más caro usando max()
    $precioMaximo = max($precios);
    // Buscamos la posición (índice) del precio máximo para saber a qué producto pertenece
    $indiceCaro = array_search($precioMaximo, $precios);
    $productoMasCaro = $productos[$indiceCaro];
    
    // D) Producto más barato usando min()
    $precioMinimo = min($precios);
    // Buscamos la posición (índice) del precio mínimo
    $indiceBarato = array_search($precioMinimo, $precios);
    $productoMasBarato = $productos[$indiceBarato];

} else {
    // Redireccionar si intentan entrar directamente a este script sin enviar el formulario
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 60%; border-collapse: collapse; margin-bottom: 25px; }
        table, th, td { border: 1px solid #333; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .resumen { background-color: #e9ecef; padding: 15px; border-radius: 5px; width: 57%; }
        a { display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

    <h2>Resultados del Análisis de Inventario</h2>

    <h3>Listado de Productos</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($productos); $i++): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo htmlspecialchars($productos[$i]); ?></td>
                    <td>$<?php echo number_format($precios[$i], 2); ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <h3>Estadísticas y Análisis</h3>
    <div class="resumen">
        <p><strong>Total de la Venta:</strong> $<?php echo number_format($totalVenta, 2); ?></p>
        <p><strong>Promedio de Precios:</strong> $<?php echo number_format($promedioPrecios, 2); ?></p>
        <p><strong>Producto más Caro:</strong> <?php echo htmlspecialchars($productoMasCaro); ?> ($<?php echo number_format($precioMaximo, 2); ?>)</p>
        <p><strong>Producto más Barato:</strong> <?php echo htmlspecialchars($productoMasBarato); ?> ($<?php echo number_format($precioMinimo, 2); ?>)</p>
    </div>

    <p><a href="index.php">← Registrar otros productos</a></p>

</body>
</html>
