<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interns List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h2>Interns List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>id_intern</th>
                <th>f_name</th>
                <th>l_name</th>
                <th>birthday</th>
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $birthday = $_POST['birthday'];

    
    $sql_insert = "INSERT INTO intern (f_name, l_name, birthday) VALUES ('$f_name', '$l_name', '$birthday')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "New intern added successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}




if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id_intern'])) {
    $intern_id = $_GET['id_intern'];

    
    $sql_delete = "DELETE FROM intern WHERE id_intern = $intern_id";
    if ($conn->query($sql_delete) === TRUE) {
        
        header('Location: interns.php');
        exit;
    } else {
        echo "Error deleting intern: " . $conn->error;
    }
}

$sql_select = "SELECT * FROM intern";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
                <td>" . $row["id_intern"] . "</td>
                <td>" . $row["f_name"] . "</td>
                <td>" . $row["l_name"] . "</td>
                <td>" . $row["birthday"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edition.php?id=" . $row["id_intern"] . "'>Update</a>
                    <a class='btn btn-danger btn-sm' href='?action=delete&id_intern=" . $row["id_intern"] . "'>Remove</a>


                     </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Interns not found.</td></tr>";
}

$conn->close();
?>
        </tbody>
    </table>
    
    <form name="form" action="newintern.php" method="POST">
        
        <input type="submit" value="Add Intern">
    </form>
</body>
</html>
