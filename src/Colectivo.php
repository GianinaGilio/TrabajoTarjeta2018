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
            return FALSE;
        }
        else
        {
            $tarjeta->saldo -=14.80;
            return TRUE; // No se si hay que retornar TRUE o lo que queda de saldo
        }
    }


}