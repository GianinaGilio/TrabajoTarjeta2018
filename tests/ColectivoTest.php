<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
      
    /**
     * Comprueba que se puede pagar con la tarjeta si tiene saldo.
     */
    public function testpagarConSaldo() {
<<<<<<< HEAD
       $colectivo = new Colectivo(144,"RosarioBus",3); 
=======
        $colectivo = new Colectivo(144,"RosarioBus",5);
>>>>>>> master
        $tarjeta = new Tarjeta();

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80||$tarjeta->obtenerCantidadPlus()>=1);
        $this->assertEquals($colectivo->pagarCon($tarjeta),$tarjeta->obtenerSaldo()>=14.80||$tarjeta->obtenerCantidadPlus()>=1);
    }

    /**
     * Comprueba que se puede pagar con la tarjeta si no tiene saldo y que no puede si no tiene viajes plus.
     */
    public function testpagarSinSaldo() {
<<<<<<< HEAD
       $colectivo = new Colectivo(144,"RosarioBus",5); 
=======
        $colectivo = new Colectivo(144,"RosarioBus",5); 
>>>>>>> master
        $tarjeta = new Tarjeta();
        
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),2);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),1);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),0);
      $this->assertFalse($colectivo->pagarCon($tarjeta));
    }
<<<<<<< HEAD

=======

    /**
     * Comprueba que se muestren correctamente las caracteristicas del colectivo.
     */    
    public function testMostrarCaracteristicas(){
        $colectivo = new Colectivo(144,"RosarioBus",5); 

        $this->assertEquals($colectivo->linea(),144);
        $this->assertEquals($colectivo->empresa(),"RosarioBus");
        $this->assertEquals($colectivo->numero(),5);
    }

>>>>>>> master
}
