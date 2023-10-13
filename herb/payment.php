<?php include 'condb.php';
session_start();
$order_id = "";
$cusname = "";
$total = 0;
$orderstatus = "";

if (isset($_POST['btn1'])) {
    $key_word = $_POST['keyword'];
    if ($key_word != "") {
        $sql = "SELECT * FROM table_order WHERE orderID='$key_word'";
    } else {
        echo "<script>  window.location='payment.php'</script>";
    }
    $hand = mysqli_query($conn, $sql);
    $num1 = mysqli_num_rows($hand);
    if ($num1 == 0) {
        echo "<script> window.location='payment.php';</script>";
        $_SESSION['error'] = "ไม่พบข้อมูลเลขที่ใบสั่งซื้อ";
    } else {
        $row = mysqli_fetch_array($hand);
        $order_id = $row['orderID'];
        $cusname = $row['cus_name'];
        $total = $row['total_price'];
        $orderstatus = $row['order_status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>แจ้งชำระเงิน</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <style>
  body {
    background-image:url('http://localhost/project1/images/aaa.jpg');
    background-repeat: repeat;
  }
</style>
</head>

<body>
    <?php include 'header1.php'; ?>
    <div class="container">
<?php 
    if(isset($_SESSION['isLogin'])){
?>
 <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-info" role="alert">
                    แจ้งชำระเงิน
                </div>
                <!--ฟอร์มค้นหาเลขที่ใบเสร็จ -->
                <div class="border mt-6 p-2 my-2" style="background-color: #f0f0f5;">
                    <form method="POST" action="payment.php">
                        <label>เลขที่ใบสั่งซื้อ</label>
                        <input type="text" name="keyword">
                        <button type="submit" name="btn1" class="btn btn-primary">ค้นหา</button>
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "<div class='text-danger'>";
                            echo $_SESSION['error'];
                            echo "</div>";
                        }
                        ?>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="insert_payment.php" enctype="multipart/form-data">
                            <label class="mt-4">เลขที่ใบสั่งซื้อ</label><br>
                            <input type="text" class="form-control" name="order_id" required value=<?= $order_id ?>>

                            <?php
                            if ($orderstatus == '1') {
                                echo " <div class= 'text-danger'>";
                                echo "ยังไม่ชำระเงิน";
                                echo "</div>";
                            } elseif ($orderstatus == '2') {
                                echo " <div class= 'text-success'>";
                                echo "ชำระเงินแล้ว";
                                echo "</div>";
                            }
                            ?>

                            <label class="mt-4">ชื่อ-นามสกุล (ลูกค้า)</label>
                            <textarea name="cusname" class="form-control" rows="1" cols="50"> <?= $cusname ?></textarea>

                            <label class="mt-4">จำนวนเงิน</label>
                            <input type="number" class="form-control" name="total_price" required value=<?= number_format($total, 2) ?>>

                            <label class="mt-4">วันที่โอน</label>
                            <input type="date" class="form-control" name="pay_date" required>

                            <label class="mt-4">เวลาที่โอน</label>
                            <input type="time" class="form-control" name="pay_time" required>

                            <label class="mt-4">หลักฐานการชชำระเงิน</label>
                            <input type="file" class="form-control" name="file" required><br>
                            <?php if ($orderstatus == '2') { ?>
                                <button type="submit" name="btn2" class="btn btn-primary" disabled>submit</button>
                            <?php } else { ?>
                                <button type="submit" name="btn2" class="btn btn-primary">submit</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>

            </div>

        </div>
<?php
    }
    ?>
       
       <?php 
    if(!isset($_SESSION['isLogin'])){
?>
<div>
    <b>กรุณาเข้าสู่ระบบก่อน</b><br>
    <a href="login.php">เข้าสู่ระบบ</a>
</div>
  <?php
    }
    ?>
    </div>
</body>

</html>