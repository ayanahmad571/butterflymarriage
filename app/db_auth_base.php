<?php


$servername = "localhost";

$username = "root";
$password = "";
$dbname = "bmarriage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Unable to establish a secure connection with the server.");
 } 
date_default_timezone_set('Asia/Dubai');

?>
