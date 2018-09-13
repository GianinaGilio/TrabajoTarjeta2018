<?php
namespace TrabajoTarjeta;

class MedioBoleto extends Tarjeta {
	public $precio=7.40;
<<<<<<< HEAD
}

=======
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
	public $precio=7.40;
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
	  public function reiniciarMedio(TiempoInterface $tiempo){
		if(($tiempo->time()-($this->ultimomedio))>86400)
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
>>>>>>> master
