<?php
namespace TrabajoTarjeta;

class MedioBoleto extends Tarjeta {
	public $precio=7.40;
	protected universitario= false;

	public function descuentoSaldo() {
//Falta poner el tiempo
			return $this->saldo-=$this->precio;
	}

}

class MedioBoletoUni extends MedioBoleto {
	protected universitario= true;
	protected  vecesUsado= 0;



	public function obtenerCantUsado(){
		return $this->vecesUsado;
	}
//Falta poner el tiempo
	public function descuentoSaldo() {

	if($this->vecesUsado == 2)
	{
		return return $this->saldo-=($this->precio*2);
	}
	else{
		$this->vecesUsado += 1;
		return $this->saldo-=$this->precio;
	}
		
	  }

}
