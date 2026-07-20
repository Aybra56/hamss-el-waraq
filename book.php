<?php
session_start();
require_once('layout/include/connection.php');

// Fetch book details based on the ID passed in the URL
$bookId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM books WHERE id = $bookId";
$result = mysqli_query($con, $query);

// Check if the book exists
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $bookTitle = htmlspecialchars($row['bookTitle']);
    $bookAuthor = htmlspecialchars($row['bookAuthor']);
    $bookContent = htmlspecialchars($row['bookContent']);
    $bookCat = htmlspecialchars($row['bookCat']);
} else {
    // Default values if no book is found
    header("Location: /"); // Redirect to home or another page
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CCTFX0TPTT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-CCTFX0TPTT');
    </script>


 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="تحميل كتاب <?php echo htmlspecialchars($bookTitle); ?> تأليف <?php echo htmlspecialchars($bookAuthor); ?> بصيغة PDF مجانًا. استمتع بقراءة هذا الكتاب والمزيد في مكتبة همس الورق.">
<meta name="keywords" content="تحميل <?php echo htmlspecialchars($bookTitle); ?>, كتاب <?php echo htmlspecialchars($bookTitle); ?>, <?php echo htmlspecialchars($bookAuthor); ?>, كتب PDF, كتب مجانية, مكتبة همس الورق">
<meta name="author" content="<?php echo htmlspecialchars($bookAuthor); ?>">
<meta name="robots" content="index, follow">
<meta property="og:title" content="تحميل كتاب <?php echo htmlspecialchars($bookTitle); ?> - مكتبة همس الورق">
<meta property="og:description" content="قم بتنزيل وقراءة كتاب <?php echo htmlspecialchars($bookTitle); ?> تأليف <?php echo htmlspecialchars($bookAuthor); ?> مجانًا.">
<meta property="og:image" content="uploads/bookCovers/<?php echo htmlspecialchars($row['bookCover']); ?>">
<meta property="og:type" content="book">
<meta property="og:url" content="https://www.hamsselwaraq.com/book.php?id=<?php echo $bookId; ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="تحميل كتاب <?php echo htmlspecialchars($bookTitle); ?>">
<meta name="twitter:description" content="قم بتنزيل وقراءة كتاب <?php echo htmlspecialchars($bookTitle); ?> تأليف <?php echo htmlspecialchars($bookAuthor); ?> مجانًا.">
<meta name="twitter:image" content="uploads/bookCovers/<?php echo htmlspecialchars($row['bookCover']); ?>">
 <link rel="canonical" href="https://www.hamsselwaraq.com">

<title>تحميل كتاب <?php echo htmlspecialchars($bookTitle); ?> PDF - تأليف <?php echo htmlspecialchars($bookAuthor); ?></title>


    
   <link rel="icon" type="image/PNG" href="images\hamss4.png">
    <link rel="stylesheet" href="book.css">
    
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>


        <style>
    /* Modal background */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            /* Start hidden */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            position: relative;
            width: 90%;
            height: 90vh;
            background-color: white;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }



        .close-btn:hover {
            color: #333;
        }

        /* PDF Viewer Restrictions */
        #book-frame {
            /* Remove pointer-events restriction */
            user-select: none;
            -webkit-user-select: none;
            /* Add scrolling */
            overflow: auto;
        }
        
        
    
    /*countdown start */
    .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    justify-content: center;
    align-items: center;
    }

   .countdown-box {
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #countdownText {
    font-size: 1.2rem;
    color: #333;
    }
    /*countdown end*/
    
 </style>






    
</head>

