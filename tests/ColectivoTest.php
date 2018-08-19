<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      

    public function testpagarConSaldo() {
      /*  $colectivo = new Colectivo(); 
        $tarjeta = new Tarjeta();

        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80);*/
    }

    public function testpagarSinSaldo() {
      /*  $colectivo = new Colectivo(); 
        $tarjeta = new Tarjeta();

        $this->assertFalse($colectivo->pagarCon($tarjeta));*/
    }
}
