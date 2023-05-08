<?php
// Include the database connection file
require_once('connectDB.php');

// Define variables and initialize with empty values
$name = $email = $password = "";
$name_err = $email_err = $password_err = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate name
  if (empty(trim($_POST['name']))) {
    $name_err = "Please enter your name.";
  } else {
    $name = trim($_POST['name']);
  }

  // Sanitize email
  $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

  // Validate email
  if (empty($email)) {
    $email_err = "Please enter your email address.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format.";
  }

  // Validate password
  if (empty(trim($_POST['password']))) {
    $password_err = "Please enter a password.";
  } else if (strlen(trim($_POST['password'])) < 3) {
    $password_err = "Password must have at least 6 characters.";
  } else {
    $password = trim($_POST['password']);
  }

  // Check for errors before inserting data into database
  if (empty($name_err) && empty($email_err) && empty($password_err)) {

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the insert statement
    $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect the user to the login page
    header("Location: login.html");
    exit();
  }
}
?>
