<?php
namespace TrabajoTarjeta;
class Tarjeta implements TarjetaInterface {
  protected $saldo=0;
  public $bandera;
  protected $plus=2;
  public $precio=14.80;
    public function recargar($monto) {
      // Montos aceptados:10, 20, 30, 50, 100, 510.15 y 962.59
      if ($monto == 10 || $monto == 20 || $monto == 30 || $monto == 50 || $monto == 100 || $monto == 510.15 || $monto == 962.59) {
       
        if($monto==510.15)
        {
          $monto += 81.93;
        }

        if($monto == 962.59)
        {
          $monto += 221.58;
        }

        $this->saldo += $monto;

        if($this->plus<2)
        {
          if($this->plus==0)
          {
            $this->saldo-= 2 * 14.80;
          }
          else
          {
            $this->saldo-= 14.80;
          }
        }

        $this->plus=2;
		    $this->bandera= TRUE;
      }
      else
      {
          $this->bandera=FALSE;
      }

      return $this->bandera;
    }
    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }

    public function ViajesPlus(){
      if($this->plus>0)
      {
          $this->plus-=1;
          return TRUE;
      }
      return FALSE;

    }

    public function obtenerCantidadPlus(){
      return $this->plus;
    }
}