<?php include 'condb.php';?>
<?php
$ids = $_GET['id'];
//แสดงรูปหลักฐานการชำระเงิน
$sql = "SELECT * FROM table_order t, payment m WHERE t.orderID=m.orderID AND t.orderID ='$ids'";
$result=mysqli_query($conn,$sql);
$row1=mysqli_fetch_array($result);
$image_bill=$row1['pay_image'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>report</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'menu_ad.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงรายการสินค้าการสั่งซื้อ
                    </div>
                    <br>
                    <div>
                        <a href="report_order.php">
                            <button type="button" class="btn btn-outline-success">กลับหน้าหลัก</button></a>

                    </div>
                    <div class="card-body">
                        <h6>เลขใบสั่งซื้อ : <?= $ids ?></h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = "SELECT * FROM order_detail d, product p, table_order t where  d.orderID = t.orderID and d.pro_id = p.pro_id and d.orderID ='$ids'
                            ORDER BY d.pro_id";
                            $result = mysqli_query($conn, $sql);
                            $sum_total =0;
                            while ($row = mysqli_fetch_array($result)) {
                                $sum_total=$row['total_price'];

                            ?>

                                <tbody>
                                    <tr>
                                        <td><?= $row['pro_id'] ?></td>
                                        <td><?= $row['pro_name'] ?></td>
                                        <td><?= $row['price'] ?></td>
                                        <td><?= $row['orderQty'] ?></td>
                                        <td><?= $row['total'] ?></td>

                                        <td>

                                    </tr>
                                </tbody>
                            <?php }
                            mysqli_close($conn);
                            ?>
                        </table>
                        <b>ราคารวมสุทธิ <?=number_format($sum_total,2) ?> บาท</b>
                    </div>
                </div>

                <div class="text-center">
                    <?php
                    if($image_bill <> ""){?>
                    <div class="text-center">
                        <h5>ชำระเงินแล้ว</h5><br>
                        <img src="<?=$image_bill?>" width="300">
                    </div>
                <?php  } else{ ?>
                    <h5>ยังไม่ได้ชำระเงิน</h5>
                <?php } ?>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </div>
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
<script>
    function del(mypage) {
        var agree = confirm('คุณต้องการยกเลิกใบสั่งซื้อสินค้าหรือไม่');
        if (agree) {
            window.location = mypage;
        }
    }

    function del1(mypage1) {
        var agree = confirm('คุณต้องการปรับสถานะการชำระเงินหรือไม่');
        if (agree) {
            window.location = mypage1;
        }
    }
</script>