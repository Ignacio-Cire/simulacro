<?php

// Incluir las definiciones de las clases Cliente,Moto y venta
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'Empresa.php';

// Crear la primera instancias de distintos clientes
//nombre, apellido,dado de baja,tipo y el númer de doc
$objCliente1 = new Cliente("Marcos", "Aguila", false, "DNI", "12345678");
$objCliente2 = new Cliente("Agustina", "item", true, "Cédula", "87654321");

echo "------------ \n";
echo "CLIENTES:\n";
echo "cliente 1 : \n" . $objCliente1;
echo "cliente 2 : \n" . $objCliente2;

// Crear tres objetos Moto con la información proporcionada
/* $codigo; $costo; $anoFabricacion; $descripcion;  $porcentajeIncrementoAnual;
     $activa;**/
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

echo "------------ \n";
echo "MOTOS \n";
echo "Moto 1 : \n" . $objMoto1;
echo "Moto 2 :  \n" . $objMoto2;
echo "Moto 3 : \n" . $objMoto3;


/*Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].**/

$colMotos = [$objMoto1, $objMoto2, $objMoto3];
$colClientes = [$objCliente1, $objCliente2];

/* private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;**/
$objEmpresa = new Empresa("Alta Gama", "Av Argetina 123",$colClientes,$colMotos ,[] );



/*Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.**/
$registroVenta=$objEmpresa->registrarVenta([11, 12, 13], $objCliente2);



/*Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.**/

$registroVenta2=$objEmpresa->registrarVenta([0], $objCliente2);



/*Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.**/

$registroVenta3=$objEmpresa->registrarVenta([2], $objCliente2);



/*Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.**/

//$objCliente1 = new Cliente("Marcos", "Aguila", false, "DNI", "12345678");
$tipo=$objCliente1->get_tipo_dni();
$numDoc=$objCliente1->get_nro_dni();
$retornarVenta=$objEmpresa->retornarVentasXCliente($tipo,$numDoc);


//$objCliente2 = new Cliente("Agustina", "item", true, "Cédula", "87654321");
$tipo=$objCliente2->get_tipo_dni();
$numDoc=$objCliente2->get_nro_dni();
$retornarVenta=$objEmpresa->retornarVentasXCliente($tipo,$numDoc);


echo "--EMPRESA--\n";
echo $objEmpresa;





