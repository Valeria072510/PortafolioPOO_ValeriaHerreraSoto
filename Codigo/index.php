<?php


require_once 'Paquete.php';  
require_once 'Sensor.php';   


use Logistica\Paquete;
use Monitoreo\Sensor;


$paqueteA = new Paquete("ABC123", 2.5, true, 100.0);
$paqueteB = new Paquete("XYZ789", 1.8, false, 150.0);


$paqueteA->codigoSeguimiento = "NEW_CODE123";
$paqueteA->pesoKilogramos = 3.0;
$paqueteA->esFragil = false;


echo "Paquete A - Código: " . $paqueteA->codigoSeguimiento . "<br>";
echo "Paquete A - Peso: " . $paqueteA->pesoKilogramos . " kg<br>";
echo "Paquete A - Fragil: " . ($paqueteA->esFragil ? "Sí" : "No") . "<br>";


$sensor = new Sensor(1, "MarcaX", $fechaLectura, 100.5);


echo "Sensor - ID: " . $sensor->id . "<br>";
echo "Sensor - Marca: " . $sensor->marca . "<br>";
echo "Sensor - Última Lectura: " . $sensor->ultimaLectura->format('Y-m-d H:i:s') . "<br>";
echo "Sensor - Rango Máximo: " . $sensor->rangoMaximo . "<br>";

?>