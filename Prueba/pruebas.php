<?php
include "ConexionBBDD.php";

$arrayMensaje = array(); //Asociativo
$arrayEmpleados = array(); //Numérico
$contador = 0;

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);
if(isset($result) && $result){
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

        $arrayEmpleado = array(); //Asociativo

        $arrayEmpleado["id"] = $row["id"];
        $arrayEmpleado["nombre"] = $row["nombre"];

        $arrayEmpleados[] = $arrayEmpleado;

        $contador++;
        /*
        echo "<br>";
        echo " ID: ".$row["id"]."<br>";
        echo " Nombre: ".$row["nombre"]."<br>";
        echo " Descripcion: ".$row["Descripcion"]."<br>";
        */
        $arrayMensaje["estado"] = "OK";
        $arrayMensaje["numeroEmpleados"] = $contador;
        $arrayMensaje["empleados"] = $arrayEmpleados;
        }
    } else {
            $arrayMensaje["estado"] = "OK";
            $arrayMensaje["numeroEmpleados"] = 0;

    }
    }else{
    $arrayMensaje["estado"] = "error";
    $arrayMensaje["arrayMensaje"] = "error al conectar";
    }


$mensajeJSON = json_encode($arrayMensaje, JSON_PRETTY_PRINT);

echo "<pre>";
echo $mensajeJSON;
echo "</pre>";
die();
?>