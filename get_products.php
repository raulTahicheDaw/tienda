<?php
header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "secret";


$categoria = $_GET["categoria"];

$consulta = 'SELECT * FROM products WHERE categoria = "' . $categoria . '"';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
mysqli_set_charset($conn, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conn, $consulta)) die(); //si la conexión cancelar programa

$rawdata = array(); //creamos un array

//guardamos en un array multidimensional todos los datos de la consulta
$i=0;

while($row = mysqli_fetch_array($result))
    {
    $rawdata[$i] = $row;
    $i++;
}


echo json_encode($rawdata);
