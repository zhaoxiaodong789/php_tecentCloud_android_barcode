<?php
	$barcode = $_GET['barcode'];
	$name= $_GET['name'];
	$price = $_GET['price'];
	$count = $_GET['count'];
	
	require 'mysql_connect.php';
	
	//mysqli_query($conn, "update goods set count = '$count' where barcode = '$barcode'");
    $result = mysqli_query($conn,"SELECT *FROM goods where barcode = '$barcode'");

    $info = array();

    if (mysqli_num_rows($result) > 0) {
		
        //已经存在条形码对应的商品，则直接修改值
        $flag = mysqli_query($conn, "update goods set name = '$name', price= '$price',count = '$count' where barcode = '$barcode'");
        if($flag){
            $info["success"] = "1";
        }
        else{
            $info["success"] = "0";
        }
	}else{
        //不存在条形码对应的商品，创建新的行
        $flag = mysqli_query($conn,"insert into goods (barcode, name, price, count) values( '$barcode','$name','$price','$count')");
        if($flag){
            $info["success"] = "1";
        }
        else{
            $info["success"] = "0";
        }
    }

    echo json_encode($info);
	mysqli_close($conn);

?>