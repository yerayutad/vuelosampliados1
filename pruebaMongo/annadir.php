<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer
require 'mostrarTodo.php';
$cliente = new MongoDB\Client("mongodb://localhost:27017");
$colection = $cliente->ADAT_VuelosAmpliados->vuelos;

$resultado = $colection->insertOne( [ 'Codigo' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$resultado->getInsertedId()}'";
?>