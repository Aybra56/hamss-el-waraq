<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php
require_once('layout/include/connection.php');

$booksPerPage = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $booksPerPage;

// Updated query to order by id in descending order
$query = "SELECT * FROM books ORDER BY id DESC LIMIT $booksPerPage OFFSET $offset";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Build a descriptive alt text for the card
        $cardAlt = 'كتاب ' . htmlspecialchars($row['bookTitle']) . ' للكاتب ' . htmlspecialchars($row['bookAuthor']);
        
        echo '<div class="col-lg-3 col-md-4 col-6"  aria-label="' . $cardAlt . '">';
        echo '<div class="card text-center ">'; // Added aria-label to the card
        echo '<a href="book.php?id=' . $row['id'] . '/' .str_replace(' ', '-', $row['bookCat']) .'/' . str_replace(' ', '-', $row['bookTitle']) . '">';
        echo '<div class="img-cover">';
        echo '<img src="uploads/bookCovers/' . htmlspecialchars($row['bookCover']) . '" alt="' . htmlspecialchars($row['bookTitle']) . '" title="صورة غلاف كتاب ' . htmlspecialchars($row['bookTitle']) . '" class="card-img-center">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h2 class="card-title h4">';
        echo '<a href="book.php?id=' . $row['id'] . '/' .str_replace(' ', '-', $row['bookCat']) .'/' . str_replace(' ', '-', $row['bookTitle']) . '">' . htmlspecialchars($row['bookTitle']) . '</a>';
        echo '</h2>';
        echo '<p class="card-text">' . htmlspecialchars($row['bookAuthor']) . '</p>';
        echo '<a href="book.php?id=' . $row['id'] . '/' .str_replace(' ', '-', $row['bookCat']) .'/' . str_replace(' ', '-', $row['bookTitle']) . '">';
        echo '<button class="custom-btn">تحميل الكتاب</button>';
        echo '</a>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
}
?>
