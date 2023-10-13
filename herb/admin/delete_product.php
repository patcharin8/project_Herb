<?php
include 'condb.php';
$ids = $_GET["id"];
// echo $ids;
// exit;
$sql = "DELETE FROM product WHERE pro_id = '$ids' ";

if(mysqli_query($conn,$sql)){
    echo "<script> alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script> window.location='show_product.php';</script>";
}else{
    echo "Error : " .$sql ."<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);
?>
