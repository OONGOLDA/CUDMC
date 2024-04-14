<?php
// Include your database connection file
include_once "db_config.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Prepare the insert query
    $name = $_POST['name'];
    $position = $_POST['position'];
    $birthday = $_POST['birthday'];
    $imageNumber = $_POST['imageNumber'];
    $sql = "INSERT INTO individuals (Name, Position, Birthday, ImageNumber)
            VALUES ('$name', '$position', '$birthday', '$imageNumber')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, redirect to another webpage
        header("Location: data.php"); // Change 'another_page.php' to the desired webpage
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
    <title>Input Form</title>
</head>
<body>
<form action="" method="post"> <!-- Removed /submit_data from action attribute -->
    <table>
      
<h2>Input Form</h2>
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" id="name" name="name"></td>
        </tr>
        <tr>
            <td><label for="position">Position:</label></td>
            <td><input type="text" id="position" name="position"></td>
        </tr>
        <tr>
            <td><label for="birthday">Birthday:</label></td>
            <td><input type="date" id="birthday" name="birthday"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"></td> <!-- Added name attribute to submit button -->
        </tr>
    </table>
</form>
<a href="data.php">View Data Pictorially</a>
</body>
</html>
