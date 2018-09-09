<?php
namespace TrabajoTarjeta;

class MedioBoleto extends Tarjeta {
	public $precio=7.40;
	protected universitario= false;

}

class MedioBoletoUni extends MedioBoleto {
	protected universitario= true;
	protected  VecesUsado= 0;
}
