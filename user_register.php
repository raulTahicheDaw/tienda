<?php
header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "secret";

$xmlDoc = file_get_contents("php://input");
$xml = simplexml_load_string($xmlDoc);

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, "utf8"); //formato de datos utf8

$nombre = $xml->name;
$dni = $xml->dni;
$email = $xml->email;
$password = $xml->password;
$sql = "INSERT INTO users (nombre, dni, email, password) VALUES ('$nombre','$dni','$email','$password')";

$result = mysqli_query($conn, $sql);

if ($result) {
   echo $xmlDoc;
}
