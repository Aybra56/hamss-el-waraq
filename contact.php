<?php
// Start session and include database connection
session_start();
require_once('layout/include/connection.php');

// Handle form submission
$messageSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Securely retrieve the form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Insert the data into the database
    $query = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($con, $query)) {
        $messageSent = true;
    } else {
        $errorMessage = "حدث خطأ أثناء إرسال الرسالة: " . mysqli_error($con);
    }
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
    <meta name="description" content=" هتا يمكنك التواصل مع فريق همس الورق, اترك اي رسالة وسنتواصل معك">    

    
    <link rel="canonical" href="https://www.hamsselwaraq.com<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" />
    <link rel="stylesheet" href="style.css">
    <title>تواصل معنا</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>

        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="images/favicon-48x48.png">
    <link rel="icon" type="image/PNG" href="images\hamss4.png">
</head>

<body>
    <main>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <h1>
                  <img src="images\hamss6 (22).png" alt="logo"  width="260px" height="90px"
                            > 
            </h1>
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

        <!-- Contact Form Section -->
        <div class="container mt-5">
            <h1 class="text-center">تواصل معنا</h1>
            <hr>

            <!-- Display Success or Error Messages -->
            <?php if ($messageSent): ?>
                <div class="alert alert-success text-center" role="alert">
                    تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.
                </div>
            <?php elseif (isset($errorMessage)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <!-- Contact Form -->
            <form action="contact.php" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-12">
                    <label for="message" class="form-label">الرسالة</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="custom-btn" style="border-radius: 10px; width: 100px;">إرسال</button>
                </div>
            </form>
        </div>
    </main>

    <!--bootstrap js  cdn-->
   <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
