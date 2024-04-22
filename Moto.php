<?php
class Moto
{
    /* atributos */
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $PorcIncrementoAnual;
    private $activa;
    /* Metodo construct */
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $PorcIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->PorcIncrementoAnual = $PorcIncrementoAnual;
        $this->activa = $activa;
    }
    /* Metodos de acceso */
    /* Metodos GET */
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPorcIncrementoAnual()
    {
        return $this->PorcIncrementoAnual;
    }
    public function getActiva()
    {
        return $this->activa;
    }
    /* Metodos SET */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPorcIncrementoAnual($PorcIncrementoAnual)
    {
        $this->PorcIncrementoAnual = $PorcIncrementoAnual;
    }
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }
    /* Metodo darPrecioVenta */
    public function darPrecioVenta()
    {
        $precioVenta = -1;
        /* comprobamos que la moto se encuentre activa */
        if ($this->getActiva()) {
            /* Calculamos los anios desde que se fabrico la moto */
            $aniosDesdeFab = ((date('Y')) - $this->getAnioFabricacion());
            /* Si la moto está disponible para la venta, el método realiza el siguiente cálculo: */
            $precioVenta = $this->getCosto() + $this->getCosto() * ($aniosDesdeFab * $this->getPorcIncrementoAnual());
        }
        /* Finalmente se retornara -1 en caso de no estar disponible la moto para venta o un precio en caso de que si */
        return $precioVenta;
    }
    /* Metodo ToString */
    public function __toString()
    {
        $actividad = "";
        if ($this->getActiva()) {
            $actividad = " Si ";
        } else {
            $actividad = " No ";
        }
        return "\n Codigo moto: " . $this->getCodigo() . "\n Costo:  " . $this->getCosto() . " \n Año de Fabricacion: " . $this->getAnioFabricacion() . " \n Descripcion: " . $this->getDescripcion() . " \n Porcentaje De Incremento Anual: " . $this->getPorcIncrementoAnual() . " \n Actividad para Venta: " . $actividad . "\n ";
    }
}
