<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface{

    public function linea(){

    }

    public function empresa(){
        
    }

    public function numero(){
        
    }

    public function pagarCon(TarjetaInterface $tarjeta){
        if($tarjeta->obtenerSaldo() < 14.80)
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