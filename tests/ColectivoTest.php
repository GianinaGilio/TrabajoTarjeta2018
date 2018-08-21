<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      

    public function testpagarConSaldo() {
       $colectivo = new Colectivo(144,"RosarioBus",3); 
        $tarjeta = new Tarjeta();

        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80||$tarjeta->plus>=1);
    }

    public function testpagarSinSaldo() {
       $colectivo = new Colectivo(144,"RosarioBus",5); 
        $tarjeta = new Tarjeta();

        $this->assertFalse($colectivo->pagarCon($tarjeta));
    }

    public function testAlgoUtil() {
        $this->assertEquals(1+1,2);
   }
}
