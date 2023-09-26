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

// Initialize error messages array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize data from the form
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email    = trim($_POST['email']);
    // Check if username is not empty
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Check if password is not empty
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check if the username already exists
    $check_sql = "SELECT username FROM login WHERE username = '$username'";
    $check_stmt = $conn->prepare($check_sql);
    // $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        $errors[] = "Username already exists. Please choose a different one.";
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Create and execute the SQL query
        $insert_sql = "INSERT INTO sign (username, password, email) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $username, $password, $email);

        if ($insert_stmt->execute()) {
            // Redirect to index.php after successful insertion
            header("Location: login.php");
            exit; // Terminate script execution after the redirect
        } else {
            echo "Error: " . $insert_stmt->error;
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?><!DOCTYPE html>
<html>
<head>
    <title>Sign Up Form</title>
    <style>
        body {
            background-color: #757575;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 0 10px red;
            animation: fadeIn 2s ease-in-out;
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
            color: red;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            height: 30px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
        }

        button {
            background-color: red;
            color: #fff;
            border: none;
            margin:20px;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #sign {
            background-color: #333;
            border: none;
            color: #fff;
            text-decoration: none;
            margin: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #sign:hover {
            background-color: #555;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up Form</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Sign Up</button>
        </form>
        <a href="anime_merchandise" id="sign">Sign In</a>
    </div>
</body>
</html>
