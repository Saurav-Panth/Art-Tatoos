<?php
$host = "localhost";
$user = "u723633887_livingart";
$pass = "Livingart@789";
$dbname = "u723633887_livingart";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
