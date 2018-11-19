<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

	/**$idTarjeta -> devuelve el numero ID de la tarjeta.
	* $valor -> total abonado.
	* $linea_colectivo -> linea del colectivo que creo el boleto.
	* $tipoTarjeta -> si es mediaFranquicia, FranquicaCompleta o normal
    * $saldo -> saldo actual de la tarjeta.
    * $fecha -> fecha del momento en que se efectua el pago
	*/
	
	protected $idTarjeta;
    protected $valor;
    protected $saldo;
    protected $linea_colectivo;
    protected $fecha;
    protected $trasbordo;

    public function __construct($valor, ColectivoInterface $colectivo, TarjetaInterface $tarjeta, TiempoInterface $tiempo) {
        $this->valor = $valor;
		$this->linea_colectivo = $colectivo->linea();
		$this->idTarjeta = $tarjeta->obtenerID();
        $this->saldo = $tarjeta->obtenerSaldo();
        $this->fecha= date("D/m/Y H:i:s", $tiempo->time());
        
        //Nos va a servir para que el boleto diga TRANSBORDO, si la bandera es TRUE
        $this->trasbordo= $tarjeta->banderaTrasb;
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
    public function obtenerLinea() {
        return $this->linea_colectivo;
    }

     /**
     * Devuelve el ID de la tarjeta
     * 
     * @return int
     */
    public function obtenerID() {
        return $this->idTarjeta;
    }

    /**
     * Devuelve el saldo que queda en la tarjeta
     * 
     * @return float
     */
    public function obtenerSaldo() {
        return $this->saldo;
    }

    /**
     * Devuelve la fecha del día y hora del momento en el que se efectuo el pago
     * 
     * @return string
     */
    public function obtenerFecha() {
        return $this->fecha;
    }

}
