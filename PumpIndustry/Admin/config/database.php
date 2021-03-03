<?php
$hostname     = "localhost"; // Enter Your Host Name
$username     = "travelsa_PumpIndustry";      // Enter Your Table username
$password     = "Inspired@123";          // Enter Your Table Password
$databasename = "travelsa_PumpIndustry"; // Enter Your database Name


$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

