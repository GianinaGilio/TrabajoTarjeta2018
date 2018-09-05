<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {
	
	//$valor permite coocer el total abonado
	//$idTarjeta, la ID de la tarjeta
	//$saldo el saldo restante de la tarjeta
	protected $idTarjeta;

	
    protected $valor;

    protected $colectivo;

    public function __construct($valor, $idTarjeta, $saldo, $colectivo, $tarjeta) {
        $this->valor = $valor;
		$this->idTarjeta = $idTarjeta;
		$this->saldo = $saldo;
		
    }

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor() {
        return $this->valor;
    }

    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo() {

    }

}
