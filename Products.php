<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        .pro-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .pro {
            width: calc(25% - 20px);
            background-color: black;
            margin: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px red;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .pro img {
            max-width: 100%;
            height: auto;
            border: 10px red;
            box-shadow: 0 0 10px red;
            border-radius: 5px;
        }

        .pro h3 {
            font-size: 20px;
            margin: 10px 0;
            color: white;
        }

        .pro p {
            font-size: 18px;
            margin: 10px 0;
            color: red;
        }

        .pro a {
            display: inline-block;
            padding: 10px 20px;
            background-color: white;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .pro a:hover {
            background-color: red;
        }

        .pro:hover {
            transform: translateY(-5px);
            box-shadow: 0px 7px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div id="productContainer" class="pro-container">
    <!-- Products will be dynamically loaded here -->
</div>

<script>
    // Fetch products from the JSON file
    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            const productContainer = document.getElementById('productContainer');

            // Loop through the products and create product elements
            data.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.className = 'pro';

                const productImage = document.createElement('img');
                productImage.src = product.image;
                productImage.alt = product.name;

                const productName = document.createElement('h3');
                productName.textContent = product.name;

                const productPrice = document.createElement('p');
                productPrice.textContent = `$${product.price}`;

                const addToCartLink = document.createElement('a');
                const cartParams = new URLSearchParams({
                    action: 'add',
                    id: product.id,
                    name: encodeURIComponent(product.name),
                    price: product.price,
                    image: encodeURIComponent(product.image),
                });
                addToCartLink.href = `cart.php?${cartParams.toString()}`;
                addToCartLink.textContent = 'Add to Cart';

                // Append elements to the product div
                productDiv.appendChild(productImage);
                productDiv.appendChild(productName);
                productDiv.appendChild(productPrice);
                productDiv.appendChild(addToCartLink);

                // Append the product div to the container
                productContainer.appendChild(productDiv);
            });
        })
        .catch(error => console.error(error));
</script>
</body>
</html>
