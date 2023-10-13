<?php
include 'condb.php';
session_start();

$proID = $_GET['id'];
$sql1 = "SELECT * FROM product WHERE pro_id = '$proID'";
$hand = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($hand);
$type_id = $row1['type_id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>แก้ไขข้อมูลสินค้า</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="alert alert-info h4" role="alert">
                    แก้ไขข้อมูลสินค้า
                </div>

                <form method="POST" action="update_product.php" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label>ชื่อสินค้า :</label>
                        <input type="text" name="pid" class="form-control" readonly value=<?= $row1['pro_id'] ?>> <br>
                        <label>ชื่อสินค้า :</label>
                        <textarea class="form-control" name="pname"> <?= $row1['pro_name'] ?></textarea> <br>
                        <label>รายละเอียดสินค้า :</label>
                        <textarea class="form-control" name="detail"> <?= $row1['detail'] ?></textarea> <br>
                        <label>ประเภทสินค้า</label>
                        <select class="form-select" name="typeID"><br>

                            <?php
                            $sql = "SELECT * FROM type order by type_name";
                            $hand = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($hand)) {
                                $ttype_id = $row['type_id'];
                            ?>
                                <option value="<?= $row['type_id'] ?>" <?php if ($ttype_id == $type_id) {
                                                                            echo "selected=selected";
                                                                        } ?>>
                                    <?= $row['type_name'] ?></option>
                            <?php
                            }
                            
                            ?>
                        </select><br>


                        <label>ราคา:</label>
                        <input type="number" name="price" class="form-control" value=<?= $row1['price'] ?>><br>
                        <label>จำนวน:</label>
                        <input type="number" name="num" class="form-control" value=<?= $row1['amount'] ?>><br>
                        
                        <img src="<?= $row1['image'] ?>"  width="100"><br>
                        <label>รูปภาพ:</label>
                        <input type="file" name="fileToUpload" value=<?= $row1['image'] ?>><br>
                        
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" >บันทึก</button>
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