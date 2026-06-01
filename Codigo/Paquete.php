<?php

namespace Logistica;

class Paquete {
    public string $codigoSeguimiento;
    public float $pesoKilogramos;
    public bool $esFragil;
    private float $costolnterno;

    public function __construct(string $codigoSeguimiento, float $pesoKilogramos, bool $esFragil, float $costolnterno) {
        $this->codigoSeguimiento = $codigoSeguimiento;
        $this->pesoKilogramos = $pesoKilogramos;
        $this->esFragil = $esFragil;
        $this->costolnterno = $costolnterno;
    }

    public function obtenerCostoInterno(): float {
        return $this->costolnterno;
    }
}

// Instanciar la clase y mostrar información
$paquete = new Paquete("ABC123", 2.5, true, 100.0);

echo "Código de seguimiento: " . $paquete->codigoSeguimiento . "<br>";
echo "Peso en kilogramos: " . $paquete->pesoKilogramos . "<br>";
echo "¿Es frágil? " . ($paquete->esFragil ? "Sí" : "No") . "<br>";
?>