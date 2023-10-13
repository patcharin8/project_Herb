<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body >
    <?php include 'menu_ad.php'; ?>
 
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        
                        รายการสินค้าที่เหลือน้อยกว่า 10 ชิ้น
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
$sql = "SELECT * FROM product p, type t where p.type_id=t.type_id and amount <= 10";
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