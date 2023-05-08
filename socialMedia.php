
<?php

require_once('connectDB.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the values from the form
  $date = $_POST["date"];
  $protein = $_POST["protein"];
  $carbs = $_POST["carbs"];
  $water = $_POST["water"];

  // Insert the values into the database
  $sql = "INSERT INTO daily_intake (date, protein, carbs, water) VALUES ('$date', '$protein', '$carbs', '$water')";

  if (mysqli_query($conn, $sql)) {
    // Display a success message
    echo "Your daily intake has been saved!";
  } else {
    // Display an error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

mysqli_close($conn);

?>
To use this script, you'll need to create a form in your HTML file that submits the values to the PHP script using the POST method. Here's an example form that you could use:

python
Copy code
<form method="post" action="save_daily_intake.php">
  <label for="date">Date:</label>
  <input type="date" id="date" name="date" required>
  
  <label for="protein">Percentage of protein:</label>
  <input type="number" id="protein" name="protein" min="0" max="100" required>
  
  <label for="carbs">Percentage of carbs:</label>
  <input type="number" id="carbs" name="carbs" min="0" max="100" required>
  
  <label for="water">Percentage of water:</label>
  <input type="number" id="water" name="water" min="0" max="100" required>
  
  <button type="submit">Save</button>
</form>
When the user submits this form, it will send a POST request to the save_daily_intake.php file. The PHP script will then insert the values into the daily_intake table in the database.

Note that this is a very basic example and there are many things you could do to improve the security and functionality of this code, such as adding input validation and error handling, and sanitizing user input to prevent SQL injection attacks.






