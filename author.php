


<?php
session_start();
require_once('layout/include/connection.php');
?>

<?php
$searchResult = null;
if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($con, $_GET['query']);
    $searchSql = "SELECT * FROM books WHERE bookTitle LIKE '%$searchQuery%' OR bookAuthor LIKE '%$searchQuery%' LIMIT 3";
    $searchResult = mysqli_query($con, $searchSql);
} 

$bookAuthor = null;
if (isset($_GET['author'])) {
    
    $bookAuthor = mysqli_real_escape_string($con, $_GET['author']);
}
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
<meta name="description" content="اكتشف جميع كتب <?php echo htmlspecialchars($bookAuthor); ?> في مكتبة همس الورق، حيث يمكنك تحميل وقراءة كتبه مجانًا بصيغة PDF.">
<meta name="keywords" content="كتب <?php echo htmlspecialchars($bookAuthor); ?>, مؤلف <?php echo htmlspecialchars($bookAuthor); ?>, تحميل كتب <?php echo htmlspecialchars($bookAuthor); ?>, كتب مجانية, كتب PDF, مكتبة همس الورق">
<meta name="author" content="<?php echo htmlspecialchars($bookAuthor); ?>">
<meta name="robots" content="index, follow">
<meta property="og:title" content="كتب <?php echo htmlspecialchars($bookAuthor); ?> - مكتبة همس الورق">
<meta property="og:description" content="قم بتحميل وقراءة جميع كتب <?php echo htmlspecialchars($bookAuthor); ?> مجانًا بصيغة PDF.">
<meta property="og:image" content="images/social-preview.png">
<meta property="og:type" content="profile">
<meta property="og:url" content="https://www.hamsselwaraq.com/author.php?author=<?php echo urlencode($bookAuthor); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="كتب <?php echo htmlspecialchars($bookAuthor); ?> - مكتبة همس الورق">
<meta name="twitter:description" content="قم بتحميل وقراءة جميع كتب <?php echo htmlspecialchars($bookAuthor); ?> مجانًا بصيغة PDF.">
<meta name="twitter:image" content="images/social-preview.png">
<link rel="canonical" href="https://www.hamsselwaraq.com/">


    <link rel="stylesheet" href="style.css">
    <title>جميع كتب <?php echo htmlspecialchars($bookAuthor)?>|همس الورق</title>

    <link rel="icon" type="image/png" href="images\hamss4.png">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
        <!-- Start Nav Bar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="images\hamss6 (22).png" alt="logo"  width="260px" height="90px"
                            >  
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">الاقسام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">تواصل معنا</a>
                        </li>
                         <li class="nav-item"><a class="nav-link" href="copyright.php">حقوق الملكية</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Nav Bar -->

        <!-- Start Banner -->
        <div class="banar">
            <div class="lib-info">
                <h1>همس الورق</h1>
                <div class="container">
                    <form class="input-group mb-3" method="GET" action="">
                        <input type="text" name="query" class="form-control" placeholder="ابحث عن كتاب أو مؤلف"
                            aria-label="Search" required>
                        <button class="btn btn-outline-light" type="submit">بحث</button>
                    </form>
                    <?php
                    if (isset($_GET['query'])) {
                        echo '<div class="search-results mt-3">';
                        if ($searchResult && mysqli_num_rows($searchResult) > 0) {
                            while ($book = mysqli_fetch_assoc($searchResult)) {
                              
                              echo '<p><a href="book.php?id=' . $book['id'] . '/' . urlencode(str_replace(' ', '-', $book['bookCat'])) . '/' . urlencode(str_replace(' ', '-', $book['bookTitle'])) . '">' . htmlspecialchars($book['bookTitle']) . '</a></p>';


                            }
                        } else {
                            echo '<p>لا توجد نتائج مطابقة.</p>';
                        }
                        echo '</div>';
                    } else {
                        echo '<p>هنا ... حيث للكتب صوت خافت يهمس لك</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <?php if ($bookAuthor): ?>
            <div class="books">
                <div class="container">
                    <div class="author-info text-black p-2 mb-3" style="font-size: 25px;">
                        <span>جميع كتب</span>
                        <span><?php echo htmlspecialchars($bookAuthor); ?></span>
                        <hr>
                    </div>
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM books WHERE bookAuthor = '$bookAuthor' ";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card text-center">
                                <a href="book.php?id=<?= $row['id'] ?>/<?= str_replace(' ', '-', $row['bookCat']) ?>/<?= str_replace(' ', '-', $row['bookTitle']) ?>">
                                    <div class="img-cover">
                                        <img src="uploads\bookCovers/<?php echo htmlspecialchars($row['bookCover']); ?>" alt="book cover" class="card-img-center">
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title h4">
                                            <a href="book.php?id=<?= $row['id'] ?>/<?= str_replace(' ', '-', $row['bookCat']) ?>/<?= str_replace(' ', '-', $row['bookTitle']) ?>">
                                                <?php echo htmlspecialchars($row['bookTitle']); ?>
                                            </a>
                                        </h2>
                                        <p class="card-text"> <?php echo htmlspecialchars($row['bookAuthor']); ?></p>
                                        <a href="book.php?id=<?= $row['id'] ?>/<?= str_replace(' ', '-', $row['bookCat']) ?>/<?= str_replace(' ', '-', $row['bookTitle']) ?>">
                                            <button class="custom-btn">تحميل الكتاب</button>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- Bootstrap JS CDN -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
