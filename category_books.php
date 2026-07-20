<?php
session_start();
require_once('layout/include/connection.php');

// Get the selected category from the URL
if (!isset($_GET['category']) || empty($_GET['category'])) {
    header("Location: categories.php"); // Redirect to home or another page
    exit();
} else {
    $categoryName = isset($_GET['category']) ? mysqli_real_escape_string($con, $_GET['category']) : '';
}

// Fetch books based on the selected category
$booksQuery = "SELECT * FROM books WHERE bookCat = '$categoryName' ORDER BY id DESC";
$booksResult = mysqli_query($con, $booksQuery);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CCTFX0TPTT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CCTFX0TPTT');
</script>
    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="عرض كتب في قسم <?php echo htmlspecialchars($categoryName); ?> في مكتبة همس الورق.">
        
    <link rel="canonical" href="https://hamsselwaraq.com<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" />
    <title>كتب قسم <?php echo htmlspecialchars($categoryName); ?> - همس الورق</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="images/favicon-48x48.png">
    <link rel="icon" type="image/PNG" href="images\hamss4.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h1>
                    <a class="navbar-brand" href="/">
                           <img src="images\hamss6 (22).png" alt="logo"  width="260px" height="90px"
                            >  
                    </a>
                </h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link active" href="categories.php">الاقسام</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">تواصل معنا</a></li>
                         <li class="nav-item"><a class="nav-link" href="copyright.php">حقوق الملكية</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Category Books Section -->
        <section class="category-books py-5">
            <div class="container">
                <h2 class="text-center mb-5"> <?php echo htmlspecialchars($categoryName); ?></h2>
                <hr>

                <div class="row">
                    <?php
                    if (mysqli_num_rows($booksResult) > 0) {
                        while ($book = mysqli_fetch_assoc($booksResult)) {
                            ?>
                            <div class="col-md-4 col-lg-3 mb-4">
                                <div class="card text-center shadow">
                                    <div class="img-cover">
                                        <img src="uploads/bookCovers/<?php echo htmlspecialchars($book['bookCover']); ?>"
                                            alt="book cover" class="card-img-center">
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title h4">
                                             <a href="book.php?id=<?= $book['id'] ?>/<?= urlencode(str_replace(' ', '-', $book['bookCat'])) ?>/<?= urlencode(str_replace(' ', '-', $book['bookTitle'])) ?>">
                                             <?= htmlspecialchars($book['bookTitle']) ?>
                                                 </a>
                                        </h2>

                                        <p class="card-text"><?php echo htmlspecialchars($book['bookAuthor']); ?></p>
                                        <a href="book.php?id=<?= $book['id'] ?>/<?= urlencode(str_replace(' ', '-', $book['bookCat'])) ?>/<?= urlencode(str_replace(' ', '-', $book['bookTitle'])) ?>"
                                            class="custom-btn">
                                            تحميل الكتاب
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-center">لا توجد كتب في هذا القسم.</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>