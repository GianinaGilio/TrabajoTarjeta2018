<?php
namespace TrabajoTarjeta;
class Tarjeta implements TarjetaInterface {
  protected $id;
  protected $saldo=0;
  protected $plus=2;
  protected $precio=14.80;
  protected $cantTrasb=0;
  public $banderaTrasb;
  protected $ultimopago;
  protected $lineaUltColectivo;
  
	public function __construct($id){
	  $this->id = $id;
	}
	
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

    //obtiene el precio de viaje para cada tipo de tarjeta
    public function obtenerPrecio(){
      return $this->precio;
    }

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }
    // Descuenta saldo
    
    public function trasbordo(TiempoInterface $tiempo, ColectivoInterface $colectivo){
      $dia=date("D", $tiempo->time());
        $hora=idate("H", $tiempo->time());
        
        if($this->lineaUltColectivo != $colectivo->linea() && $this->cantTrasb==0)
        {
          if($hora >= 6 && $hora <= 22)
          {
            if($dia == "Mon" || $dia == "Tue" || $dia == "Wed" || $dia == "Thu" || $dia == "Fri")
            {
              if(($tiempo->time())-($this->ultimopago) <= 3600)
              {
                $this->banderaTrasb=TRUE;
                $this->cantTrasb=1;
                return $this->banderaTrasb;
              }
          }
          if($dia == "Sun")
          {
            if(($tiempo->time())-($this->ultimopago) <= 5400)
            {
              $this->banderaTrasb=TRUE;
              $this->cantTrasb=1;
              return $this->banderaTrasb;
            }
          }
  
          if($dia=="Sat")
          {
            if($hora >= 6 && $hora <= 14)
            {
              if(($tiempo->time())-($this->ultimopago) <= 3600)
              {
                $this->banderaTrasb=TRUE;
                $this->cantTrasb=1;
                return $this->banderaTrasb;
              }
            }
    
            if($hora >= 14 && $hora <= 22){
              if(($tiempo->time())-($this->ultimopago) <= 5400)
              {
                $this->banderaTrasb=TRUE;
                $this->cantTrasb=1;
                return $this->banderaTrasb;
              }
            }
          }
    
          if($hora > 22 || $hora < 6){
            if(($tiempo->time())-($this->ultimopago) <= 5400)
              {
                $this->banderaTrasb=TRUE;
                $this->cantTrasb=1;
                return $this->banderaTrasb;
              }
          }
        }
      }
      $this->banderaTrasb=FALSE;
      return $this->banderaTrasb;
  }
  
  
  public function descuentoSaldo(TiempoInterface $tiempo, ColectivoInterface $colectivo) {
        $dia=date("D", $tiempo->time());
        $hora=idate("H", $tiempo->time());
        
        
          if($this->trasbordo($tiempo,$colectivo)==TRUE)
          {
                $this->ultimopago = $tiempo->time();
                $this->lineaUltColectivo = $colectivo->linea();

                $this->saldo-= (0.33*$this->precio);
                $this->cantTrasb=1;
                return TRUE;
            
          }
           
        $this->lineaUltColectivo = $colectivo->linea();
        $this->ultimopago = $tiempo->time();
        $this->saldo-=$this->precio;
        $this->cantTrasb=0;
        return TRUE;
      }
  
  


// Devuelve la ID de la tarjeta.
    public function obtenerID(){
      return $this->id;
    }
// Descuenta plus
    public function descuentoViajesPlus(){
      if($this->plus>0)
      {
          $this->plus-=1;
          return TRUE;
      }
      else
      {
        return FALSE;
      }

    }
// muestra cantidad plus
    public function obtenerCantidadPlus(){
      return $this->plus;
    }
}