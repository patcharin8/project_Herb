<?php include 'condb.php';
session_start();
$order_id = "";
$cusname = "";
$total = 0;
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
</head>

<body>
    <div class="container">
        <?php include 'header1.php'; ?>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="alert alert-info" role="alert">
                    <h4>แจ้งชำระเงิน</h4>
                </div>

                <!--ฟอร์มค้นหาเลขที่ใบเสร็จ -->
                <div class="border mt-5 p-2 my-2" style="background-color: #f0f0f5;">
                    <form method="POST" action="payment.php">
                        <label>เลขที่ใบสั่งซื้อ</label>
                        <input type="text" name="keyword">
                        <button type="submit" name="btn1" class="btn btn-primry">ค้นหา</button>
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
                    <div class="col-md-4">
                        <form method="POST" action="insert_payment.php" enctype="multipart/form-data">
                            <label class="mt-4">เลขที่ใบสั่งซื้อ</label>
                            <input type="text" size="50"  name="order_id" required value=<?= $order_id ?>><br>

                            <label class="mt-4">ชื่อ-นามสกุล (ลูกค้า)</label>
                            <textarea name="cusname" rows="1" cols="50"> <?=$cusname ?></textarea>

                            <label class="mt-4">จำนวนเงิน</label>
                            <input type="number"  size="50" name="total_price" required value=<?= $total ?>><br>

                            <label class="mt-4">วันที่โอน</label>
                            <input type="date"  size="50" name="pay_date" required><br>

                            <label class="mt-4">เวลาที่โอน</label>
                            <input type="time"  size="50" name="pay_time" required><br>

                            <label class="mt-4">หลักฐานการชชำระเงิน</label>
                            <input type="file" class="form-control" name="file" required><br>
                            <button type="submit" name="btn2" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

</body>

</html>