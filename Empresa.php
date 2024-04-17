<?php

class Empresa {
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;
    

    public function __construct($den, $dir, $cli, $mot, $vtas) {
        $this->denominacion = $den;
        $this->direccion = $dir;
        $this->colClientes = $cli;
        $this->colMotos = $mot;
        $this->colVentas = $vtas;
      
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColClientes() {
        return $this->colClientes;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function getColVentas() {
        return $this->colVentas;
    }
    


// METODOS SET
    public function setDenominacion($den) {
        $this->denominacion = $den;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }

    public function setColClientes($cli) {
        $this->colClientes = $cli;
    }

    public function setColMotos($mot) {
        $this->colMotos = $mot;
    }

    public function setColVentas($vtas) {
        $this->colVentas = $vtas;
    }
   

    /*Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.**/

    // esta funcion retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro


    public function retornarMoto($codigoMoto){
        $arrayMotos = $this->getColMotos();//coleccion de motos de la empresa 
        $objMoto= null; //entra como nulo
        $n=count($arrayMotos);//cuenta la cantidad de codigos de la coleccion
        $i=0;
        while($i<$n && $objMoto == null){
            if($arrayMotos[$i]->getCodigo() == $codigoMoto){
                $objMoto= $arrayMotos[$i];
            }
            $i++;
        }return $objMoto;
         }   
         


     

     /*Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección, se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. 
Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.**/


public function registrarVenta($colCodigosMoto, $objCliente) {
    $fecha = ["Día" => 6, "Mes" => 12, "Año" => 2003]; // Variable fecha
    $objVenta = new Venta(0000, $fecha, $objCliente, [], 320910652); // Instancia objeto
    $colMoto = $this->getColMotos();
    $coleccionMotosVendidas = $objVenta->getArraysMotos();
    $encontrado = false;
    $n = count($colMoto); // Cantidad de elementos de la colección

    for ($i = 0; $i < $n && !$encontrado; $i++) {
        $objMoto = $colMoto[$i]; // Obtener el objeto Moto en la posición $i
        $codigo = $objMoto->getCodigo(); // Obtener el código de la motocicleta en lugar de la clase Cliente


        if ($colCodigosMoto == $codigo) { // Comparar el código de la moto con los códigos de la colección de motos
            $estado = $objCliente->getDadoBaja();
            if (!$estado && $objMoto->getActiva()) { // Verificar si el cliente no está dado de baja y la moto está activa
                $objVenta->incorporarMoto($objMoto); // Incorporar la moto a la venta
                $encontrado = true;
            }
        }
    }

    $precio = $objVenta->getPrecioFinal(); // Obtener el precio final de la venta
    return $precio;
}

    


public function retornarVentasXCliente($tipo,$numDoc){
    $ColVentasCliente=[];//coleccion vacia que almacena clientes que debe retornar
    
    // Obtener la colección de ventas de la empresa
    $todasLasVentas = $this->getColVentas();
    $n = count($todasLasVentas); // Cantidad de ventas


    // Recorrer todas las ventas
    foreach ($todasLasVentas as $venta) {
        // Obtener el cliente asociado a la venta
        $clienteVenta = $venta->getObjCliente();
        // Verificar si el cliente de la venta coincide con el tipo y número de documento proporcionados por parametro
        if (($clienteVenta->getTipoDocumento() == $tipo) && ($clienteVenta->getNumeroDocumento() == $numDoc)) {
            // Si coincide, agregar la venta a la colección de ventas del cliente
            array_push($ColVentasCliente,$venta);
        }
    }

    // Retornar la colección de ventas del cliente
    return $ColVentasCliente;
}



public function __toString() {
    $n = count($this->getColMotos()); // Cantidad de motos
    $x = count($this->getColClientes()); // Cantidad de clientes
    $y = count($this->getColVentas()); // Cantidad de ventas realizadas

    $info = "Denominación: " . $this->getDenominacion() . "\n";
    $info .= "Dirección: " . $this->getDireccion() . "\n";
    $info .= "Cantidad de clientes: " . $x . "\n";
    $info .= "Cantidad de motos: " . $n . "\n";
    $info .= "Cantidad de ventas realizadas: " . $y . "\n";
    return $info;
}


}
