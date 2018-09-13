<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends TestCase {
   /**
     * Comprueba que el medio boleto funcione correctamente.
     */

  public function testPagarConMedio()
  { $colectivo = new Colectivo(144,"RosarioBus",5);
    $tarjeta=new MedioBoleto;
    $tiempo=new TiempoFalso;
    
    //Pago de un medio
    $tarjeta->recargar(30);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),22.6);

    //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
    $this->assertEquals($tiempo->time(), 0);
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));
  }


  public function testPagarConMedioUni()
  { $colectivo = new Colectivo(144,"RosarioBus",5);
    $tarjeta=new MedioBoletoUni;
    $tiempo=new TiempoFalso();
    
    //Pago de medio boleto universitario
    $tarjeta->recargar(30);
    $this->assertEquals($tiempo->avanzar(1), 1);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),22.6);
    $this->assertTrue($tiempo->avanzar(400));
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),15.2);

    //Aca debería cobrarse el boleto normal
    $this->assertTrue($tiempo->avanzar(800));
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),0.4);

    //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
    $tarjeta->recargar(30);
    $this->assertTrue($tiempo->avanzar(850));
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));
  }
}
