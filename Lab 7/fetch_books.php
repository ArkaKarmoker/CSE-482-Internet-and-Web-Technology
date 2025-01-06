<?php
// fetch_books.php
include 'db_connect.php';

// Fetch books from the database
$sql = "SELECT title, genre, authors, publisher, country, publish_date, price FROM book";
$result = $conn->query($sql);

// Display books
if ($result->num_rows > 0) {
    echo "<form method='post' action='add_to_cart.php'>";
    echo "<table border='1'><tr><th>Title</th><th>Genre</th><th>Authors</th><th>Publisher</th><th>Country</th><th>Publish Date</th><th>Price</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["genre"] . "</td><td>" . $row["authors"] . "</td><td>" . $row["publisher"] . "</td><td>" . $row["country"] . "</td><td>" . $row["publish_date"] . "</td><td>" . $row["price"] . "</td>";
        echo "<td><button type='submit' name='title' value='" . $row["title"] . "'>Add to Cart</button></td></tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "No books available.";
}

$conn->close();
?>
