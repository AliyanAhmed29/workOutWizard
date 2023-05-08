<?php

require_once('connectDB.php');
// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the name of the user to search for
$search_name = $_POST["name"];

// Build the SQL query
$sql = "SELECT * FROM users WHERE name LIKE '%" . $search_name . "%'";

// Execute the query
$result = $conn->query($sql);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br><br>";
    }
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();

?>
