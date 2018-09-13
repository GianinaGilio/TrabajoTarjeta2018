<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface{
	public $lin;
	public $emp;
	public $num;

<<<<<<< HEAD
	public function _construct($lin, $emp, $num) {
        $this->lin = $lin;
		$this->emp = $emp;
		$this->num = $num;
    
=======
	public function __construct($lin, $emp, $num) {
        $this->lin = $lin;
		$this->emp = $emp;
		$this->num = $num;
>>>>>>> master
    }

    public function linea(){
	return $this->lin;
    }

    public function empresa(){
    return $this->emp;    
    }

    public function numero(){
    return $this->num;    
    }

    public function pagarCon(TarjetaInterface $tarjeta){
<<<<<<< HEAD
=======
         $tiempo= new Tiempo();
>>>>>>> master
        if($tarjeta->precio != 0 && $tarjeta->obtenerSaldo() < 14.80)
        {
            return $tarjeta->descuentoViajesPlus();
        }
        else
        {
<<<<<<< HEAD
			$colectivo = new Colectivo(144,"RosarioBus",23)
            $tarjeta->descuentoSaldo();
            $saldoActual = $tarjeta->obtenerSaldo(); 
			$boleto = new Boleto ($tarjeta->precio,$colectivo->lin,$tarjeta);
			return $boleto;
=======
            $tarjeta->descuentoSaldo($tiempo);
            return $tarjeta->obtenerSaldo(); 
>>>>>>> master
        }
    }


}