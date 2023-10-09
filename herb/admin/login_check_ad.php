<?php
include 'condb.php';
session_start();


$username =$_POST['username'];
$password =$_POST['password'];

//เข้ารหัส passwod ด้วย sha512
$password=hash('sha512',$password);

$sql = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
$result =mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if($row >0){
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['password'];
    $_SESSION["firstname"]=$row['name'];
    $_SESSION["lastname"]=$row['lastname'];
    header("location:index.php");

}else{
    $_SESSION["Error"]="<p>ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง</p>";
    $show=header("location:login.php");
 }
 echo $show;
?>