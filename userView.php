<?php
require_once('connectDB.php');
// Get the current date
$date = date("Y-m-d");

// Check if the user has submitted the form
if(isset($_POST['submit'])) {

  // Get the input values from the form
  $proteins = $_POST['proteins'];
  $carbohydrates = $_POST['carbohydrates'];
  $water = $_POST['water'];
  $user_plan = $_POST['user_plan'];

  // Open the data file for the current date
  $file_name = "data/".$date.".txt";
  $file = fopen($file_name, "a");

  // Write the input values to the data file
  fwrite($file, $proteins."\t".$carbohydrates."\t".$water."\t".$user_plan."\n");

  // Close the data file
  fclose($file);

  // Display a success message
  echo "Data saved successfully.";

}

?>

<form method="post">
  <label for="proteins">Proteins:</label>
  <input type="text" name="proteins" id="proteins">
  
  <label for="carbohydrates">Carbohydrates:</label>
  <input type="text" name="carbohydrates" id="carbohydrates">
  
  <label for="water">Water:</label>
  <input type="text" name="water" id="water">
  
  <label for="user_plan">User Plan:</label>
  <select name="user_plan" id="user_plan">
    <option value="1">Plan 1</option>
    <option value="2">Plan 2</option>
    <option value="3">Plan 3</option>
    <option value="4">Plan 4</option>
  </select>
  
  <input type="submit" name="submit" value="Save">
</form>
