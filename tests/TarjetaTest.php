<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo() {
        $tarjeta = new Tarjeta(2345);

        $this->assertTrue($tarjeta->recargar(10));
        $this->assertEquals($tarjeta->obtenerSaldo(), 10);

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), 30);

        $this->assertTrue($tarjeta->recargar(30));
        $this->assertEquals($tarjeta->obtenerSaldo(), 60);

        $this->assertTrue($tarjeta->recargar(50));
        $this->assertEquals($tarjeta->obtenerSaldo(), 110);

        $this->assertTrue($tarjeta->recargar(100));
        $this->assertEquals($tarjeta->obtenerSaldo(), 210);

        $this->assertTrue($tarjeta->recargar(510.15));
        $this->assertEquals($tarjeta->obtenerSaldo(), 802.08);

        $this->assertTrue($tarjeta->recargar(962.59));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1986.25);
    }

    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta(2345);

      $this->assertFalse($tarjeta->recargar(15));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0);
  }

    /**
     * Comprueba que la tarjeta pueda saber cuantos viajes plus tiene.
     */
  public function testCantViajePlus(){
    $colectivo = new Colectivo(144,"RosarioBus",5);
      $tarjeta = new Tarjeta(2345);

      $this->assertEquals($tarjeta->obtenerCantidadPlus(),2);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),1);
      $this->assertTrue($colectivo->pagarCon($tarjeta));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),0);
      $this->assertFalse($colectivo->pagarCon($tarjeta));
      $this->assertTrue($tarjeta->recargar(30));
      $this->assertEquals($tarjeta->obtenerCantidadPlus(),2);


  }

      /**
     * Comprueba que la tarjeta descuente correctamente los viajes plus.
     */

  public function testDescuentoViajePlus()
  { $colectivo = new Colectivo(144,"RosarioBus",5);
    $tarjeta=new Tarjeta(2345);

    $this->assertTrue($colectivo->pagarCon($tarjeta));
    $this->assertTrue($colectivo->pagarCon($tarjeta));
    $this->assertFalse($colectivo->pagarCon($tarjeta));
    $this->assertTrue($tarjeta->recargar(30));
    $this->assertEquals($tarjeta->obtenerSaldo(),0.4);
    $this->assertTrue($colectivo->pagarCon($tarjeta));
    $this->assertTrue($tarjeta->recargar(30));
    $this->assertEquals($tarjeta->obtenerSaldo(),15.6);

  }

  public function testTrasbordoTarjeta(){
    $colectivo = new Colectivo(144,"RosarioBus",5);
    $colectivo2 = new Colectivo(143,"RosarioBus",5);
    $tarjetaa=new Tarjeta(235);
    $tarjetaa->recargar(100);
    $tiempo = new TiempoFalso;
    //Lo adelanto a un domingo a las 4:38.
    $tiempo->avanzar(1539545889);
    //$dia=date("D", $tiempo->time());
    //$hora=idate("H", $tiempo->time());

    //verifico que las lines de colectivos son distintas, y que la cant de trasb es correcta
    // por lo que deberia entrar al if.
    $this->assertTrue($colectivo->linea() != $colectivo2->linea());
    $this->assertEquals($tarjetaa->cantTrasb(),1);
    
    $this->assertTrue($colectivo->pagarCon($tarjetaa));
    $this->assertEquals($tarjetaa->obtenerSaldo(),85.20);
    $tiempo->avanzar(100);
    $colectivo2->pagarCon($tarjetaa);
    $this->assertEquals($tarjetaa->obtenerSaldo(),(80.316));

  }


}
