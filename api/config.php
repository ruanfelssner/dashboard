<?php 

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$acao = $_GET['acao'];


$servername = "mysql.felss.dev";
$username = "felss";
$password = "toor2020";
$dbname = "felss";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>