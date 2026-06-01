    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .producto-row { margin-bottom: 15px; }
        label { font-weight: bold; }
        input { padding: 5px; margin-right: 10px; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Gestión de Inventario - Tienda en Línea</h2>
    <p>Por favor, ingrese el nombre y precio de los 5 productos:</p>

    <form action="procesar.php" method="POST">
        
        <?php for($i = 1; $i <= 5; $i++): ?>
            <div class="producto-row">
                <h3>Producto <?php echo $i; ?></h3>
                <label for="nombre_<?php echo $i; ?>">Nombre:</label>
                <input type="text" id="nombre_<?php echo $i; ?>" name="nombres[]" required placeholder="Ej. Laptop">
                
                <label for="precio_<?php echo $i; ?>">Precio:</label>
                <input type="number" id="precio_<?php echo $i; ?>" name="precios[]" step="0.01" min="0" required placeholder="0.00">
            </div>
        <?php endfor; ?>

        <br>
        <button type="submit">Procesar Inventario</button>
    </form>

</body>
</html>