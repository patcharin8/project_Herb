<?php
include 'condb.php';
session_start();

$profileID = $_GET['id'];
$sql = "SELECT * FROM member WHERE id = '$profileID'";
$hand = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hand);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> แก้ไขข้อมูลสมาชิก</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'header1.php'; ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="alert alert-info h4" role="alert">
                    แก้ไขข้อมูลสมาชิก
                </div>

                <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">

                        <img src="<?= $row['image_pro'] ?>" width="100"><br>
                        <label>รูปภาพ:</label>
                        <input type="file" name="fileToUpload" value=<?= $row['image_pro'] ?>><br>


                        <label>ชื่อผู้ใช้ :</label>
                        <input type="text" name="username" class="form-control" readonly value=<?= $row['username'] ?>> <br>
                        <label>ชื่อ :</label>
                        <textarea class="form-control" name="name"> <?= $row['name'] ?></textarea> <br>
                        <label>นามสกุล :</label>
                        <textarea class="form-control" name="lastname"> <?= $row['lastname'] ?></textarea> <br>

                        </select><br>

                        <label>เบอร์โทรศัพท์:</label>
                        <input type="number" name="telephone" class="form-control" value=<?= $row['telephone'] ?>><br>
                        
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <a href="show_product.php" class="btn btn-primary" role="button">ยกเลิก</a>

                </form>
            </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<?php
mysqli_close($conn);
?>