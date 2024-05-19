
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <style>
       
        body {
            font-family: Georgia, serif;
            background-color: #9dc2ec;
            margin-top: 0;
            padding: 0;
            
        }
       
        form {
            max-width: 588px;
            margin: 25px AUTO;
            margin-left: 50%;
            background-color: #9257a5;
            padding: 120px;
            border-radius: 26px;
            box-shadow: 0 0 20px #b985db;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="username"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid black;
            border-radius: 8px;
            background-color: #9257a5;
        }

        input[type="submit"] {
            width: 49%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        input[type="submit"][value="login"] {
            background-color: #af7ac5;
        }

        input[type="submit"][value="login"]:hover {
            background-color: #3783cb;
        }

        input[type="submit"][value="cookies"] {
            background-color: black;
        }

        input[type="submit"][value="cookies"]:hover {
            background-color: #3783cb;
        }

        .password-container {
            position: relative;
        }

        #togglePassword {
            position: absolute;
            top: 36%;
            right: 5px;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
        }
        
        .welcome-message {
            position: absolute;
            top: 150px;
            left: 150px;
            font-size: 50px;
            font-weight: bold;
        }    
        .LOGO-message{
    color:  #69145f ; 
    position: absolute;
    top: 22px;
    left: 22px;
    font-weight: bold;  
    font-size: 25px;
    
}
    </style>
</head>
<body>
        <form name="form" action="" method="POST">
    
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username"> <br><br>

        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" name="password" id="passwordInput" placeholder="Password">
            <input type="checkbox" id="showPasswordCheckbox">
            <label for="showPasswordCheckbox">remember me</label>
        </div>
        <br><br>

        <input type="submit" name="submit" value="cookies"> 
        <input type="submit" name="submit" value="login"> 
        

        
    </form>
    <div class="welcome-message">Welcome Admin!</div>
    <div class="LOGO-message">TRAINEE MANAGEMENT</div>
    
</body>
</html>


<?php
require_once('dbconnect.php');

if($_SERVER["REQUEST_METHOD"]=="post"){
    $username=$_POST["username"];
    echo($username);
    $password=$_POST["password"];
    echo($password);

$sql="select * from administration where username ='.  $username.' and password ='. $password.' ";
echo($result);
$result =mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo($row["usertype"]);
if($row["usertype="]== "admin"){
    header("PASSWORD IS CORRECT");
}
else{
    echo "Invalid username or password.";
}

}
?>