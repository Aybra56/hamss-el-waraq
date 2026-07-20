<?php
// Set the header for XML output
header("Content-Type: application/xml; charset=utf-8");

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

// Include database connection
require_once('layout/include/connection.php');

// === Static Pages ===
$staticPages = [
    'index.php',
    'categories.php',
    'contact.php',
    'copyright.php'
];

foreach ($staticPages as $page) {
    echo '
    <url>
        <loc>https://www.hamsselwaraq.com/' . $page . '</loc>
        <lastmod>' . date('Y-m-d') . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>';
}

// === Dynamic Book Pages ===
$bookQuery = "SELECT id, bookTitle, bookCat FROM books";
$bookResult = $con->query($bookQuery);

if ($bookResult->num_rows > 0) {
    while ($book = $bookResult->fetch_assoc()) {
        $bookId = $book['id'];
        $bookTitle = urlencode(str_replace(' ', '-', $book['bookTitle']));
        $bookCat = urlencode(str_replace(' ', '-', $book['bookCat']));
        $bookUrl = "https://www.hamsselwaraq.com/book.php?id=$bookId/$bookCat/$bookTitle";
        
        echo '
        <url>
            <loc>' . htmlspecialchars($bookUrl) . '</loc>
            <lastmod>' . date('Y-m-d') . '</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>';
    }
}

// === Dynamic Author Pages ===



// Fetch all unique authors from the database

  
    $authorQuery = "SELECT DISTINCT bookAuthor FROM books WHERE bookAuthor IS NOT NULL ";
    $authorResult = mysqli_query($con, $authorQuery);

    while ($authorRow = mysqli_fetch_assoc($authorResult)) {
        $authorName = urlencode($authorRow['bookAuthor']);
         $AuthorUrl = "https://www.hamsselwaraq.com/author.php?author=$authorName";
        echo'
        <url>
            <loc>' .htmlspecialchars($AuthorUrl). '</loc>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>';
    }


// === Dynamic Category Pages (Keeping URLs As They Are) ===
$categoryQuery = "SELECT categoryName FROM categories WHERE categoryName IS NOT NULL";
$categoryResult = $con->query($categoryQuery);

if ($categoryResult->num_rows > 0) {
    while ($category = $categoryResult->fetch_assoc()) {
        $categoryName = urlencode($category['categoryName']);
        $categoryUrl = "https://www.hamsselwaraq.com/category_books.php?category=$categoryName";
        
        echo '
        <url>
            <loc>' . htmlspecialchars($categoryUrl) . '</loc>
            <lastmod>' . date('Y-m-d') . '</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>';
    }
}



// Close database connection
$con->close();

// Close XML
echo '</urlset>';
?>
