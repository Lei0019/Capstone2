<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout Summary</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .checkout-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #2E7D32;
            margin-bottom: 25px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            padding: 12px 0;
            border-bottom: 1px solid #ddd;
            font-size: 1.1em;
            display: flex;
            justify-content: space-between;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        textarea,
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
        }

        button[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #388e3c;
        }

        .total {
            font-size: 1.3em;
            font-weight: bold;
            color: #2E7D32;
            text-align: right;
            margin-top: 20px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #2E7D32;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .checkout-container {
                padding: 20px;
            }

            li {
                flex-direction: column;
                align-items: flex-start;
            }

            li span {
                margin-top: 4px;
                color: #4CAF50;
            }
        }
    </style>
</head>
<body>

<div class="checkout-container">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['selected_items'])) {
    $email = $_SESSION['email'];
    $total = 0;
    $items = [];

    echo "<h2>Checkout Summary</h2><ul>";

    foreach ($_POST['selected_items'] as $id) {
        $id = intval($id);
        $qty = isset($_POST['quantities'][$id]) ? intval($_POST['quantities'][$id]) : 1;

        $query = "SELECT * FROM cart WHERE id=$id AND email='$email'";
        $res = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($res)) {
            $subtotal = $row['product_price'] * $qty;
            $total += $subtotal;

            echo "<li><span>{$row['product_name']} x {$qty}</span><span>₱" . number_format($subtotal, 2) . "</span></li>";

            $items[] = [
                'id' => $row['id'],
                'name' => $row['product_name'],
                'price' => $row['product_price'],
                'quantity' => $qty
            ];
        }
    }

    echo "</ul><div class='total'>Total: ₱" . number_format($total, 2) . "</div>";

    // Final order form
    echo '<form method="POST" action="place_order.php">';
    echo '<input type="hidden" name="order_data" value=\'' . json_encode($items) . '\'>';
    echo '<input type="hidden" name="total" value="' . $total . '">';
    echo '<label>Delivery Address:</label>';
    echo '<textarea name="address" required></textarea>';
    echo '<label>Phone Number:</label>';
    echo '<input type="text" name="phone" required>';
    echo '<button type="submit">Place Order</button>';
    echo '</form>';

    echo '<a class="back-link" href="cart.php">← Back to Cart</a>';
} else {
    echo "<p>No items selected. <a class='back-link' href='cart.php'>Back to cart</a></p>";
}
?>
</div>

</body>
</html>
