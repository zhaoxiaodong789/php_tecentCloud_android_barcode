<?php 
	require 'mysql_connect.php';
	$randnumber = $_GET['randnumber'];
	$result = $conn->query("select * from login_record where randnumber = '$randnumber'");
	$row = $result->fetch_array();
	if($row["username"] != ""){
		echo "true";
	
	}else{
		
		echo "false";
	}

?>