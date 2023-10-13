<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>รายงาน</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <br>
    <?php include 'menu_ad.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงรายงานข้อมูลการสั่งซื้อสินค้า 
                    </div>
                    <br>
                   
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>เลขใบสั่งซื้อ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>ราคารวม</th>
                                    <th>วันที่สั่งซื้อ</th>
                                </tr>
                            </thead>
                                <tbody>

                                <?php
                             $sql = "
                             SELECT 
                                 orderID ,
                                 pro_id,
                                 pro_name,
                                 orderQty,
                                 total_price,
                                 reg_date,
                                 product.pri_id,
                                 d.reg_date
                             FROM product AS p
                             LEFT JOIN table_order ON p.orderID = table_order.pro_id
                             LEFT JOIN order_detail AS d ON p.pro_id = d.orderID 
                             WHERE p.reg_date = ' '
                             ORDER BY orderID  DESC
                             ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                
                                
                            ?>
                                    <tr>
                                        <td><?= $row['orderID'] ?></td>
                                        <td><?= $row['pro_id'] ?></td>
                                        <td><?= $row['pro_name'] ?></td>
                                        <td><?= $row['orderQty'] ?></td>
                                        <td><?= $row['total_price'] ?></td>
                                        <td><?= $row['reg_date'] ?></td>
                                        <td>
                                           
                                        </td>
                                        
                                    </tr>
                                    <?php }
                            mysqli_close($conn);
                            ?>
                                </tbody>
                            
                        </table>
                    </div>
                </div>
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