<link rel="stylesheet" href="../dashboard/custom.css">

<?php
session_start();

include '../layout/include/connection.php';

if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
    exit;
} else {
    include '../layout/include/header.php';
?>

<!--page content-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookTitle = $_POST['bookTitle'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookCat = $_POST['bookCat'];
    $bookContent = $_POST['bookContent'];

    // Book cover
    $imageName = $_FILES['bookCover']['name'];
    $imageTmp = $_FILES['bookCover']['tmp_name'];

    // Book file
    $bookName = $_FILES['book']['name'];
    $bookTmp = $_FILES['book']['tmp_name'];

    if (empty($bookTitle) || empty($bookAuthor) || empty($bookCat) || empty($bookContent)) {
        $error = "<div class='alert alert-danger'>الرجاء ملء الحقول ادناه</div>";
    } elseif (empty($imageName)) {
        $error = "<div class='alert alert-danger'>الرجاء تحميل صورة مناسبة</div>";
    } elseif (empty($bookName)) {
        $error = "<div class='alert alert-danger'>الرجاء اختيار ملف الكتاب</div>";
    } else {
        $bookCover = rand(0, 100000) . "_همس الورق_" . $imageName;
        move_uploaded_file($imageTmp, "../uploads/bookCovers/" . $bookCover);

        $book = rand(0, 100000) . "_همس الورق_" . $bookName;
        move_uploaded_file($bookTmp, "../uploads/books/" . $book);

        $query = "INSERT INTO books(bookTitle, bookAuthor, bookCat, bookCover, book, bookContent) VALUES('$bookTitle', '$bookAuthor', '$bookCat', '$bookCover', '$book', '$bookContent')";

        $result = mysqli_query($con, $query);

        if ($result) {
            $succ = "<div class='alert alert-success'>تمت الإضافة بنجاح</div>";
        }
    }
}
?>

<div class="container-fluid">
    <!--start new book-->
    <div class="new-book">
        <?php
        if (isset($error)) {
            echo $error;
        } elseif (isset($succ)) {
            echo $succ;
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" id="bookForm">
            <div class="form-group">
                <label for="title">عنوان الكتاب</label>
                <input type="text" class="form-control" name="bookTitle" value="<?php if (isset($bookTitle)) { echo $bookTitle; } ?>">
            </div>

            <div class="form-group">
                <label for="author">المؤلف</label>
                <input type="text" class="form-control" name="bookAuthor" value="<?php if (isset($bookAuthor)) { echo $bookAuthor; } ?>">
            </div>

            <div class="form-group">
                <label for="title">التصنيف</label>
                <select class="form-control" name="bookCat">
                    <option></option>
                    <?php
                    $query = "SELECT categoryName FROM categories";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option>" . $row['categoryName'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="img">صورة الكتاب</label>
                <input type="file" class="form-control-file" name="bookCover" id="bookCoverInput" accept="image/*">
            </div>

            <div class="form-group">
                <label for="img">ملف الكتاب</label>
                <input type="file" class="form-control-file" name="book">
            </div>

            <div class="form-group">
                <label for="desc">وصف الكتاب</label>
                <textarea class="form-control" id="bookDesc" name="bookContent" cols="30" rows="10"><?php if (isset($bookContent)) { echo $bookContent; } ?></textarea>
            </div>

            <button class="custom-btn" type="submit">نشر الكتاب</button>
        </form>

        <script>
        document.getElementById('bookForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Stop form from submitting immediately
            const fileInput = document.getElementById('bookCoverInput');
            const file = fileInput.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);

                        canvas.toBlob(function(blob) {
                            const webpFile = new File([blob], file.name.replace(/\.[^/.]+$/, '.webp'), { type: 'image/webp' });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(webpFile);
                            fileInput.files = dataTransfer.files;

                            // Now submit the form with the WebP file
                            document.getElementById('bookForm').submit();
                        }, 'image/webp');
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                // Submit the form if no image or different image type
                this.submit();
            }
        });
        </script>
    </div>
</div>

<?php
    include '../layout/include/footer.php';
}
?>
