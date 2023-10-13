<?php include 'condb.php'; 
session_start();
?>
<DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale-scale=1.0" />
    <title>รายละเอียดสินค้า</title>
    <!-- Site Metas -->
    <link href="bootstrsp/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>

    </head>

    <body>
        <?php include 'header1.php'; ?>
        <div class="container">
          
            <div class="row">
            <?php
                if (isset($_GET['action']) && $_GET['action'] == 'show') {
                    $id = $_GET['id'] ;

                    $sql = "SELECT p.pro_id, p.pro_name, p.detail, p.price, p.amount, p.image, t.type_name
                     FROM product AS p
                     LEFT JOIN type AS t ON p.type_id = t.type_id
                     WHERE p.pro_id = $id";
                    $sresult = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($sresult);
                    
 }
                
                
                ?>
                
                <div class="col-md-4">
                    <img src="<?= $row['image'] ?> " width="350px" />
                </div>

                <div class="col-md-6">
                    <h5 class="text-success"><?= $row['pro_name'] ?></h5><br>
                    ID: <?= $row['pro_id'] ?><br>
                    ประเภทสินค้า: <?= $row['type_name'] ?><br>
                    รายละเอียด: <?= $row['detail'] ?><br>
                    ราคา <?= $row['price'] ?> บาท <br>
                    <?php 
                       if (isset($_SESSION['isLogin'])) {
                            ?>
                    <a class="btn btn-outline-primary mt-3" href="order.php?id=<?=$row['pro_id']?>"> ตะกร้า</a>
                    <?php
                        }
                        ?>
                         <?php 
                       if (!isset($_SESSION['isLogin'])) {
                            ?>
                   <a class="btn btn-outline-primary mt-3" href="login.php"> Login</a>
                    <?php
                        }
                        ?>
                </div>
            </div>
            <?php
           
            mysqli_close($conn);
            ?>
    </body>

    </html>