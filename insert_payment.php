<?php 
include 'condb.php';
$orderID=$_POST['order_id'];
$totalPrice=$_POST['total_price'];
$paydate=$_POST['pay_date'];
$paytime=$_POST['pay_time'];

//อัพโหลดรูปภาพ
$target_dir = "../project1/uploads/";
$filePicUrl = "";
if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
    $pictureExtention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (!in_array($pictureExtention, ["png", "jpg"])) {
      echo "กรุณาเลือกไฟล์ .png หรือ .jpg เท่านั้น";
      exit;
    }
  
    $filename = uniqid() . "." . $pictureExtention;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "$target_dir" . $filename)) {
      $filePicUrl = "http://localhost/project1/uploads/" . $filename;
      // echo 'upload success: ' . $filePicUrl;
      // exit;
    }
  }

$sql="insert into payment(orderID,pay_money,pay_date,pay_time,pay_image)
value('$orderID','$totalPrice','$paydate','$paytime','$filePicUrl')";
$hand=mysqli_query($conn,$sql);
if($hand){ 
     echo "<script> alert('บันทึกข้อมูลสำเร็จ');</script>";
    echo "<script> window.location='payment.php';</script>";
  
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
}
mysqli_close($conn);
