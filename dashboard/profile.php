<?php
session_start();

include '../layout/include/connection.php';





if (!isset($_SESSION['adminInfo'])) {
    header(header: 'Location: index.php');
    exit;

} else {
    include '../layout/include/header.php';

    ?>

    <!--sidebar-wrapper-->
    <!--page contet-->



    <div class="container-fluid">
        <?php
        $query = "SELECT*FROM admin";
        $result = mysqli_query(mysql: $con, query: $query);
        $row = mysqli_fetch_assoc(result: $result);
        ?>
        <?php
        if (isset($_POST['edit'])) {
            $adminName = $_POST['adminName'];
            $adminEmail = $_POST['adminEmail'];
            $adminPass = $_POST['adminPass'];

            $query = "UPDATE admin SET
     adminName='$adminName',
     adminEmail='$adminEmail',
     adminPass='$adminPass'
     WHERE id ='1'  ";
            $res = mysqli_query(mysql: $con, query: $query);

            if ($res) {
                echo "<div class='alert alert-success'>تم التحديث بنجاح</div>";
                echo "<script>window.location.href = 'profile.php';</script>";
                exit;
              
        
                  
            } else {
                echo "<div class='alert alert-danger'>لم يتم التحديث</div>";
            }


        }
        ?>



        <div class="profile">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="name">اسم المستخدم</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row['adminName'] ?>"
                        name="adminName">
                </div>

                <div class="form-group">
                    <label for="name"> البريد الالكتروني</label>
                    <input type="text" class="form-control" id="email" value="<?php echo $row['adminEmail'] ?>"
                        name="adminEmail">
                </div>

                <div class="form-group">
                    <label for="name">كلمة السر </label>
                    <input type="text" class="form-control" id="pass" value="<?php echo $row['adminPass'] ?>"
                        name="adminPass">
                </div>
                <button class="custom-btn" name="edit">تحديث البيانات</button>
            </form>

        </div>

    </div>





    <!--end page content wrapper-->







    <?php
}
?>