<?php
include 'connection.php'; // Include the connection script

if (isset($_POST['suggestion'])) {
    $suggestion = ucfirst($_POST['suggestion']);
    
    $query = "SELECT * FROM Book WHERE author LIKE '%$suggestion%' OR title LIKE '%$suggestion%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>Title:</strong> " . $row['title'] . " | <strong>Author:</strong> " . $row['author'] . " | <strong>Publication Year:</strong> " . $row['publication_year'] . " | <strong>Genre:</strong> " . $row['genre'] . "</p><br />";
        }
    } else {
        echo "<p>No results found for '$suggestion'</p>";
    }
}
?>

