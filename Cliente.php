<?php
class Cliente{
    /* atributos */
    private $nombreCliente;
    private $apellidoCliente;
    private $dadoDeBaja;
    private $tipoDoc;
    private $numDoc;

    /* metodo constructor */
    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDoc, $numDoc)
    {
        $this->nombreCliente = $nombre;
        $this->apellidoCliente = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }
    /* Metodos get */
    public function getNombreCliente(){
        return $this->nombreCliente;
    }
    public function getApellidoCliente(){
        return $this->apellidoCliente;
    }
    public function getDadoDeBaja(){
        return $this->dadoDeBaja;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }

    /* Metodos Set */
    public function setNombreCliente($nombre){
        $this->nombreCliente = $nombre;
    }
    public function setApellidoCliente($apellido){
        $this->apellidoCliente = $apellido;
    }
    public function setDadoDeBaja($dadoDeBaja){
        $this->dadoDeBaja = $dadoDeBaja;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDocumento($numDoc){
        $this->numDoc = $numDoc;
    }
    /* Metodo booleano a string */
    public function booleanoATexto($varbooleana){
        if($varbooleana){
            $texto = "Si";
        }
        else{
            $texto = "No";
        }
        return $texto;

    }
    /* Metodo ToString */
    public function __toString()
    {
        return "\n Nombre Cliente : ".$this->getNombreCliente()." \n Apellido Cliente: ".$this->getApellidoCliente()." \n Dado de baja: ".$this->booleanoATexto($this->getDadoDeBaja())." \n Tipo de Documento: ".$this->getTipoDoc()." \n Numero de Documento: ".$this->getNumDoc()." \n";
    }


}