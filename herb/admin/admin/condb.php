
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_herb";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
    die("connection failed: " . mysqli_connect_error());

}
//echo "connected successfully";
?>