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
    $tiempo->avanzar(300);
    $this->assertEquals($tiempo->time(),300);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),22.6);

    //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
    $tiempo->avanzar(1);
    $this->assertEquals($tiempo->time(), 301);
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));
  }


  public function testPagarConMedioUni()
  { $colectivo = new Colectivo(144,"RosarioBus",5);
    $tarjeta=new MedioBoletoUni;
    $tiempo=new TiempoFalso;
    
    //Pago de medio boleto universitario
    $tarjeta->recargar(100);
    $tiempo->avanzar(350);
    $this->assertEquals($tarjeta->obtenercantUsados(),0);
    $this->assertEquals($tiempo->time(), 350);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenercantUsados(),1);
    $this->assertEquals($tarjeta->obtenerSaldo(),92.6);
    $tiempo->avanzar(300);
    $this->assertEquals($tiempo->time(),650);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenercantUsados(),2);
    $this->assertEquals($tarjeta->obtenerSaldo(),85.2);

    //Aca debería cobrarse el boleto normal, despues de pagar dos veces medio boleto
    $tiempo->avanzar(300);
    $this->assertEquals($tiempo->time(), 950);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tarjeta->obtenerSaldo(),70.4);
    
    //Verifica si se reinicia la cantidad de veces que se uso el medio
    $tiempo->avanzar(86400);
    $this->assertTrue($tarjeta->reiniciarMedio());
    $this->assertEquals($tarjeta->obtenercantUsados(),0);
    
  }

  //Para ver que no puede volver a pagar con medio antes de los 5 minutos.
  public function testPagarConMedioUni_False(){
    $tarjeta=new MedioBoletoUni;
    $tiempo=new TiempoFalso;

    $tiempo->avanzar(400);
    $tarjeta->recargar(100);
    $this->assertEquals($tiempo->time(), 400);
    $this->assertTrue($tarjeta->descuentoSaldo($tiempo));
    $this->assertEquals($tiempo->time(), 400);
    $this->assertFalse($tarjeta->descuentoSaldo($tiempo));
  }

}
