<?php
session_start();
include '../layout/include/connection.php';
// check if session is set
if (isset($_SESSION['adminInfo'])){
    header(header: 'Location:dashboard.php');
    exit;
    }
    else{
?>
    



<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    
    <!-- Bootstrap 5 CSS (RTL version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .login-container h2 {
            font-size: 24px;
            color: #343a40;
            margin-bottom: 1.5rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.25);
        }

        .login-btn {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #0d6efd;
            border: none;
            transition: background-color0.3s;
        }

        .login-btn:hover {
            background-color: #0b5ed7;
        }

        .extra-links {
            margin-top: 1rem;
            font-size: 14px;
        }

        .extra-links a {
            color: #0d6efd;
            text-decoration: none;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
        

    </style>
</head>
<body>
    <div class="login-container">
    <!--log to dashboard-->
<?php
if (isset($_POST['log'])) {
    $adminInfo = $_POST['adminInfo'];
    $adminPass = $_POST['password'];


//check in inputs aren't empty
    if (empty($adminInfo)||empty($adminPass)) {

        echo"<div class ='alert alert-danger'>"."الرجاء التحقق من ملئ الخانات" ."</div>";
      }
      else {
            $query= "SELECT * FROM admin WHERE (adminName='$adminInfo'OR adminEmail='$adminInfo' )
            AND adminPass='$adminPass'  ";
            $result= mysqli_query(mysql: $con,query: $query);
            $row=mysqli_num_rows(result: $result);

            if($row>0){
                $_SESSION['adminInfo']=$adminInfo;
                header(header: 'Location:dashboard.php');
                exit;
            }
            else{
                echo"<div class ='alert alert-danger'>"."الرجاء التحقق من المعلومات"."</div>";
            }

      }
}




?>


        <h2>تسجيل الدخول للمشرفين</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="mb-3">
                <label for="mail" class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" id="mail" name="adminInfo" />
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" id="pass" name="password"/>
            </div>
            <button type="submit" class="btn login-btn w-100" name="log">تسجيل الدخول</button>
        </form>
        <div class="extra-links mt-3">
            <a href="#">هل نسيت كلمة المرور؟</a>
        </div>
    </div>

  

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    

    <?php
    }
    ?>


</body>
</html>



