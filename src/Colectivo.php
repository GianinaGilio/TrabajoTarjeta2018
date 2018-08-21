<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface{
	public $lin;
	public $emp;
	public $num;

	public function _construct($lin, $emp, $num) {
        $this->lin = $lin;
		$this->emp = $emp;
		$this->num = $num;
    
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
        if($tarjeta->precio != 0 && $tarjeta->obtenerSaldo() < 14.80)
        {
            
            if($tarjeta->plus>0)
            {
                $tarjeta->plus-=1;
                return TRUE;
            }

            return FALSE;
        }
        else
        {
            $tarjeta->saldo -=$tarjeta->precio;
            return $tarjeta->saldo; 
        }
    }


}