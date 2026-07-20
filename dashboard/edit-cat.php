<link rel="stylesheet" href="../dashboard/custom.css">

<?php
session_start();

include '../layout/include/connection.php';

if (!isset($_SESSION['adminInfo'])) {
    header('Location: index.php');
    exit;
} else {
    include '../layout/include/header.php';
    ?>

    <!-- Fetch categoryName from data -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM categories WHERE id='$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- Edit category -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $categoryName = $_POST['category'];

        // Update the categories table
        $query = "UPDATE categories SET categoryName='$categoryName' WHERE id='$id'";
        $edit = mysqli_query($con, $query);

        if ($edit) {
            // Update the books table where bookCat matches the old categoryName
            $oldCategoryName = $row['categoryName'];
            $updateBooksQuery = "UPDATE books SET bookCat='$categoryName' WHERE bookCat='$oldCategoryName'";
            $updateBooks = mysqli_query($con, $updateBooksQuery);

            if ($updateBooks) {
                echo "<script>
                        alert('تم التحديث بنجاح');
                        window.location.href = 'categories.php';
                      </script>";
                exit;
            } else {
                echo "<div class='alert alert-danger'>تم تحديث التصنيف ولكن لم يتم تحديث الكتب المرتبطة.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>لم يتم التحديث</div>";
        }
    }
    ?>

    <div class="edit-cat">
        <form action="edit-cat.php?id=<?php echo $row['id']; ?>" method="post">
            <div class="form-group">
                <h3>
                    <label for="cat">تعديل التصنيف</label>
                </h3>
                <input type="text" class="form-control" id="cat" name="category" value="<?php echo $row['categoryName']; ?>">
            </div>
            <button class="custom-btn">تعديل</button>
        </form>
    </div>

    <?php
    include '../layout/include/footer.php';
    ?>
<?php
}
?>
