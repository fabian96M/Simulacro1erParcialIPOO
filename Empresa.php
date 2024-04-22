<?php
class Empresa
{
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
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getColClientes()
    {
        return $this->colClientes;
    }

    public function getColMotos()
    {
        return $this->colMotos;
    }

    public function getColVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }
    /* Metodos set */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setColClientes($colClientes)
    {
        $this->colClientes = $colClientes;
    }
    public function setColMotos($colMotos)
    {
        $this->colMotos = $colMotos;
    }
    public function setColVentasRealizadas($colVentasRealizadas)
    {
        $this->colVentasRealizadas = $colVentasRealizadas;
    }
    /* METODOS ESPECIALES */
    /* Metodo RetornarMoto($codigoMoto) */
    /* Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */
    public function retornarMoto($codigoMoto)
    {

        $i = 0;
        $objMoto = null;
        /* Se buscara mientras la variable bandera no marque haber encontrado algo y mientras no se agoten las posiciones del arreglo de motos */
        /* Recorremos el arreglo hasta encontrar el codigo que coincida (while) */
        while ($i < count($this->getColMotos())) {
            $motoActual = $this->getColMotos()[$i];
            /* Revisamoos que el el codigo de la moto coincida con el codigo del parametro */
            if ($motoActual->getCodigo() == $codigoMoto) {
                $objMoto = $motoActual;
                break;/* Finalizara el bucle en caso de encontrar el objeto */
            }
            $i++;
        }
        return $objMoto;
    }

    /*método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
*/


    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $importeFinal = 0;
        $coleccionMotos = [];
        $arregloVentas = [];
        /* Verificamos que el cliente tenga habilitacion para relaizar compras */
        $clienteHabilitado = !$objCliente->getDadoDeBaja();
        if ($clienteHabilitado) {
            /* Dentro de un bucle foreach recorremos la coleccion de codigos de moto que entra por parametro */
            foreach ($colCodigosMoto as $codMoto) {
                /* Dentro del bucle buscamos la moto correspondiente del arreglo colMotos que corresponda al codigo verificado en ese ciclo */
                $moto = $this->retornarMoto($codMoto);
                /* Comprobar que el objeto moto este disponible para la venta */
                if ($moto <> null && $moto->getActiva()) {
                    $importeFinal += $moto->darPrecioVenta();
                    array_push($coleccionMotos, $moto);
                }
            }
            /* si se vendieron motos */
            if (count($coleccionMotos) > 0) {
                /* crear una instancia de la clase ventas */
                $numVenta = count($this->getColVentasRealizadas()) + 1;
                /* Crear una instancia de ventas con la coleccion de motos creada */
                $venta = new Venta($numVenta, date('Y-m-d'), $objCliente, $coleccionMotos, $importeFinal);
                /* añadimos la instancia creada al arreglo de ventas de la clase */
                $arregloVentas = $this->getColVentasRealizadas();
                array_push($arregloVentas, $venta);
                /* Seteamos la clase con el nuevo arreglo creado */
                $this->setColVentasRealizadas($arregloVentas);
            }

            /* Comprobar que el objeto cliente o moto este disponible para la venta */
        }
        /* Si el cliente no esta habilitado el importe final sera 0 */
        return $importeFinal;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /* Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente */
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $colVentasCliente = [];
        /* Recorremos el arreglo de ventas */
        foreach ($this->colVentasRealizadas as $venta) {
            /* Comparamos el tipo y numero de documento en cada iteracion */
            $cliente = $venta->getObjCliente();
            if ($cliente->getTipoDoc() == $tipo && $cliente->getNumDoc() == $numDoc) {
                /* En caso positivo guardamos la venta en el array */
                array_push($colVentasCliente, $venta);
            }
        }
        /* Retornamos el array con los resultados */
        return $colVentasCliente;
    }

    public function arregloAString($arreglo)
    {
        $texto = "";
        foreach ($arreglo as $pos) {
            $texto .= $pos . " \n ";
        }
        return $texto;
    }
    /* Metodo ToString */
    public function __toString()
    {
        $clientes = "";
        $motos = "";
        $ventas = "";
        $clientes = $this->arregloAString($this->getColClientes());
        $motos = $this->arregloAString($this->getColMotos());
        $ventas = $this->arregloAString($this->getColVentasRealizadas());
        return "\n Denominacion: " . $this->getDenominacion() . " \n Direccion: " . $this->getDireccion() . " \n Clientes: \n" . $clientes . "\n Motos: " . $motos . " \n Ventas Realizadas: \n " . $ventas . "\n ";
    }
}
