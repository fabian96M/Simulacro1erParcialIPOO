<?php 
class Empresa{
    /* Atributos */
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentasRealizadas;
    /* Metodo constructor */
    public function __construct($denominacion, $direccion, $colClientes, $colMotos, $colVentasRealizadas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentasRealizadas = $colVentasRealizadas;
    }
    /* Metodos Get */
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function getColClientes(){
        return $this->colClientes;
    }

    public function getColMotos(){
        return $this->colMotos;
    }

    public function getColVentasRealizadas(){
        return $this->colVentasRealizadas;
    }
    /* Metodos set */
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setColClientes($colClientes){
        $this->colClientes = $colClientes;
    }
    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }
    public function setColVentasRealizadas($colVentasRealizadas){
        $this->colVentasRealizadas = $colVentasRealizadas;
    }
    /* Metodo ToString */
    public function __toString()
    {
        $clientes = "";
        $motos = "";
        $ventas = "";
        foreach ($this->getColClientes() as $cliente){
            $clientes .= $cliente." \n ";
        }
        foreach ($this->getColMotos() as $moto){
            $motos .= $moto." \n ";
        }
        foreach ($this->getColVentasRealizadas() as $venta){
            $ventas .= $venta." \n ";
        }
        return "\n Denominacion: ".$this->getDenominacion()." \n Direccion: ".$this->getDireccion()." \n Clientes: \n".$clientes."\n Motos: ".$motos." \n Ventas Realizadas: \n ".$ventas."\n ";
    }
}