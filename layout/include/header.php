
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>


    <link rel="icon" type="image/png" href="..\images\همس (11).svg">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyQ1Z4bK6lC40qxfpNfEXtWvcjlGe1J5y8J02vbb" crossorigin="anonymous">

   

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">






   

    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">







    <link rel="stylesheet" href="../dashboard/custom.css">



</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar-wrapper" class="col-md-3 col-lg-2 bg-light">
            <!--<div  id="sidebar-wrapper" class="bg-light border-right">-->
            <div class="sidebar-heading">لوحة التحكم</div>

            <div class="list-group list-group-flush" id="sidebarmenu">


                <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">نظرة عامة</a>
                <a href="profile.php" class="list-group-item list-group-item-action bg-light">البروفايل</a>
                <a href="categories.php" class="list-group-item list-group-item-action bg-light">التصنيفات</a>

                <!-- Collapsible Section -->
                <a class="list-group-item list-group-item-action bg-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#booksmenu" aria-expanded="false" aria-controls="booksmenu">
                    الكتب
                </a>
                <!-- Collapsible Submenu -->


                <ul class="collapse " id="booksmenu">


                    <a href="new-book.php" class="list-group-item list-group-item-action bg-ligh">إضافة كتاب</a>


                    <a href="books.php" class="list-group-item list-group-item-action bg-ligh">كل الكتب</a>



                </ul>

            </div>
        </nav>
        <!--</div>-->
        <!-- Page Content -->

        <div id="page-content-wrapper" class="flex-grow-1 ">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php" target="_blank">عرض الموقع
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">

                                <?php
                                $query = "SELECT adminName FROM admin";
                                $result = mysqli_query(mysql: $con, query: $query);
                                $row = mysqli_fetch_assoc(result: $result);
                                echo $row['adminName'];
                                ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>


            </nav>

            













    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
            echo getcwd();

    </script>











    <!-- Optional JavaScript to toggle the sidebar -->


</body>

</html>