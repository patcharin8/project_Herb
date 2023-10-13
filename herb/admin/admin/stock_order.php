<?php
include 'condb.php';
$ids=$_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id = '$ids'";
$hand=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($hand);
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
                <div class="alert alert-info" role="alert">
                    เพิ่มจำนวนสินค้าในสต็อก
                </div>

                <form method="POST" action="updete_stock.php">
                    <div class="mb-3 mt-3">
                        <label>รหัสสินค้า</label>
                        <input type="text" name="pid" class="form-control" required value="<?=$row['pro_id']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label>ชื่อสินค้า</label>
                        <input type="text" name="pname" class="form-control" required value="<?=$row['pro_name']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label>เพิ่มจำนวนสินค้า</label>
                        <input type="text" name="pnum"  class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="บันทึก">
                    <a href="index.php" class="btn btn-primary" value="ยกเลิก">ยกเลิก</a>
                    
                </form>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
</body>

</html>