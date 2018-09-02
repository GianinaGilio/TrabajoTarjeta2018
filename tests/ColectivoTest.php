<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      

    public function testpagarConSaldo() {
       $colectivo = new Colectivo(144,"RosarioBus",3); 
        $tarjeta = new Tarjeta();

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80||$tarjeta->obtenerCantidadPlus()>=1);
    }

    public function testpagarSinSaldo() {
       $colectivo = new Colectivo(144,"RosarioBus",5); 
        $tarjeta = new Tarjeta();
        
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),2);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),1);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),0);
      $this->assertFalse($colectivo->pagarCon($tarjeta));
    }

}
