<?php
include 'condb.php';
$ids=$_POST['pid'];
$nums=$_POST['pnum'];

$sql = "UPDATE product SET amount = amount + $nums WHERE pro_id ='$ids'";
$hand=mysqli_query($conn,$sql);
if ($hand){
    echo "<script> alert ('อัปเดตจำนวนสินค้าเรียบร้อย')</script>";
    echo "<script> window.location='index.php'; </script>";
}else{
    echo "<script> alert ('ไม่สามารถอัปเดตจำนวนสินค้าสำเร็จ');</script>";
}

mysqli_close($conn);
?>