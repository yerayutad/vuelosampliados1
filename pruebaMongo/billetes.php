<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer
$cliente = new MongoDB\Client("mongodb://localhost:27017");

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
case 'GET':
$count = count($_GET);
$colection = $cliente->ADAT_VuelosAmpliados->vuelos;
if($count === 0){
$resultado = $colection->find();

foreach ($resultado as $entry) {
    echo '------ Código Vuelo : ' , $entry['codigo'], ' ------<br>Origen : ', $entry['origen'],'<br>Destino : ', $entry['destino'] , "<br>Fecha : " , $entry['fecha'] , "<br>Hora : " , $entry['hora'] , "<br>Plazas totales : " , $entry['plazas_totales'] , "<br>Plazas disponibles : " , $entry['plazas_disponibles'] , "<br><br>";
}
}else{
$query = array();
if(isset($_GET['codigo'])){
$query["codigo"] = $_GET['codigo'];
}
if(isset($_GET['origen'])){
$query["origen"] = $_GET['origen'];
}
if(isset($_GET['destino'])){
$query["destino"] = $_GET['destino'];
}
if(isset($_GET['fecha'])){
$query["fecha"] = $_GET['fecha'];
}
if(isset($_GET['hora'])){
$query["hora"] = $_GET['hora'];
}
if(isset($_GET['plazas_totales'])){
$query["plazas_totales"] = intval($_GET['plazas_totales']);
}
if(isset($_GET['plazas_disponibles'])){
$query["plazas_disponibles"] = intval($_GET['plazas_disponibles']);
}
$resultado = $colection->find($query);
foreach ($resultado as $entry) {
    echo '------ Código Vuelo : ' , $entry['codigo'], ' ------<br>Origen : ', $entry['origen'],'<br>Destino : ', $entry['destino'] , "<br>Fecha : " , $entry['fecha'] , "<br>Hora : " , $entry['hora'] , "<br>Plazas totales : " , $entry['plazas_totales'] , "<br>Plazas disponibles : " , $entry['plazas_disponibles'] , "<br><br>";
}
}
break;
case 'POST':
$colection = $cliente->ADAT_VuelosAmpliados->vuelos;
$query = array();
$query["dni"] = $_POST['dni'];
$query["apellido"] = $_POST['apellido'];
$query["nombre"] = $_POST['nombre'];
$query["dniPagador"] = $_POST['dniPagador'];
$query["tarjeta"] = $_POST['tarjeta'];
var_dump($query);
$resultado = $colection->insertOne($query);
foreach ($resultado as $entry) {
    echo 'Estado : "OK"<br>'.'------ Código Vuelo : ' , $entry['codigo'], ' ------<br>Origen : ', $entry['origen'],'<br>Destino : ', $entry['destino'] , "<br>Fecha : " , $entry['fecha'] , "<br>Hora : " , $entry['hora'] , "<br>Dni : " , $entry['dni'] , "<br>Apellido : " , $entry['apellido'] , "<br>Nombre : " , $entry['nombre'] , "<br>Dni Pagador : " , $entry['dniPagador'] , "<br>Tarjeta : " , $entry['tarjeta'] ,'<br><br>';
}
break;
case 'DELETE':
break;
case 'PUT':
break;
}
?>