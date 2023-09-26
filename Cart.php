<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $productID = $_GET['id'];

    if (array_key_exists($productID, $_SESSION['cart'])) {
        $_SESSION['cart'][$productID]++;
    } else {
        $_SESSION['cart'][$productID] = 1;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $productID = $_GET['id'];

    if (array_key_exists($productID, $_SESSION['cart'])) {
        if ($_SESSION['cart'][$productID] > 1) {
            $_SESSION['cart'][$productID]--;
        } else {
            unset($_SESSION['cart'][$productID]);
        }
    }
}

$products = json_decode(file_get_contents('products.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        .cart-container {
            margin: 20px;
            background-color: #292929;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .remove-link {
            color: #ff5555;
            text-decoration: underline;
            cursor: pointer;
        }

        .remove-link:hover {
            text-decoration: none;
        }

        .total-price {
            font-weight: bold;
            margin-top: 10px;
        }

        .checkout-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .checkout-button:hover {
            background-color: #555;
            color : white;

        }

        img {
            max-width: 80px;
            height: auto;
            vertical-align: middle;
        }

        .product-name {
            display: flex;
            align-items: center;
        }

        .product-name img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>

    <div class="cart-container">
        <?php if (empty($_SESSION['cart'])) : ?>
            <p>Your cart is empty.</p>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $productID => $quantity) :
                        $product = $products[$productID];
                        $productName = $product['name'];
                        $productPrice = $product['price'];
                        $productImage = $product['image'];
                    ?>

                    <tr>
                        <td class="product-name">
                            <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                            <?php echo $productName; ?>
                        </td>
                        <td><?php echo $quantity; ?></td>
                        <td>$<?php echo $productPrice; ?></td>
                        <td>$<?php echo ($productPrice * $quantity); ?></td>
                        <td>
                            <a class="remove-link" href="cart.php?action=remove&id=<?php echo $productID; ?>">Remove</a>
                        </td>
                    </tr>

                    <?php
                        $totalPrice += $productPrice * $quantity;
                    endforeach;
                    ?>
                </tbody>
            </table>

            <p class="total-price">Total Price: $<?php echo $totalPrice; ?></p>
            <a class="checkout-button" href="checkout.php">Proceed to Checkout</a>
        <?php endif; ?>
    </div>
</body>
</html>
