<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More departements</title>
    <style>
        
        header {
            background-color: #4CAF50; 
            color: white;
            padding: 20px;
            text-align: center;
            font-style: italic;
            font-size: 28px;
            box-shadow: 0 0 50px #5fd927;
                }

        

        
        form {
            max-width: 300px;
            margin: 20px auto;
            background-color: #8B4513; 
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50; 
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <header>
        <h1>More departements</h1>
    </header>

    <form action="departs.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter the name of the departement...">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
