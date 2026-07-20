<?php
session_start();
require_once('layout/include/connection.php');

// Cache control headers
header("Cache-Control: max-age=3600, must-revalidate");
header("Pragma: cache");

// Handle search query
if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($con, $_GET['query']);
    $searchSql = "SELECT * FROM books WHERE bookTitle LIKE '%$searchQuery%' OR bookAuthor LIKE '%$searchQuery%' LIMIT 3";
    $searchResult = mysqli_query($con, $searchSql);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="اكتشف مكتبة همس الورق، حيث يمكنك تحميل وقراءة آلاف الكتب المجانية بصيغة PDF في مختلف المجالات.">
  <meta name="keywords" content="مكتبة همس الورق, تحميل كتب, كتب مجانية, كتب PDF, كتب عربية, قراءة كتب, روايات, مؤلفين">
  <meta name="author" content="همس الورق">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="همس الورق - مكتبة لتحميل وقراءة الكتب مجانًا">
  <meta property="og:description" content="مكتبة إلكترونية توفر كتب مجانية للتحميل والقراءة في مختلف التصنيفات.">
  <meta property="og:image" content="https://www.hamsselwaraq.com/images/android-chrome-512x512.png">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.hamsselwaraq.com">
  <meta property="og:site_name" content="همس الورق">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="همس الورق - مكتبة لتحميل وقراءة الكتب مجانًا">
  <meta name="twitter:description" content="مكتبة إلكترونية توفر كتب مجانية للتحميل والقراءة في مختلف التصنيفات.">
  <meta name="twitter:image" content="images/social-preview.png">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.hamsselwaraq.com">

  <!-- Structured Data (Schema.org) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "name": "همس الورق",
      "url": "https://www.hamsselwaraq.com",
      "logo": "https://www.hamsselwaraq.com/images/android-chrome-512x512.png"
    },
    {
      "@type": "WebSite",
      "name": "همس الورق",
      "url": "https://www.hamsselwaraq.com",
      "description": "مكتبة إلكترونية توفر كتب مجانية للتحميل والقراءة في مختلف التصنيفات."
    }
  ]
}
</script>

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CCTFX0TPTT"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-CCTFX0TPTT');
  </script>

  <!-- Google Site Verification -->
  <meta name="google-site-verification" content="398coK9530n2DRlMtuhmhyUo8sIOsH_DjW5UgK6oB3Y" />

  <!-- Title -->
  <title>همس الورق - مكتبة لتحميل وقراءة الكتب مجانًا</title>


 <!-- Standard Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">

<!-- Apple Touch Icon (for iOS) -->
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">

<!-- Favicon for Browsers -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="icon" type="image/x-icon" href="https://www.hamsselwaraq.com/images/favicon.ico">

<!-- Android Chrome Theme -->
<link rel="manifest" href="images/site.webmanifest">
<meta name="theme-color" content="#ffffff">
  

 
  <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css?v=1.0.1">
  <script src="main.js?v=1.0.1"></script>
</head>






<body>
<main>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            
                <a class="navbar-brand" href="/">
                    <img src="images\hamss6 (22).png" alt="logo"  width="260px" height="90px"
                            > 
                </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="categories.php">الاقسام</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">تواصل معنا</a></li>
                    <li class="nav-item"><a class="nav-link" href="copyright.php">حقوق الملكية</a></li>
                    
                   <!-- Dashboard Button -->
                   <?php if (isset($_SESSION['adminInfo']) && !empty($_SESSION['adminInfo'])): ?>
                   <li class="nav-item">
                   <a href="dashboard/dashboard.php" target="_blank" class="dashboard-btn nav-link">Dashboard</a>
                   </li>
                   <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banar">
        <div class="lib-info">
            <h1>همس الورق</h1>
            <div class="container">
                <form class="input-group mb-3" method="GET" action="">
                    <input type="text" name="query" class="form-control" placeholder="ابحث عن كتاب أو مؤلف" aria-label="Search" required>
                    <button class="btn btn-outline-light" type="submit">بحث</button>
                </form>
                <?php
                if (isset($_GET['query'])) {
                    echo '<div class="search-results mt-3">';
                    if (mysqli_num_rows($searchResult) > 0) {
                        while ($book = mysqli_fetch_assoc($searchResult)) {
                            echo '<p><a href="book.php?id=' . $book['id'] . '/' . urlencode(str_replace(' ', '-', $book['bookCat'])) . '/' . urlencode(str_replace(' ', '-', $book['bookTitle'])) . '">' . htmlspecialchars($book['bookTitle']) . '</a></p>';

                        }
                    } else {
                        echo '<p>لا توجد نتائج مطابقة.</p>';
                        echo '<p>احرص على تجربة (أ) و (ا) إن كانت كلماتك تحوي همزة</p>';
                        
                    }
                    echo '</div>';
                } else {
                    echo "<p>همس الورق ... حيث للكتب صوت خافت يهمس لك</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Books Section -->
    <div class="books">
        <div class="container">
            <div class="row" id="book-list">
                <!-- Books will be loaded dynamically here -->
            </div>
            <div id="loading-indicator" class="text-center my-4" style="display: none;">
                <p>جاري تحميل المزيد من الكتب...</p>
            </div>
            <div id="no-more-books" class="text-center my-4" style="display: none;">
            <p>هذه كل الكتب المتاحة حاليا . سنقوم بتوفير المزيد من الكتب قريبا</p>
            </div>

        </div>
    </div>
</main>

<script>
    let currentPage = 1;
let isLoading = false;
let hasMoreBooks = true; // Track if more books are available

const loadMoreBooks = () => {
    if (isLoading || !hasMoreBooks) return; // Stop requests if no more books
    isLoading = true;

    const loadingIndicator = document.getElementById("loading-indicator");
    const noMoreBooksMsg = document.getElementById("no-more-books");
    loadingIndicator.style.display = "block";

    fetch(`load_books.php?page=${currentPage}`)
        .then(response => response.text())
        .then(data => {
            if (data.trim() !== "") {
                document.getElementById("book-list").innerHTML += data;
                currentPage++;
            } else {
                hasMoreBooks = false; // No more books
                noMoreBooksMsg.style.display = "block"; // Show message
            }
            loadingIndicator.style.display = "none";
            isLoading = false;
        })
        .catch(error => {
            console.error("Error loading books:", error);
            loadingIndicator.style.display = "none";
            isLoading = false;
        });
};

// Detect when user scrolls to the bottom
window.addEventListener("scroll", () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
        loadMoreBooks();
    }
});

// Load the first set of books
loadMoreBooks();

</script>


</body>
</html>