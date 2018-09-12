<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends TestCase {
   /**
     * Comprueba que el medio boleto funcione correctamente.
     */

  public function testPagarConMedio()
  { $colectivo= new Colectivo;
    $tarjeta=new MedioBoleto;
    $tiempo=new TiempoFalso();
    
    //Pago de un medio
    $tarjeta->recargar(30);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),22.6);

    //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
    $this->assertEquals($tiempo->timefalso(), 0);
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));





  }


  public function testPagarConMedioUni()
  { $colectivo= new Colectivo;
    $tarjeta=new MedioBoletoUni;
    $tiempo=new TiempoFalso();
    
    //Pago de medio boleto universitario
    $tarjeta->recargar(30);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),22.6);
    $tiempo->avanzar(400);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),15.2);

    //Aca debería cobrarse el boleto normal
    $tiempo->avanzar(800);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),0.4);

    //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
    $tarjeta->recargar(30);
    $tiempo->avanzar(850);
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));


  }
}
