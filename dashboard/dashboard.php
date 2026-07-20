<link rel="stylesheet" href="../dashboard/custom.css">



<?php
session_start();

include '../layout/include/connection.php';




if (!isset($_SESSION['adminInfo'])) {
    header(header: 'Location:index.php');
    exit;
} else {

    include '../layout/include/header.php';
    ?>

    <div class="container-fluid">
        <div class="content">
            <div class="statistics text-center">
                <div class="row">


                    <div class="col-sm-6">
                        <div class="statistic">
                            <?php
                            $query="SELECT id FROM books";
                            $result=mysqli_query($con,$query);
                            $booknum=mysqli_num_rows($result);
                            echo"<h3>$booknum</h3>";
                            ?>
                            <p>عدد الكتب
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="statistic">
                        <?php
                            $query="SELECT id FROM categories";
                            $result=mysqli_query($con,$query);
                            $catnum=mysqli_num_rows($result);
                            echo"<h3>$catnum</h3>";
                            ?>
                            <p>عدد التصنيفات
                            </p>
                        </div>
                    </div>


                    <div class="col-12">
                   
                    <h2 class="text-center">الرسائل </h2>
                    <hr>

              <table class="table">
               <thead class="thead-dark">
              <tr>
              <th scope="col">الاسم</th>
              <th scope="col"> الايمايل</th>
              <th scope="col"> الرسالة</th>
               <th scope="col">date</th>
              </tr>
             </thead>
             <tbody>
              <!--fetch categories from database-->
              <?php
             
               $query = " SELECT * FROM messages ORDER BY id DESC";
               $res = mysqli_query($con, $query);
               
               while ($row = mysqli_fetch_assoc($res)) {
              
              
              

              ?>

              <tr>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['message'];?></td>
              <td><?php echo $row['created_at'];?></td>
              
              </tr>

              <?php
            }
            ?>

          </tbody>
        </table>



                            
                            
                    

                    </div>


                </div>
            </div>
        </div>
    </div>




    </div>
    </div>
    <?php
    include '../layout/include/footer.php';
    ?>


    <?php
}
?>