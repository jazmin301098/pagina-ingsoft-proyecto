<?php
$servername = "localhost";
$database = "monicar";
$username = "monicar";
$password = "SuprPausa2";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";