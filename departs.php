<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Departments List</title>
</head>
<br style="margin: 50px;">
    <h2>Departments List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>id_admi</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && !empty($_POST['name'])) {
    
    $name = $_POST['name'];

   
    $sql_insert = "INSERT INTO departement (name,id_admi) VALUES ('$name,$id_admi')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}


if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id_dep'])) {
    $departement_id = $_GET['id_dep'];

    
    $sql_delete = "DELETE FROM departement WHERE id_dep = $departement_id";
    if ($conn->query($sql_delete) === TRUE) {
        
        header('Location: departs.php');
        exit;
    } else {
        echo "Error deleting department: " . $conn->error;
    }
}


$sql_select = "SELECT * FROM departement";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
                <td>" . $row["id_admi"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>

                
                    <a class='btn btn-info .btn-lg' href='dep-edition.php?id=" . $row["id_dep"] . "'>Update</a>
                    <a class='btn btn-warning .btn-lg' href='?action=delete&id_dep=" . $row["id_dep"] . "'>Remove </a>

                    

                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='3'>Departments not found.</td></tr>";
}
$conn->close();
?>
        </tbody>
    </table>
    
    <form name="form" action="newdepart.php" method="POST"><br><br>
        
        <button type="submit" class="btn btn-success">Add Department</button>
    </form>
    <br>
    <form name="form" action="logpage.php" method="POST">
    <button type="submit" class="btn btn-danger">click here to logout</button>
    </form>

</body>
</html>










