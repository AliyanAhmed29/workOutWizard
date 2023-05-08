<?php
// define your database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hardknocks";

// create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected to database successfully!";
}
?>
