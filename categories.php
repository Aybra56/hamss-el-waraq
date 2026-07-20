<?php
session_start();
require_once('layout/include/connection.php');

// Fetch all categories and their book counts
$categoriesQuery = "
    SELECT c.categoryName AS bookCat, COUNT(b.id) AS bookCount
    FROM categories c
    LEFT JOIN books b ON c.categoryName = b.bookCat
    GROUP BY c.categoryName
";
$categoriesResult = mysqli_query($con, $categoriesQuery);
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
    <meta name="description" content="استكشف اقسام مكتبة همس الورق وتعرف على عدد الكتب المتوفرة في كل قسم.">
    <meta name="keywords" content="اقسام الكتب, مكتبة همس الورق, كتب مجانية, تحميل كتب, كتب عربية">
    <meta name="author" content="همس الورق">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="اقسام مكتبة همس الورق">
    <meta property="og:description" content="اكتشف الاقسام المختلفة في مكتبة همس الورق وعدد الكتب المتوفرة.">
    <meta property="og:image" content="images/social-preview.png">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.hamsselwaraq.com/categories.php">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="اقسام مكتبة همس الورق">
    <meta name="twitter:description" content="اكتشف الاقسام المختلفة في مكتبة همس الورق وعدد الكتب المتوفرة.">
    <meta name="twitter:image" content="images/social-preview.png">
    <link rel="canonical" href="https://www.hamsselwaraq.com<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" />
    
    <title>اقسام مكتبة همس الورق</title>
    
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
                        <li class="nav-item">
                            <a class="nav-link" href="/">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="categories.php">الاقسام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">تواصل معنا</a>
                        </li>
                         <li class="nav-item"><a class="nav-link" href="copyright.php">حقوق الملكية</a></li>
                    </ul>
                </div>
            </div>
        </nav>
         
         

        <!-- Categories Section -->
        <section class="categories py-5">
            <div class="container">
                <h2 class="text-center mb-5">اقسام الكتب</h2>
                <hr>
                <div class="row">
                    <?php
                    if (mysqli_num_rows($categoriesResult) > 0) {
                        while ($category = mysqli_fetch_assoc($categoriesResult)) {
                            $categoryName = htmlspecialchars($category['bookCat']);
                            $bookCount = $category['bookCount'];
                            ?>
                            <div class="col-md-4 col-lg-3 mb-4">
                                <div class="card text-center shadow">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $categoryName; ?></h4>
                                        <p class="card-text">عدد الكتب: <?php echo $bookCount; ?></p>
                                        <a href="category_books.php?category=<?php echo urlencode($categoryName); ?>" class="custom-btn">
                                            عرض الكتب
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-center">لا توجد اقسام حاليًا.</p>';
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
