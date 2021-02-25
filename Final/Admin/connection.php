<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mySite";

$homeURL = "index.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully!!!!!! <hr>";
?>