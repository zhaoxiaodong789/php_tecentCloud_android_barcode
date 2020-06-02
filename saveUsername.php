<?php
	$barcode = $_GET['barcode'];
	
	require 'mysql_connect.php';
	
	//mysqli_query($conn, "update goods set count = '$count' where barcode = '$barcode'");
	//$result = mysqli_query($conn,"SELECT *FROM goods where barcode = '$barcode'") or die(mysqli_error());
	$result = mysqli_query($conn,"SELECT *FROM goods where barcode = '$barcode'");
	// check for empty result
	if (mysqli_num_rows($result) > 0) {
		// looping through all results
		// products node
		$info = array();

		while ($row = mysqli_fetch_assoc($result)) {
			// temp user array
			
			$info["id"] = $row["id"];
			$info["barcode"] = $row["barcode"];
			$info["name"] = $row["name"];
			$info["price"] = $row["price"];
			$info["count"] = $row["count"];

			// push single product into final response array
			//rray_push($response["persons"], $info);
		}
		// success
		$info["success"] = "1";
	}else{
		$info["success"] = "0";
	}

	$info["barcode_src"] = $barcode;
		// echoing JSON response
	echo json_encode($info);
	mysqli_close($conn);

?>