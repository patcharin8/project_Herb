<?php 
include 'condb.php';
$orderID=$_POST['order_id'];
$totalPrice=$_POST['total_price'];
$paydate=$_POST['pay_date'];
$paytime=$_POST['pay_time'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./images/".$new_image_name;
    move_uploaded_file($_FILES['file']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql="insert into payment(orderID,pay_money,pay_date,pay_time,pay_image)
value('$orderID','$totalPrice','$paydate','$paytime','$new_image_name')";
$hand=mysqli_query($conn,$sql);
if($hand){
    echo "<script> window.loocation='payment.php';</script>";
    echo "<script> alert('บันทึกข้อมูลสำเร็จ');</script>";
}
mysqli_close($conn);
?>