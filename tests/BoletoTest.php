<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testSaldoCero() {
        $valor = 14.80;
		$tarjetita= new Tarjeta();
		$colectivito= new Colectivo(144,"RosarioBus",7);
        $boleto = new Boleto($valor, $colectivito, $tarjetita);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }
}
