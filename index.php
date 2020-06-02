<html>
	<head>
		<title>jikecxueyuanQRlogin</title>
		<meta charset = "UTF-8"/>
		
	</head>
	
	<body>
		<?php
			require 'mysql_connect.php';
			$randnumber = "";
			for($i=0;$i<8;$i++){
				$randnumber .= rand(0,9);
			}
			$sql = "insert into login_record (randnumber) values ('$randnumber')";
			$conn->query($sql);
			//mysqli_query("insert into login_record (randnumber) values ('$randnumber')");
			

		?>
	
		<input hidden = "hidden" type = "text" name="randnumber" id="randnumber" value="<?php echo $randnumber;?>" />
		<img src = "http://qr.liantu.com/api.php?text=<?php echo $randnumber; ?>" width="300px"/>
	</body>
	
	<script>
		function polling(){
			var xmlHttp;
			if(window.XMLHttpRequest){
				xmlHttp = new XMLHttpRequest();
			}else{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				
			}
			
			xmlHttp.onreadystatechange = function(){
				if(xmlHttp.status == 200 && xmlHttp.readyState == 4){
					result = xmlHttp.responseText;
					if(result == "true"){
						window.location.href = "welcome.php";
						
					}
						
				}
				
			}
			
			
			
			
			
			
			
			
			randnumber = document.getElementById("randnumber").value;
			xmlHttp.open("GET", "polling.php?randnumber=" + randnumber, true);
			xmlHttp.send();
			
		}
		setInterval("polling()",1000);
	
	</script>


</html>