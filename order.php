<?php
ob_start();
session_start();
include 'condb.php';

// $sql = "SELECT * FROM order_detail ";
// $result_order =mysqli_query($conn,$sql);
// $row_order = mysqli_fetch_all($result_order);
// $_SESSION["strProductID"] = $row_order;

if(!isset($_SESSION["intLine"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["id"];   //รหัสสินค้า
	 $_SESSION["strQty"][0] = 1;                   //จำนวนสินค้า
	  header("location:cart.php");
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	 header("location:cart.php");
}
// if (isset($_GET['action']) && $_GET['action'] == 'delete') {
// 	$id = $_GET['id'];

// 	if(!isset($_SESSION["intLine"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
// {
// 	 $_SESSION["intLine"] = 0;
// 	 $_SESSION["strProductID"][0] = $_GET["id"];   //รหัสสินค้า
// 	 $_SESSION["strQty"][0] = 1;                   //จำนวนสินค้า
// 	 header("location:cart.php");
// }
// else
// {
	
// 	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
// 	if((string)$key != "")
// 	{
// 		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] - 1;
// 	}
// 	else
// 	{
// 		 $_SESSION["intLine"] = $_SESSION["intLine"] - 1;
// 		 $intNewLine = $_SESSION["intLine"];
// 		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
// 		 $_SESSION["strQty"][$intNewLine] = 1;
// 	}
// 	 header("location:cart.php");
// }

// }



?>