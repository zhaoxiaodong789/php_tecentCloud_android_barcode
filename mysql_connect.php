<?php
	//$con = mysqli_connect("localhost", "root", "123456") or die(mysqli_error());
	//mysqli_select_db("qrlogin");

	$servername = "localhost";
	$username1 = "root";
	$password = "123456";
	$dbname = "barcode";
	// 创建连接
	$conn = mysqli_connect($servername, $username1, $password, $dbname)or die(mysqli_error($conn));
	 
	// 检测连接
	if (!$conn) {
		die(mysqli_connect_error());
	}
	
	
?>