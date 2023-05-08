<?php
// Include the database connection file
require_once('connectDB.php');



// Get the selected plan ID from the POST request
$selected_plan_id = $_POST['plan_id'];

// Update the user's plan in the database
$user_id = 1; // Replace with the user's actual ID
$sql = "UPDATE users SET plan_id = $selected_plan_id WHERE id = $user_id";
if (mysqli_query($conn, $sql)) {
    echo "Plan updated successfully";
} else {
    echo "Error updating plan: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>