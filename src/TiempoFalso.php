<?php

namespace TrabajoTarjeta;

class TiempoFalso extends Tiempo{
    protected $tiempo;

    public function __construct($iniciarEn = 0){
        $this->tiempo = $iniciarEn;
    } 

    public function avanzar($segundos){
        $this->tiempo += $segundos;
    }

    public function time(){
        return $this->tiempo;
    }

}