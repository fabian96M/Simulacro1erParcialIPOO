<?php
include_once "Moto.php";
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
    /* Metodo incorporarMoto */
    public function incorporarMoto($objMoto){
/* inicializamos una var booleana que retornara para avisar si la venta fue posible o no */
$venta = false;
/* Verificamos que la venta sea posible (que este activa) */
if($objMoto->getActiva()){
    $venta = true;
    $precioMoto = $objMoto->darPrecioVenta();
    /* almacenamos el arreglo en un arreglo axuiliar */
    $arregloMotos = $this->getColObjMoto();
    /* modificamos el arreglo auxiliar añadiendo el objeto que entra por parametro */
    $arregloMotos[]= $objMoto;
    /* modificamos el arreglo de motos de la clase enviando por parmetro el arreglo con el objeto añadido */
    $this->setColObjMoto($arregloMotos);
    /* Actualizamos tambien la variable de precio final */
   $this->setPrecioFinal($this->getPrecioFinal() + $precioMoto);
}
/* Si la venta se pudo concretar se devolvera true para confirmarlo */
return $venta;

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
