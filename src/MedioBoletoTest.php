<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends TestCase {
   /**
     * Comprueba que el medio boleto funcione correctamente.
     */

  public function testMedioBoleto()
  { $colectivo= new Colectivo;
    $tarjeta=new Tarjeta;
    /**
     * Hay que hacerlo.
     */
    $this->assertEquals(1,1);


  }
}
