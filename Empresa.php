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

    public function getClientes() {
        return $this->colClientes;
    }

    public function getMotos() {
        return $this->colMotos;
    }

    public function getVentas() {
        return $this->colVentas;
    }


// METODOS SET
    public function setDenominacion($den) {
        $this->denominacion = $den;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }

    public function setClientes($cli) {
        $this->colClientes = $cli;
    }

    public function setMotos($mot) {
        $this->colMotos = $mot;
    }

    public function setVentas($vtas) {
        $this->colVentas = $vtas;
    }

    /*Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.**/

    public function retornarMoto($codigoMoto){
    $arrayMotos = $this->getMotos();//coleccion de motos
    $objMoto= null;
    $i=0;
    while($i<count($arrayMotos) && $objMoto == null){
        if($arrayMotos[$i]->getCodigo() == $codigoMoto){
            $objMoto= $arrayMotos[$i];
        }
        $i++;
    }return $objMoto;
     }   
     

     /*Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.**/
     

public function registrarVenta($colCodigosMoto, $objCliente){
    $importeFinal = 0;
    $objVenta = new Venta(); // Crear una nueva instancia de Venta
    $i = 0;
    $n = count($colCodigosMoto);//cuenta los codigos de la coleccion
    
    $ventaActiva = $this->getActiva();//la moto esta activa para la venta

    while ($i < $n && $ventaActiva) {
        $codigoMoto = $colCodigosMoto[$i];//obtiene el código de moto en la posición actual del arreglo
        $moto = $this->retornarMoto($codigoMoto);//llama a la func de arriba

        // si la moto es distinto de nulo,esta activa, y el cliente no esta dado de baja...
        if ($moto !== null && $moto ==$ventaActiva && !$objCliente->getDadoBaja()) {
            $objVenta->incorporarMoto($moto); // Agregar la moto a la venta
            $importeFinal += $moto->getPrecio(); // Sumar el precio de la moto al importe final
        
        }

        $i++;
    }

    // Aquí podrías realizar cualquier otra lógica relacionada con el cálculo del importe final


    // Setear las variables de instancia de venta
    $objVenta->setCliente($objCliente);
    // Otros seteos de la venta...

    return $importeFinal;
}



    public function __toString() {
        $rta = "Denominación: " . $this->getDenominacion() . "\n";
        $rta .= "Dirección: " . $this->getDireccion() . "\n";
        $rta .= "Clientes:\n";
        foreach ($this->getClientes() as $cli) {
            $rta .= "- " . $cli . "\n";
        }
        $rta .= "Motos:\n";
        foreach ($this->getMotos() as $mot) {
            $rta .= "- " . $mot . "\n";
        }
        $rta .= "Ventas:\n";
        foreach ($this->getVentas() as $vtas) {
            $rta .= "- " . $vtas . "\n";
        }
        return $rta;
    }
}

