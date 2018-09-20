<?php

namespace TrabajoTarjeta;

class TiempoFalso implements TiempoInterface{
    protected $tiempo;

    public function __construct($iniciarEn = 0){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $this->tiempo = $iniciarEn;
    } 

    public function avanzar($segundos){
        $this->tiempo += $segundos;
    }

    public function time(){
        return $this->tiempo;
    }

}