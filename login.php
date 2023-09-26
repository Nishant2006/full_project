<?php


// Database configuration
$servername = "localhost";  // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "userdata"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $enteredUsername = trim($_POST["username"]);
    $enteredPassword = trim($_POST["password"]);

    // Create and execute the SQL query to check if the username and password match
    $sql = "SELECT username , password FROM login where username='$enteredUsername' and password='$enteredPassword' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Check if a row was returned
    $validUsername = "username";
    $validPassword = "password";

    if ($sql){
        header("Location:index.php");
    }


        // Verify the entered password against the stored hashed password
    //     if ($enteredUsername == $validUsername ) {
           
    //         header("Location: index.php");
    //         exit;
    // }
}

// Close the database connection
$conn->close();
?>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            background-color: gray;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.9);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 0 10px readdir;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            color: #fff;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            margin: 10px;
            padding: 5px;
            width: 100%;
            border: none;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="password"] {
            height: 30px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color: red;
        }

        #sign {
            background-color: #333;
            border: none;
            color: #fff;
            text-decoration: underline;
            cursor: pointer;
        }

        #sign:hover {
            color: #4CAF50;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        label{
            color: red; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p><?php echo $error; ?></p>
        <button id="sign" onclick="location.href='sign.php'">For Sign Up</button>
    </div>
</body>
</html>