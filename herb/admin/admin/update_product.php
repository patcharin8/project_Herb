<?php
include 'condb.php';
$proid=$_POST['pid'];
$proname=$_POST['pname'];
$detail=$_POST['detail'];
$typeid=$_POST['typeID'];
$price=$_POST['price'];
$amount=$_POST['num'];
$image=$_POST['images'];

//อัพโหลดรูปภาพ
$target_dir = "../../project1/uploads/";
$filePicUrl = "";

$sql = "update product set 
pro_name='$proname',
detail = '$detail',
type_id = '$typeid',
price = '$price',
amount = '$amount'";
if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0) {
  $pictureExtention = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
  if (!in_array($pictureExtention, ["png", "jpg"])) {
    echo "กรุณาเลือกไฟล์ .png หรือ .jpg เท่านั้น";
    exit;
  }

  $filename = uniqid() . "." . $pictureExtention;
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $filename)) {
    $filePicUrl = "http://localhost/project1/uploads/" . $filename;
    // echo 'upload success: ' . $filePicUrl;
    // exit;
  }
//ถ้ามีไฟล์รูปภาพที่อัปโหลดใหม่ ให้ต่อสตริงตัวแปร $sql เพิ่ม img
  $sql .=", image = '$filePicUrl'";
}

//ถ้าไม่มีไฟล์รูปภาพที่อัปโหลดใหม่ ให้อัปเดตข้อมูล เฉพาะบรรทัดที่ 15-20 เท่านั้นห
$sql .="where pro_id = '$proid'";

//คำสั่งแก้ไขข้อมูล


$result = mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='show_product.php';</script>";
}
else{
   
    echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
}
?>