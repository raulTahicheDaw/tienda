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

$email = $xml->email;
$password = $xml->password;
$sql = "SELECT nombre from users WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows >0) {
    $datos = mysqli_fetch_array($result);
    $datos['message'] = 'OK';
    echo json_encode($datos);
} else {
    echo 'KO';
}
