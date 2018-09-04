<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {
	protected $id;

    protected $valor;

    protected $colectivo;

    public function __construct($valor, $id, $colectivo, $tarjeta) {
        $this->valor = $valor;
		$this->id = $id;
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
