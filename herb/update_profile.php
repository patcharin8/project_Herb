<?php
include 'condb.php';
$proid=$_POST['id'];
$proname=$_POST['name'];
$lastname=$_POST['lastname'];
$telephone=$_POST['telephone'];
$username=$_POST['username'];


//อัพโหลดรูปภาพ
$target_dir = "../project1/uploads/";
$filePicUrl = "";

$sql = "update member set 
name='$proname',
lastname = '$lastname',
telephone = '$telephone',
username = '$username'";

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
  $sql .=", image_pro = '$filePicUrl'";
}

//ถ้าไม่มีไฟล์รูปภาพที่อัปโหลดใหม่ ให้อัปเดตข้อมูล เฉพาะบรรทัดที่ 15-20 เท่านั้นห
$sql .="where id = '$proid'";
// echo $sql;
// exit;
//คำสั่งแก้ไขข้อมูล


$result = mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='show_profile.php';</script>";
}
else{
   
    echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
}
?>