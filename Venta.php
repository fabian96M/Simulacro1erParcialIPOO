<?php
class Venta
{
    /* Atributos */
    private $numero;
    private $fecha;
    private $objCliente;
    private $ColObjMoto;
    private $precioFinal;
    /* Metodo Constructor */
    public function __construct($numero, $fecha, $objCliente, $ColObjMoto, $precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->ColObjMoto = $ColObjMoto;
        $this->precioFinal = $precioFinal;
    }
    /* Metodos de acceso */
    /* Metodos Get */
    public function getNumero()
    {
        return $this->numero;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }
    public function getColObjMoto()
    {
        return $this->ColObjMoto;
    }
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }
    /* Metodos Set */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }
    public function setColObjMoto($ColObjMoto)
    {
        $this->ColObjMoto = $ColObjMoto;
    }
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
    /* Metodo ToString */
    public function __toString()
    {
        $motos = "";
        foreach ($this->getColObjMoto() as $moto) {
            $motos .= $moto . "\n";
        }
        return "Numero de Venta: " . $this->getNumero() . "\n Fecha: " . $this->getFecha() . "\n Cliente: " . $this->getObjCliente() . "\n Motos: \n Precio Final: $" . $this->precioFinal . "\n";
    }
}
