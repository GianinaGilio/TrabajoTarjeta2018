<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo;
	public $bandera;
	
    public function recargar($monto) {
      // Esto esta hecho mal a proposito. montos aceptados:10, 20, 30, 50, 100, 510,15 y 962,59
      if ($monto == 10 || $monto == 20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510,15 || $monto == 962,59) {
        $this->saldo += $monto;
		$bandera= TRUE;
      }

      return $bandera;
    }

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }

}