<body>
    <main>
        <!--start nav bar-->
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link" href="categories.php">الاقسام</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">تواصل معنا</a></li>
                        <li class="nav-item"><a class="nav-link" href="copyright.php">حقوق الملكية</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end nav bar-->

        <!--start show book-->
        <div class="books">
            <div class="container">
                <div class="book">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM books WHERE id='$bookId'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);
                        
                        ?>
                        <div class="col">
                            <div class="book-cover">
                                <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>"
                                    alt="<?php echo htmlspecialchars($row['bookTitle']); ?>"
                                    title="صورة غلاف كتاب <?php echo htmlspecialchars($row['bookTitle']); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="book-content text-center">
                                <h1> <?php echo $row['bookTitle']; ?></h1>

                                <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    href="author.php?author=<?php echo urlencode($row['bookAuthor']);?>">
                                    <h2><?php echo $row['bookAuthor']; ?></h2>
                                </a>
                                <hr>
                                <p>
                                    <?php echo $row['bookContent']; ?>
                                </p>

                                <div class="book-actions">
                                    <button class="custom-btn hide-on-small"
                                        onclick="openBook('<?php echo $row['book']; ?>')">قراءة</button>


                                        <a href="uploads/books/<?php echo $row['book']; ?>" class="download-link"
                                        rel="nofollow" data-book="<?php echo $row['book']; ?>">

                                        <button class="custom-btn">تحميل</button>
                                    </a>

                                </div>

                                <!-- Modal for Book Viewer -->
                                 <div id="book-modal" class="modal">
                                    <div class="modal-content">
                                        <button class="custom-btn" onclick="closeBook()">إغلاق</button>
                                        <iframe id="book-frame" style="width:100%; height:100%; border:none;"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end show book-->

        <!--start related books-->
        <div class="related-books">
            <div class="container">
               <h2>كتب ذات صلة</h2>
                <hr>
                <div class="row">
                    <?php
                    // Fetch related books
                   $relatedQuery = "SELECT * FROM books WHERE bookCat = '$bookCat' AND id != '$bookId' ORDER BY RAND() LIMIT 8";
                    $relatedResult = mysqli_query($con, $relatedQuery);
                    while ($relatedRow = mysqli_fetch_assoc($relatedResult)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="related-book text-center">
                                <div class="cover">
                                    <a
                                        href="book.php?id=<?= $relatedRow['id'] ?>/<?= str_replace(' ', '-', $relatedRow['bookCat']) ?>/<?= str_replace(' ', '-', $relatedRow['bookTitle']) ?>">
                                        <img src="uploads/bookCovers/<?php echo $relatedRow['bookCover']; ?>"
                                            alt="book cover">
                                    </a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a
                                            href="book.php?id=<?= $relatedRow['id'] ?>/<?= str_replace(' ', '-', $relatedRow['bookCat']) ?>/<?= str_replace(' ', '-', $relatedRow['bookTitle']) ?>">
                                            <?php echo $relatedRow['bookTitle']; ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--end related books-->




      <!--start read book-->
        <script>
            function openBook(bookFile) {
                const modal = document.getElementById('book-modal');
                const iframe = document.getElementById('book-frame');

                // Load PDF with hidden controls
                iframe.src = `uploads/books/${bookFile}#toolbar=0&navpanes=0&scrollbar=0&view=FitH`;

                // Adjust iframe height to account for padding


                modal.style.display = 'flex';

                // Add context menu prevention
                modal.addEventListener('contextmenu', preventAction);
            }

            function closeBook() {
                const modal = document.getElementById('book-modal');
                modal.style.display = 'none';
                document.getElementById('book-frame').src = '';
                modal.removeEventListener('contextmenu', preventAction);
            }

            function preventAction(e) {
                e.preventDefault();
                return false;
            }

            // Keep your existing keyboard shortcut prevention
            document.addEventListener('keydown', function (e) {
                if (document.getElementById('book-modal').style.display === 'flex') {
                    if (e.ctrlKey || e.metaKey) {
                        e.preventDefault();
                        return false;
                    }
                }
            });
        </script>
      <!--end read book-->


       <!-- 10 second -->
        <script>
            document.querySelectorAll('.download-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const book = this.getAttribute('data-book');
                    showCountdown(book);
                });
            });

            function showCountdown(book) {
                const overlay = document.getElementById('countdownOverlay');
                let seconds = 10 ;

                overlay.style.display = 'flex';
                document.getElementById('countdownNumber').textContent = seconds;

                const countdownInterval = setInterval(() => {
                    seconds--;
                    document.getElementById('countdownNumber').textContent = seconds;

                    if (seconds <= 0) {
                        clearInterval(countdownInterval);
                        overlay.style.display = 'none';
                        triggerDownload(book);
                    }
                }, 1000);
            }

            function triggerDownload(book) {
                const link = document.createElement('a');
                link.href = 'uploads/books/' + book;
                link.download = '';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        </script>




        <!--bootstrap js cdn-->
        <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
    </main>


    <div id="countdownOverlay" class="overlay">
        <div class="countdown-box">
            <div id="countdownText">سيبدأ التحميل خلال <span id="countdownNumber">10</span> ثانية</div>
        </div>
    </div>
    
    
    
    </body>

</html>