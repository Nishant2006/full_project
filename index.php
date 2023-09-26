<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weeb Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic anime-style CSS */
        body {
    font-family: "Arial", sans-serif;
    backdrop-filter: blur(100px); /* Apply a blur effect to the background */
    background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background color */
    color: white; /* Set text color to white */
    text-align: center;
    margin: 0;
        }


        h1 {
            font-size: 36px;
            margin-top: 50px;
            animation: fadeInUp 1s ease-in-out;
        }

        /* Define the products container (you can customize this as needed) */
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        /* Style for individual product items (customize as needed) */
        .product {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: scale(1.05);
        }

        /* Define animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <?php include 'include/header.php'; ?>

        <div class="products">
        <?php include 'products.php'; ?>
    </div>

    <?php include 'include/footer.php'; ?>
</body>
</html>
