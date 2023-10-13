<?php
include 'condb.php';
session_start();
// $ids = $_GET['id'];
// $sql = "SELECT * FROM product WHERE pro_id = '$ids'";
// $hand = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($hand);
// if(isset($_POST['save'])) {
//     echo $_POST['pid'];
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-info h4" role="alert">
                    เพิ่มข้อมูลสินค้า
                </div>

                <form method="POST" action="insert_product.php" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                    <label>ชื่อสินค้า :</label>
                        <input type="text" name="pid" class="form-control" placeholder="รหัสสินค้า..." required ><br>
                    <label>ชื่อสินค้า :</label>
                        <input type="text" name="pname" class="form-control" placeholder="ชื่อสินค้า..." required ><br>
                        <label>รายละเอียดสินค้า :</label>
                        <textarea class="form-control" name="detail" placeholder="รายละเอียด..." required></textarea><br>
                        <label>ประเภทสินค้า</label>
                        <select  class="form-select" name="typeID" ><br>
                    
                        <?php
                        $sql = "SELECT * FROM type order by type_name";
                        $hand = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($hand)) {
                        ?>
                            <option value="<?= $row['type_id'] ?>"><?= $row['type_name'] ?></option>
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </select><br>

                    
                        <label>ราคา:</label>
                        <input type="number" name="price" class="form-control" placeholder="ราคา..." required><br>
                        <label>จำนวน:</label>
                        <input type="number" name="num" class="form-control" placeholder="จำนวน..." required><br>
                        <label>รูปภาพ:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" required><br>
                    </div>
                    <br>
                    <button type="submit"  class="btn btn-primary" value="submit" name="save">บันทึก</button>
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