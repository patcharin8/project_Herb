<?php
session_start();
include 'condb.php';
// $id = $_GET["id"];
// $sql = "SELECT * FROM product WHERE pro_id = $id";
// $result =mysqli_query($conn,$sql);
// $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale-scale=1.0" />
    <title>ตะกร้าสินค้า</title>
    <!-- Site Metas -->
    <link href="bootstrsp/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="container px-6"> 
        <form id="form" method="POST" action="insert_cart.php">
            <div class="row">
                <div class="col-md-10">
                    <div class="alert alert-success" role="alert">
                        <h5>การสั่งซื้อสินค้า</h5>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ภาพสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>ราคารวม</th>
                            <th>จำนวน</th>
                            <th>ลบ</th>
                        </tr>
                        <?php
                        $total = 0;
                        $sumPrice = 0;
                        $m = 1;
                        for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                            if (($_SESSION["strProductID"][$i]) != "") {
                                $sql = "select * from product where pro_id = '" . $_SESSION["strProductID"][$i] . "'";
                                $result = mysqli_query($conn, $sql);
                                $row_pro = mysqli_fetch_array($result);

                                $_SESSION["price"] = $row_pro["price"];
                                $total = $_SESSION["strQty"][$i];
                                $sum = $total * $row_pro['price'];
                                $sumPrice = $sumPrice + $sum;
                                $_SESSION["sum_price"] = $sumPrice;



                        ?>

                                <tr>
                                    <td><?= $m ?></td>
                                    <td>
                                        <img src="<?= $row_pro['image'] ?>" width="80" height="100">
                                    </td>
                                    <td><?= $row_pro['pro_name'] ?></td>
                                    <td><?= $row_pro['price'] ?></td>

                                    <td><?= $sum ?></td>
                                    <td><a href="order.php?id= <?php echo $row_pro['pro_id'] ?>" class="btn btn-outline-primary">+</a>
                                        <?= $total ?>
                                        <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                                            <a href="order_del.php?id= <?php echo $row_pro['pro_id'] ?>" class="btn btn-outline-primary">-</a>
                                        <?php } ?>
                                    </td>

                                    <!-- ปุ่มลบ -->
                                    <td><a href="pro_delete.php?Line=<?=$i?>"
                                    class="btn btn-outline-primary">
                                        ลบ
                                            <!-- <image src="images/delete.png" width="40" height="40"> -->
                                        </a></td>
                                </tr>
                        <?php
                                $m = $m + 1;
                            }
                        }
                        ?>

                        <tr>
                            <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                            <td><?= $sumPrice ?></td>
                            <td>บาท</td>
                        </tr>
                    </table>
                    <div style="text-align:right;">
                        <a href="sh_product.php">
                            <button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button></a>
                        <a href="">
                            <button type="submit" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button></a>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <h5>ข้อมูลที่อยู่จัดส่งสินค้า</h5>
                        </div>

                        ชื่อ-นามสกุล:
                        <input type="text" name="cus_name" class="form-control" require placeholder="ชื่อ-นามสกุล...">
                        ที่อยู่:
                        <textarea class="form-control" require placeholder="ที่อยู่..." name="cus_add" rows="3"></textarea>
                        เบอร์โทรศัพท์:
                        <input type="number" name="cus_tel" class="form-control" require placeholder="เบอร์โทรศัพท์...">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>