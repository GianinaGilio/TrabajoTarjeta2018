<?php
namespace TrabajoTarjeta;

class MedioBoleto extends Tarjeta {
	protected $precio=7.40;
	protected $universitario = false;
	protected $ultimopago;

	public function descuentoSaldo(TiempoInterface $tiempo) {
			if((($tiempo->time())-($this->ultimopago)) < 300 )
			{
				return FALSE;
			}
			$this->ultimopago = $tiempo->time();
			$this->saldo-=$this->precio;
			return TRUE;
	}

}

class MedioBoletoUni extends MedioBoleto {
	protected $precio=7.40;
	protected $universitario= true;
	protected  $vecesUsado= 0;
	protected $ultimopago=0;
	protected $ultimomedio;


	public function descuentoSaldo(TiempoInterface $tiempo) {
	
	if($this->vecesUsado == 2)
	{
	 $this->saldo-=($this->precio*2);
	 	return TRUE;
	}
	else{
		if((($tiempo->time())-($this->ultimopago)) < 300)
			{
				return FALSE;
			}
		$this->ultimopago = $tiempo->time();
		$this->vecesUsado += 1;
		$this->saldo-=$this->precio;
		if($this->vecesUsado==2)
		{
			$this->ultimomedio=$tiempo->time();
		}
		
		return TRUE;
	}
	  }

	  //Reinicia el medio boleto universitario para usarlo, cada 24 hs
	  public function reiniciarMedio($tiempo){
		$tiempo2=$tiempo->time();
		$hora=date('H', $tiempo2);
		$minutos=date('i',$tiempo2);
		$segundos=date('s',$tiempo2);

		if($hora=='00' && $minutos=='00' && $segundos=='00')
		{
			$this->vecesUsado=0;
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	  }

	  public function obtenercantUsados(){
		return $this->vecesUsado;
	  }

}
