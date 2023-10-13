<?php include 'condb.php'; 
// session_start();
// $show=header("location: login.php");


//รายการสั่งซื้อสินค้าที่ยังไม่ชำระเงิน
$sql1 = "SELECT count(orderID) as order_no from table_order where order_status='1'";
$hand = mysqli_query($conn,$sql1);
$row1= mysqli_fetch_array($hand);


//รายการสั่งซื้อสินค้าชำระเงินแล้ว
$sql2 = "SELECT count(orderID) as order_yes from table_order where order_status='2'";
$hand = mysqli_query($conn,$sql2);
$row2= mysqli_fetch_array($hand);


//รายการสั่งซื้อสินค้าที่ยกเลิกแล้ว
$sql3 = "SELECT count(orderID) as order_can from table_order where order_status='0'";
$hand = mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($hand);

//รายการสั่งซื้อสินค้าที่เหลือน้อยว่า 10 ชิ้น
$sql4 = "SELECT count(pro_id) as pro_num from product where amount < 10";
$hand = mysqli_query($conn,$sql4);
$row4= mysqli_fetch_array($hand);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'menu_ad.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"></li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">รายงานสินค้า (ยังไม่ชำระเงิน)<h4><?=$row1['order_no']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">รายงานสินค้า (ชำระเงินแล้ว)<h4><?=$row2['order_yes']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_yes.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">รายงานสินค้า (ยกเลิก)<h4><?=$row3['order_can']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_no.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">รายงานสินค้า (เหลือน้อยยกว่า10ชิ้น)<h4><?=$row4['pro_num']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pro_stock.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div> -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>เพิ่มสินค้า</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
$sql = "SELECT * FROM product p, type t where p.type_id=t.type_id";
$hand=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
                                ?>
                                <tr>
                                    <td><img src="<?=$row['image']?>" width ="70px"></td>
                                    <td><?=$row['pro_id']?></td>
                                    <td><?=$row['pro_name']?></td>
                                    <td><?=$row['detail']?></td>
                                    <td><?=$row['type_name']?></td>
                                    <td><?=$row['price']?></td>
                                    <td><?=$row['amount']?></td>
                                    <td><a href="stock_order.php?id=<?=$row['pro_id']?>" class="btn btn-success">เพิ่ม</a></td>
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