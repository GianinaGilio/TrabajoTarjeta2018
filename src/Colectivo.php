<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface{
    protected $lin;
	protected $emp;
	protected $num;

	public function __construct($lin, $emp, $num) {
        $this->lin = $lin;
		$this->emp = $emp;
		$this->num = $num;
    }

    /**
     * Devuelve la linea del colectivo
     * 
     * @return string
     */
    public function linea(){
	return $this->lin;
    }

    /**
     * Devuelve el nombre de la empresa del colectivo
     * 
     * @return string
     */
    public function empresa(){
    return $this->emp;    
    }

    /**
     * Devuelve el numero de la linea del coelctivo
     * 
     * @return int
     */
    public function numero(){
    return $this->num;    
    }

    /**
     * Efectua el pago del boleto con la tarjeta
     * @param TarjetaInterface 
     * @return Boleto
     */
    public function pagarCon(TarjetaInterface $tarjeta){
         $tiempo= new Tiempo();
        if($tarjeta->obtenerPrecio() != 0 && $tarjeta->obtenerSaldo() < 14.80)
        {
            return $tarjeta->descuentoViajesPlus();
        }
        else
        {
			$colectivo = new Colectivo(144,"RosarioBus",23);
            $tarjeta->descuentoSaldo($tiempo, $colectivo);
			$boleto = new Boleto ($tarjeta->obtenerPrecio(),$colectivo,$tarjeta,$tiempo);
			return $boleto;
        }
    }


}