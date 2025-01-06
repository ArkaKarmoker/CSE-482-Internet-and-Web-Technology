<?php
// add_to_cart.php
if (isset($_POST['title'])) {
    $bookTitle = $_POST['title'];
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Update cart
    if (array_key_exists($bookTitle, $cart)) {
        $cart[$bookTitle]++;
    } else {
        $cart[$bookTitle] = 1;
    }

    // Save cart to cookies
    setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");

    // Redirect back to index.php
    header("Location: index.php");
    exit();
} else {
    echo "No book selected.";
}
?>
