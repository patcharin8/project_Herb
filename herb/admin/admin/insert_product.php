<?php
//เชื่อมต่อฐานขข้อมูล
include 'condb.php';

//รับค่าตัวแปรมาจากไฟล์ add_product.php
if(isset($_POST['save'])) {
$pid =$_POST['pid'];
$pname =$_POST['pname'];
$detail =$_POST['detail'];
$typeID =$_POST['typeID'];
$price=$_POST['price'];
$num =$_POST['num'];

// echo $pid;
// echo $pname ;
// echo $detail;
// echo $typeID;
// echo $price;
// echo $num;
// exit;

//เช็คการซ้ำของรหัสข้อมูล ในตาราง product
$check="select * from product where pro_id = '$pid' ";
$result=mysqli_query($conn,$check);
$num1=mysqli_num_rows($result);


if($num1 > 0){
    echo "<script> alert('รหัสสินค้ามีอยู่เเล้ว');</script>";
    echo "<script> window.location='add_product.php';</script>";
}

//อัพโหลดรูปภาพ

$target_dir = "../../project1/uploads/";
$filePicUrl = "";

if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0) {
  $pictureExtention = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
  if (!in_array($pictureExtention, ["png", "jpg"])) {
    echo "กรุณาเลือกไฟล์ .png หรือ .jpg เท่านั้น";
    exit;
  }

  $filename = uniqid() . "." . $pictureExtention;
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $filename)) {
    $filePicUrl = "http://localhost/project1/uploads/" . $filename;
    
  }
}

// echo 'upload success: ' . $filePicUrl;
//     exit;
//คำสั่งเพิ่มข้อมูลในตาราง product
$sql = "INSERT INTO product (pro_id,pro_name,detail,type_id,price,amount,image)
values('$pid','$pname','$detail','$typeID','$price','$num','$filePicUrl')";
// echo $sql;
// exit;
$result = mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='add_product.php';</script>";
}
else{
    echo "Error" .$sql."<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
}
}
mysqli_close($conn); //ปิดการเชื่อมต่อข้อมูล
?>
