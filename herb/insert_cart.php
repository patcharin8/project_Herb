<?php
session_start();
include 'condb.php';
$cusname = $_POST['cus_name'];
$cusaddress = $_POST['cus_add'];
$custel = $_POST['cus_tel'];
$result = null;
$sql2 = null;

$ProductIdQuery = "SELECT MAX(orderID) AS lastorderID FROM table_order";
$ProductIdResult = mysqli_query($conn, $ProductIdQuery);
$idRow = mysqli_fetch_assoc($ProductIdResult);
$lastorderID = $idRow['lastorderID'];
$Pro_id = $lastorderID + 1;

$sql = "INSERT INTO table_order (orderID,cus_name,address,telephone,total_price,order_status)
values('$Pro_id','$cusname','$cusaddress','$custel','" . $_SESSION["sum_price"] . "','1')";
$result2=mysqli_query($conn, $sql);

// $orderID = mysqli_insert_id($conn);
// $_SESSION["order_id"] = $orderID;

for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if (($_SESSION["strProductID"][$i]) != "") {
        // ดึงข้อมูลสินค้า
        $sql1 = "select * from product where pro_id = '" . $_SESSION["strProductID"][$i] . "'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $price = $row1['price'];
        $total = $_SESSION["strQty"][$i] * $price;

        $sql2 = "insert into order_detail(orderID, pro_id, orderPrice, orderQty, total)
        values('$Pro_id','" . $_SESSION["strProductID"][$i] . "','$price','" . $_SESSION["strQty"][$i] . "','$total')";
        $result = mysqli_query($conn, $sql2); // กำหนดค่าให้กับ $result

        $id = $Pro_id;

        if ($result) {
            // ตัดสต็อกสินค้า
            $sql3 = "update product set amount = amount - '" . $_SESSION["strQty"][$i] . "'
            where pro_id = '" . $_SESSION["strProductID"][$i] . "'";
            mysqli_query($conn, $sql3);
        }
    }
}


if ($result2 && $result) {
    echo "<script> alert('สั่งซื้อสำเร็จ') ; </script>";
    header("location: print_order.php?id=$id");
} else {
    echo "Error." . $sql2 . "<br>" . mysqli_error($conn);
    echo "<script> alert('ลองอีกครั้ง') ; </script>";
}

mysqli_close($conn);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);


?>

<?php
// session_start();
// include 'condb.php';
// $cusname = $_POST['cus_name'];
// $cusaddress = $_POST['cus_add'];
// $custel = $_POST['cus_tel'];

// $ProductIdQuery = "SELECT MAX(orderID) AS lastorderID FROM table_order";
// $ProductIdResult = mysqli_query($conn, $ProductIdQuery);
// $idRow = mysqli_fetch_assoc($ProductIdResult);
// $lastorderID = $idRow['lastorderID'];
// $Pro_id = $lastorderID + 1;

// $sql = "INSERT INTO table_order (orderID,cus_name,address,telephone,total_price,order_status)
// values('$Pro_id','$cusname','$cusaddress','$custel','" . $_SESSION["sum_price"] . "','1')";
// $result2=mysqli_query($conn, $sql);

// // $orderID = mysqli_insert_id($conn);
// // $_SESSION["order_id"] = $orderID;

// for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
//     if (($_SESSION["strProductID"][$i]) != "") {
//         //ดึงข้อมูลสินค้า
//         $sql1 = "select * form product where pro_id = '" . $_SESSION["strProductID"][$i] . "'";
//         $result1 = mysqli_query($conn, $sql1);
//         $row1 = mysqli_fetch_array($result1);
//         $price = $row1['price'];
//         $total = $_SESSION["strQty"][$i] * $price;

//         $sql2 = "insert into order_detail(orderID, pro_id, orderPrice, ordereQty, total)
//         values('$Pro_id','" . $_SESSION["strProductID"][$i] . "','$price','" . $_SESSION["strQty)"][$i] . "','$total')";
//         $result= mysqli_query($conn, $sql2);
//         $id=$Pro_id;

//         if ($result)  {
          
           
//             //ตัดสต็อกสินค้า
//         $sql3 = "update product set amount= amount - '" . $_SESSION["strProductID"][$i] . "'
//         where pro_id='" . $_SESSION["strProductID"][$i] . "'";
//              mysqli_query($conn, $sql3);
            
            
//         }
//     }if ($result2&&$result) {
//         echo "<script> alert('สั่งซื้อสำเร็จ') ; </script>";
//         header("location: print_order.php?id=$id"); 
//         // echo "<script> window.location='payment.php'; </script>";
//     } else {
//         echo "Error." . $sql2 . "<br>" . mysqli_error($conn);
//         echo "<script> alert('ลองอีกครั้ง') ; </script>";
//         // echo "<script> window.location='order.php'; </script>";

//     }

// }
// mysqli_close($conn);
// unset($_SESSION["intLine"]);
// unset($_SESSION["strProductID"]);
// unset($_SESSION["strQty"]);
// unset($_SESSION["sum_price"]);

?>