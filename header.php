<!DOCTYPE html>
<html>
<head>
    <title>WEEB.to Website</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* Basic anime-style CSS */
        body {
            background-color: #333;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        header {
            text-align: center;
            background-color: #1a1a1a;
            padding: 20px;
            animation: fadeInUp 1s ease-in-out;
        }

        h1 {
            font-size: 36px;
            margin: 0;
            color: red;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: red; /* Change to your preferred hover color */
        }

        /* Define animations */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<header>
    <h1>anime merchandise</h1>
</header>
<nav>
    <ul>
        <li><a href="cart.php">Cart</a></li>
    </ul>
</nav>
</body>
</html>
