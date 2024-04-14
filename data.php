<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Individuals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }

        input[type="text"] {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Include your database connection file
    include_once "db_config.php";

    // Check if update form is submitted
    if(isset($_POST['update'])){
        // Get the values from the form
        $name = $_POST['name'];
        $position = $_POST['position'];
        $birthday = $_POST['birthday'];
        $imageNumber = $_POST['imageNumber'];

        // Construct the update query
        $sql = "UPDATE individuals SET Position='$position', Birthday='$birthday', ImageNumber='$imageNumber' WHERE Name='$name'";

        // Execute the update query
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Fetch inserted data from the database
    $sql = "SELECT * FROM individuals";
    $result = $conn->query($sql);

    // Check if there is data
    if ($result->num_rows > 0) {
        echo "<h2>Names of CUDMC </h2>";
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Birthday</th>
                    <th>Image Number</th>
                    <th>Action</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <form method='post'>
                        <td>" . $row["Name"] . "<input type='hidden' name='name' value='" . $row["Name"] . "'></td>
                        <td><input type='text' name='position' value='" . $row["Position"] . "'></td>
                        <td><input type='text' name='birthday' value='" . $row["Birthday"] . "'></td>
                        <td><input type='text' name='imageNumber' value='" . $row["ImageNumber"] . "'></td>
                        <td><input type='submit' name='update' value='Update'></td>
                    </form>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No data available";
    }
    ?>

    <!-- Link to pictorial.php -->
    <a href="pictorial.php">View Form</a>
</div>

</body>
</html>
