<?php include 'include/header.php'; ?>
<!-- <link rel="stylesheet" href="style.css"> -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
     .checkout-link {
            display: block;
            margin-top: 20px;
            font-size: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #ffcc00;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .checkout-link:hover {
            background-color: #ffa500; /* Change to your preferred hover color */
        }

</style>

<h2 align='center'>Checkout</h2>
<?php
if(isset($_POST['place_order'])) {
    // Handle order processing (e.g., send confirmation email)
    echo "Order placed successfully!";
} else {
    ?>
    <form method="post" align='center' style="padding-left:700px;">
        <!-- Add fields for shipping/billing info here -->
        <button type="submit" class="checkout-link" align='center' name="place_order" >Place Order</button>
    </form>
    <?php
}
?>

<?php include 'include/footer.php'; ?>
