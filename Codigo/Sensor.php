<?php

namespace Monitoreo;

class Sensor {
    public int $id;
    public string $marca;
    public \DateTime $ultimaLectura;  // Tipo DateTime para manejar fechas
    public float $rangoMaximo;

    // Constructor para inicializar las propiedades
    public function __construct(int $id, string $marca, \DateTime $ultimaLectura, float $rangoMaximo) {
        $this->id = $id;
        $this->marca = $marca;
        $this->ultimaLectura = $ultimaLectura;
        $this->rangoMaximo = $rangoMaximo;
    }

    // Método para obtener la última lectura (si lo deseas)
    public function obtenerUltimaLectura(): \DateTime {
        return $this->ultimaLectura;
    }
}



use Monitoreo\Sensor;

$fechaLectura = new \DateTime();  // Fecha y hora actual
$sensor = new Sensor(1, "MarcaX", $fechaLectura, 100.5);

// Mostrar información del sensor
echo "ID: " . $sensor->id . "<br>";
echo "Marca: " . $sensor->marca . "<br>";
echo "Última Lectura: " . $sensor->ultimaLectura->format('Y-m-d H:i:s') . "<br>";
echo "Rango Máximo: " . $sensor->rangoMaximo . "<br>";

?>