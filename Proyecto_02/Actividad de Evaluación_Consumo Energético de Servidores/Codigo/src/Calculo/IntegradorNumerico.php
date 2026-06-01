<?php

namespace App\Calculo;

class IntegradorNumerico {

    private float $inicio;
    private float $fin;
    private int $pasos;
    private string $perfil;

    public function __construct(float $a, float $b, int $n = 1000, string $perfil = "AVERAGE") {

        if ($a >= $b) {
            throw new \Exception("El tiempo inicial debe ser menor al final.");
        }

        if ($n <= 0) {
            throw new \Exception("La precisión debe ser positiva.");
        }

        $this->inicio = $a;
        $this->fin = $b;
        $this->pasos = $n;
        $this->perfil = $perfil;
    }

    private function funcionPotencia(float $t): float {

        switch ($this->perfil) {
            case "IDLE":
                return 5;

            case "AVERAGE":
                return 2 * $t + 5;

            case "STRESS":
                return $this->factorial((int)$t);

            default:
                return 0;
        }
    }

    private function factorial(int $n): float {
        if ($n <= 1) return 1;

            $res = 1;
            for ($i = 2; $i <= $n; $i++) {
            $res *= $i;
        }
        return $res;
    }
                
    public function calcularEnergiaTotal(): float {

        $h = ($this->fin - $this->inicio) / $this->pasos;

        $suma = ($this->funcionPotencia($this->inicio) + $this->funcionPotencia($this->fin)) / 2;

        for ($i = 1; $i < $this->pasos; $i++) {
            $t = $this->inicio + $i * $h;
            $suma += $this->funcionPotencia($t);
        }

        return $suma * $h;
    }

    public function calcularEnergiaKWh(): float {
        return $this->calcularEnergiaTotal() * 2.7778e-7;
    }
}