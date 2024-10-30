<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtianxii_ipa";

// Create connection
$conn = mysqli_connect(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if (!$conn) {
    die("Connection gagal: " . mysqli_connect_error());
}
