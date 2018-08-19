<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
        
    public function testConSaldo() {

        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->saldo>=14.80);
    }

    public function testSinSaldo() {
        
        $this->assertFalse();
        $this->assertEquals($colectivo->pagarCon($tarjeta), $tarjeta->saldo<14.80);
    }
}
