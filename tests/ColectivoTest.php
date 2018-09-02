<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      
    /**
     * Comprueba que se puede pagar con la tarjeta si tiene saldo.
     */
    public function testpagarConSaldo() {
       $colectivo = new Colectivo(144,"RosarioBus",3); 
        $tarjeta = new Tarjeta();

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80||$tarjeta->obtenerCantidadPlus()>=1);
    }

    /**
     * Comprueba que se puede pagar con la tarjeta si no tiene saldo y que no puede si no tiene viajes plus.
     */
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
