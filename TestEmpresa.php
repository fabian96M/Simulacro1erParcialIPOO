<?php
include_once "Cliente.php";
include_once "Empresa.php";
include_once "Moto.php";
include_once "Venta.php";
/* Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2. */
$objCliente1 = new Cliente("Ricardo", "Milos", false, "DNI", "12345678");
$objCliente2 = new Cliente("Fernanda", "Tasa", false, "DNI", "87654321");
$colClientes = [$objCliente1, $objCliente2];
/* Cree 3 instancias de la clase Moto: $objMoto1, $objMoto2, $objMoto3. */
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "zanella zr 150 ohc",70, true);
$objMoto3 = new Moto(13,999900, 2023, "Zanella patagonian eagle 250", 55, false);
$colMotos1 = [$objMoto1, $objMoto2, $objMoto3];
/* Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[]. */
$empresa1 = new Empresa("AltaGama", "Av Argentina 123", $colClientes, $colMotos1, [] );
/* Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido. */
$empresa1->registrarVenta([11,12,13], $objCliente2);

/* Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido. */
$empresa1->registrarVenta([0], $objCliente2 );

/* Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido. */

$empresa1->registrarVenta([2], $objCliente2);

/* Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1. */
$col1 = $empresa1->retornarVentasXCliente($objCliente1->getTipoDoc(), $objCliente1->getNumDoc());
/* Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2 */
$col2 = $empresa1->retornarVentasXCliente($objCliente2->getTipoDoc(), $objCliente2->getNumDoc());
/* Realizar un echo de la variable Empresa creada en 2. */
echo $empresa1;
echo "\n //////////////////////////////////////////////////////////////////////////////////////////// \n";
echo coleccionTexto($col1);
echo "\n //////////////////////////////////////////////////////////////////////////////////////////// \n";
echo coleccionTexto($col2);


function coleccionTexto($coleccion){
    $texto = "";
    foreach($coleccion as $indice){
        $texto .= "\n ".$indice."\n";
    }
    return $texto;
}
