<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfluenceX</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        function searchProducts() {
            var input = document.getElementById("searchBar").value.toLowerCase();
            var productItems = document.getElementsByClassName("product-item");

            for (var i = 0; i < productItems.length; i++) {
                var productName = productItems[i].getElementsByTagName("h3")[0].innerText.toLowerCase();
                if (productName.includes(input)) {
                    productItems[i].style.display = "";
                } else {
                    productItems[i].style.display = "none";
                }
            }
        }
    </script>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color:  #4CAF50;
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .search-container {
            flex-grow: 1;
            margin: 0 20px;
        }

        #searchBar {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 25px;
            outline: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #searchBar:focus {
            border: 2px solid #45a049;
        }

        .cart-link, .profile-link {
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }

        .cart-link:hover, .profile-link:hover {
            background-color:  #4CAF50;
            border-radius: 50%;
        }

        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 8px;
        }

        /* Hero Section */
        .hero-section {
            background-image: url(./img/ifx_bg.jpg);
            background-size: cover;
            background-position: center;
            padding: 100px 30px;
            text-align: center;
            color: white;
        }

        .hero-section h2 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        /* Product Section */
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 30px;
        }

        .product-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .product-item img {
            width: 100%;
            border-radius: 8px;
            height: 200px;
            object-fit: cover;
        }

        .product-item h3 {
            margin: 15px 0;
            font-size: 1.5rem;
            color: #333;
        }

        .product-item p {
            font-size: 1.2rem;
            color: #45a049;
        }

        .buy-now {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .buy-now:hover {
            background-color: #45a049;
        }

        /* Footer */
        footer {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>The Digital Purchase Path</h1>
        </div>
        <div class="search-container">
            <input type="text" id="searchBar" placeholder="Search for products..." onkeyup="searchProducts()" />
        </div>

        <a href="cart.php" class="cart-link"><i class="fas fa-shopping-cart"></i></a>

        <div class="profile-container">
            <a href="profile.php" class="profile-link">
                <img src="img/icon.png" alt="User Profile" class="profile-image">
                <span class="profile-text">Profile</span>
            </a>
        </div>
    </header>

    <section class="hero-section">
        <h2>Find the Best Deals!</h2>
        <p>Explore a variety of products from your favorite brands.</p>
    </section>

    <section class="product-container">
        <?php
        include 'conn.php';
        $sql = "SELECT * FROM shop";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-item">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p>₱' . $row["price"] . '</p>';
                echo '<a href="product-detail.php?product_id=' . $row["product_id"] . '" class="buy-now">View Details</a>';
                echo '</div>';
            }
        } else {
            echo "<p>No products found</p>";
        }

        mysqli_close($conn);
        ?>
    </section>

</body>
</html>
