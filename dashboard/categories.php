<?php
session_start();
include '../layout/include/connection.php';


if (!isset($_SESSION['adminInfo'])) {
  header(header: 'Location:index.php');
  exit;
} else {
  include '../layout/include/header.php';
  ?>
  <!--sidebar wrapper-->

  <!--page content-->
  <div class="container-fluid">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $category = $_POST['category'];
      if (empty($category)) {
        $catError = "<div class ='alert alert-danger'>" . "يرجى ادخال التصنيف" . "</div>";
      } else {
        $query = "INSERT INTO categories(categoryName) VALUES('$category')";
        $result = mysqli_query(mysql: $con, query: $query);
        if (isset($result)) {
          $catSuccess = "<div class ='alert alert-success'>" . "تمت الاضافة بنجاح" . "</div>";
        }
      }
    }
    ?>










    <!--start categories section-->
    <div class="categories">
      <div class="add-cat">
        <?php if (isset($catError)) {
          echo $catError;
        }
        if (isset($catSuccess)) {
          echo $catSuccess;
        }

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];
        ?>" method="POST">
          <div class="form-group">

            <label for="cat">اضافة تصنيف</label>
            <input type="text" class="form-control" id="cat" name="category">
          </div>
          <button class="custom-btn">اضافة</button>
        </form>
      </div>

      <div class="show-cat">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">الرقم</th>
              <th scope="col">عنوان التصنيف</th>
              <th scope="col">تاريخ الاضافة</th>
              <th scope="col">الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <!--fetch categories from database-->
            <?php
            if(isset($_GET['page'])){
              $page= $_GET['page'];
            }
            else{
              $page= 1;
            }
            $limit = 4;
            $start = ($page-1)*$limit;
            $query = "SELECT * FROM categories ORDER BY id DESC LIMIT $start, $limit";
            $res = mysqli_query($con, $query);
            $sNO = 0;
            while ($row = mysqli_fetch_assoc($res)) {
              $sNO++;
              
              

              ?>

              <tr>
              <td><?php echo $sNO;?></td>
              <td><?php echo $row['categoryName'];?></td>
              <td><?php echo $row['categoryDate'];?></td>
              <td>
                <a href="edit-cat.php?id=<?php echo $row['id']; ?>" class="custom-btn">تعديل</a>
                <a href="categories.php?id=<?php echo $row['id']; ?>" class=" confirm custom-btn  ">حذف</a>
              </td>
              </tr>

              <?php
            }
            ?>

          </tbody>
        </table>
        <!--start pagination-->
        <?php
        $query= "SELECT * FROM categories";
        $resuslt= mysqli_query($con, $query);
        $total_cat= mysqli_num_rows($resuslt);
        $total_pages= ceil($total_cat/$limit);
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="categories.php?page=<?php if(($page-1)> 0){echo $page-1;}else{echo $page=1;}?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <?php
            for ($i= 1; $i<=$total_pages; $i++){
            
              echo "<li class='page-item'><a class='page-link' href='categories.php?page=$i'>$i</a></li>";
            
            }
            
            ?>
      
            
            <li class="page-item">
              <a class="page-link" href="categories.php?page=<?php if(($page+1)> $total_pages){echo $page;}else{echo $page+1;}?>"aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>

        <!--end pagination-->

      </div>


    </div>

    <!-- start delete category-->
    <?php
    if (isset($_GET['id'])) {


      $id = $_GET['id'];
      $query = "DELETE FROM categories where id='$id' ";
      $delete = mysqli_query($con, $query);
      if ($delete) {
        echo "<script>
            alert('تم الحذف بنجاح');
            window.location.href = 'categories.php';
        </script>";
      } else {
        echo "<script>
            alert('فشل الحذف');
            window.location.href = 'categories.php';
        </script>";
      }

    }

    ?>

    <!-- end delete category-->




    <!--end categories section-->


  </div>



  </div>
  </div>

  <?php include '../layout/include/footer.php'; ?>

  <?php
}
?>