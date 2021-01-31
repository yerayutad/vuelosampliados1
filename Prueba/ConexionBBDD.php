<!DOCTYPE html>
<html>
<head>
</head>

<body>

<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "adat_pruebahibernate";
$conn = new mysqli($servername, $user,$password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}else
  //  echo "Conexión con BBDD correcta" ;
?>

</body>
</html>
