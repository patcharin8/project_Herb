<?php
include 'condb.php';
//รับค่าตัวแปรมาจากไฟล์ register
$name =$_POST['firstname'];
$lastname =$_POST['lastname'];
$telephone =$_POST['telephone'];
$username =$_POST['username'];
$password =$_POST['password'];

//เข้ารหัส password ด้วย sha512
//$password = hash('sha512',$password);

//อัพโหลดรูปภาพ
$target_dir = "../project1/uploads/";
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
//       exit;
//คำสั่งเพิ่มข้อมูลลงตาราง member
$sql = "INSERT INTO member (name,lastname,telephone,username,password,image_pro)
values('$name','$lastname','$telephone','$username','$password','$filePicUrl')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='login.php';</script>";
}
else{
    echo "Error" .$sql."<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ');</script>";
}
mysqli_close($conn);
?>
