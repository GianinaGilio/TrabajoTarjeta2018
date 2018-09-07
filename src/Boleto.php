<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

	/**$idTarjeta -> devuelve el numero ID de la tarjeta.
	*  $valor -> total abonado.
	* $linea_colectivo -> linea del colectivo que creo el boleto.
	* $tipoTarjeta -> si es mediaFranquicia, FranquicaCompleta o normal
	* $saldo -> saldo actual de la tarjeta.
	*/
	
	protected $idTarjeta;
    protected $valor;

    protected $linea_colectivo;

    public function __construct($valor, $linea_colectivo, $tarjeta) {
        $this->valor = $valor;
		$this->linea_colectivo = $linea_colectivo;
		$this->idTarjeta = $tarjeta->id;
		$this->saldo = $tarjeta->obtenerSaldo();
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
