<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Department</title>

    <body style="margin: 50px;">
<div class="container">
    <h2>Edit Department</h2>
    <?php

    // database parameters  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projetweb1";
    // connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check if the connection successeful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_dep']) && isset($_POST['name'])) {
        $id_dep = $_POST['id_dep'];
        $new_name = $_POST['name'];

        // Update the department in the database
        $sql = "UPDATE departement SET name = '$new_name' WHERE  id_dep= '$id_dep' ";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to inter.php
            header("Location: departs.php");
            exit();
        } else {
            echo "Error updating department: " . $conn->error;
        }
    }
    // Retrieve department data based on id
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id_depart = $_GET['id'];
        $sql = "SELECT * FROM departement WHERE id_dep= $id_dep";// get from the departement table
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id_dep" value="<?php echo $row['id_dep']; ?>">
                Department Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
                <input type="submit" value="Update">
            </form>
            <form name="form" action="logpage.php" method="post">
          <button type="submit" class="btn btn-dark">Logout</button>
         </form>
            <?php
        } else {
            echo "No department found with the provided ID.";
        }
    } else {
        echo "No ID provided.";
    }
    // Close connection
    $conn->close();
    ?>
</div>
</body>
</html>







