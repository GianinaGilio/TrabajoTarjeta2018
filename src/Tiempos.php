<?php

namespace TrabajoTarjeta;

class Tiempo implements TiempoInterface{

    public function time(){
        return time();
    }

}

class TiempoFalse implements TiempoInterface{
    protected $tiempo;

    public function __construct($iniciarEn = 0){
        $this->tiempo = $iniciarEn;
    } 

    public function avanzar($segundos){
        $this->tiempo += $segundos;
    }

    public function timefalso(){
        return $this->tiempo;
    }

}