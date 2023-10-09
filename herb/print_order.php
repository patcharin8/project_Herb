<?php
session_start();
include 'condb.php';
$id = $_GET['id'];
$sql = "SELECT * FROM table_order WHERE orderID= '$id'";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">
                    การสั่งซื้อเสร็จสมบูรณ์
                </div>
                เลขที่การสั่งซื้อ : <?= $rs['orderID'] ?><br>
                ชื่อ-นามสกุล (ลูกค้า) :<?= $rs['cus_name'] ?><br>
                ที่อยู่จัดส่งสินค้า :<?= $rs['address'] ?><br>
                เบอร์โทรศัพท์ :<?= $rs['telephone'] ?>

                <div class="  mb-4 mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>ราคารวม</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM order_detail ,product  WHERE order_detail.pro_id=product.pro_id AND orderID= '$id'";
                            $result1 = mysqli_query($conn, $sql1);
                            $total_price = 0;
                            while ($row = mysqli_fetch_array($result1)) {
                                $total_price += $row['total'];
                            ?>
                                <tr>
                                    <td><?= $row['pro_id'] ?></td>
                                    <td><?= $row['pro_name'] ?></td>
                                    <td><?= $row['orderPrice'] ?></td>
                                    <td><?= $row['orderQty'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                </tr>
                                <!-- <tr>
                                    <td colspan="4">
                                        รวมเป็นเงิน
                                    </td>
                                    <td>
                                        <?php echo number_format($total_price, 2) ?>
                                    </td>
                                </tr> -->
                        </tbody>

                    <?php
                            }
                    ?>
                    </table>
                    <h6 class="text-end">รวมเป็นเงิน &nbsp;<?php echo number_format($total_price, 2) ?>&nbsp;&nbsp;บาท</h6>
                </div>
            </div>
        </div>
        กรุณาโอนเงินภายใน 7 วันหลังสั่งซื้อสินค้า <br>
        โออนเงินผ่านธนาคาร กรุงไทย<br>
        ชื่อบัญชี นางสาว พัชรินทร์ ศิริหงษ์ <br>
        เลขที่บัญชี 4180732351<br>
<img src="images/QR.png" width="250px" />
<a href="payment_mem.php">แจ้งชำระเงิน</a>
    </div>
    <center>
    <a href="sh_product.php" class="btn btn-success" >กลับ</a>
    <button onclick="window.print()" class="btn btn-success">ปริ้น</button>
</center>
</body>

</html>