<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      

    public function testConSaldo() {
        $colectivo = new Colectivo(); 
        $tarjeta = new Tarjeta();

        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->saldo>=14.80);
    }

    public function testSinSaldo() {
        $colectivo = new Colectivo(); 
        $tarjeta = new Tarjeta();

        $this->assertEquals($colectivo->pagarCon($tarjeta), $tarjeta->saldo<14.80);
    }
}
