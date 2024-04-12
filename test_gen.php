<?php
include_once 'Venta.php'; // Incluimos la clase Venta

// Creamos una instancia de Venta sin incluir Cliente y Moto
$venta = new Venta(1, "2024-04-12", null, [], 0);

// Mostramos la información de la venta
echo $venta;
