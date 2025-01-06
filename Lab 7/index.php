<?php
// index.php
echo "<h1>Welcome to Chapter & Verse Online Bookstore</h1>";
include 'fetch_books.php';

// Display cart content
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
    echo "<h2>Your Cart</h2>";
    echo "<ul>";
    foreach ($cart as $title => $quantity) {
        echo "<li>$title - Quantity: $quantity</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
