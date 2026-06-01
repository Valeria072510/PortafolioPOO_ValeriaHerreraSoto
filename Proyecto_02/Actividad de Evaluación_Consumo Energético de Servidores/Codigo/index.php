<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/Calculo/IntegradorNumerico.php';

use App\Calculo\IntegradorNumerico;

$resultado = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {

        $t_inicio = (float)$_POST['t_inicio'];
        $t_fin = (float)$_POST['t_fin'];
        $precision = (int)$_POST['precision'];
        $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : "AVERAGE";
        $integrador = new IntegradorNumerico($t_inicio, $t_fin, $precision, $perfil);

        $resultado = $integrador->calcularEnergiaTotal();

    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cloud Energy Monitor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Monitor de Energía</h1>

    <form method="POST">
        <label>Tiempo inicial (s):</label>
        <input type="number" name="t_inicio" step="0.1" required>

        <label>Tiempo final (s):</label>
        <input type="number" name="t_fin" step="0.1" required>

        <label>Precisión:</label>
        <input type="number" name="precision" value="1000">

        <label>Perfil:</label>
        <select name="perfil">
            <option value="IDLE">IDLE (P(t)=5)</option>
            <option value="AVERAGE">AVERAGE (2t + 5)</option>
            <option value="STRESS">STRESS (t!)</option>
        </select>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== null): ?>
        <h3>Joules: <?php echo number_format($resultado, 4); ?></h3>
        <h3>kWh: <?php echo number_format($integrador->calcularEnergiaKWh(), 8); ?></h3>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color:red;">Error: <?php echo $error; ?></p>
    <?php endif; ?>

    <h2>Tabla comparativa</h2>

    <table border="1">
        <tr>
            <th>n</th>
            <th>Resultado</th>
            <th>Error</th>
        </tr>

        <?php
        $real = 433.33;

        foreach ([10, 100, 1000] as $n):
            $test = new IntegradorNumerico(0, 10, $n, "AVERAGE");
            $res = $test->calcularEnergiaTotal();
            $error_calc = abs($real - $res);
        ?>
        <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo number_format($res, 4); ?></td>
            <td><?php echo number_format($error_calc, 4); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

</body>
</html>