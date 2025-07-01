<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$safe_email = mysqli_real_escape_string($conn, $email);

if (isset($_POST['selected_items']) && !empty($_POST['selected_items'])) {
    $selected_items = $_POST['selected_items'];
    $quantities = $_POST['quantities'];
    $delivery_address = mysqli_real_escape_string($conn, $_POST['delivery_address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Loop through items and insert into orders table
    foreach ($selected_items as $id) {
        $id = intval($id); // sanitize
        $quantity = isset($quantities[$id]) ? intval($quantities[$id]) : 1;
        
        $query = "SELECT * FROM cart WHERE id = $id AND email = '$safe_email'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $price = $row['product_price'];
            $total_price = $price * $quantity;

            // Insert order into the database
            $insert_order = "INSERT INTO orders (email, product_name, quantity, total_price, delivery_address, phone, status)
                             VALUES ('$email', '$product_name', '$quantity', '$total_price', '$delivery_address', '$phone', 'Pending')";

            if (mysqli_query($conn, $insert_order)) {
                // Optionally, remove the items from the cart after successful order
                $delete_cart_item = "DELETE FROM cart WHERE id = $id AND email = '$email'";
                mysqli_query($conn, $delete_cart_item);
            }
        }
    }

    echo "<h2>Your order has been placed successfully!</h2>";
    echo "<p><a href='profile.php'>Go back to your profile</a></p>";
} else {
    echo "<p>No items in your order. Please <a href='cart.php'>go back to your cart</a>.</p>";
}
?>
