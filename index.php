<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
   <head>
		<title>Control device</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" href ="3.style.css"/> <!--Link toi file CSS -->
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!--Khai bao the meta dung cho reponsive-->
		
		<script type="text/javascript">
			function Batden1() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo1").innerHTML = xhttp.responseText;
						document.getElementById('myImage1').src='https://image.flaticon.com/icons/svg/222/222545.svg';
					}
					};
				xhttp.open("GET", "batden1.php", true);
				xhttp.send();
			}
			function Tatden1(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo1").innerHTML = xhttp.responseText;
						document.getElementById('myImage1').src='https://image.flaticon.com/icons/svg/248/248092.svg';
					}
					};
				xhttp.open("GET", "tatden1.php", true);
				xhttp.send();
			}
			function Batden2() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo2").innerHTML = xhttp.responseText;
						document.getElementById('myImage2').src='https://image.flaticon.com/icons/svg/222/222545.svg';
					}
					};
				xhttp.open("GET", "batden2.php", true);
				xhttp.send();
			}
			function Tatden2(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo2").innerHTML = xhttp.responseText;
						document.getElementById('myImage2').src='https://image.flaticon.com/icons/svg/248/248092.svg';
					}
					};
				xhttp.open("GET", "tatden2.php", true);
				xhttp.send();
			}
			function getnhietdo(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo3").innerHTML = xhttp.responseText;
						
					}
					};
				xhttp.open("GET", "dht11.php", true);
				xhttp.send();
			}			
		</script>
   </head>
   <body>
		<div>
			<img id ="logospkt" src="spkt.png" alt="hcmute.edu.vn" width="590" height="135">
		</div>  <br/>	
		<div class="thietbi">
			<img src="http://www.flaticon.com/premium-icon/icons/svg/284/284116.svg" style="width:50px" onclick="Tatden1();">
			<img id="myImage1" src="https://image.flaticon.com/icons/svg/248/248092.svg" style="width:100px">
			<img src="https://image.flaticon.com/icons/svg/214/214326.svg" style="width:50px" onclick="Batden1();">
			<p id="demo1"></p>
		</div>
		
		<div class="thietbi">
			<img src="http://www.flaticon.com/premium-icon/icons/svg/284/284116.svg" style="width:50px" onclick="Tatden2();">
			<img id="myImage2" src="https://image.flaticon.com/icons/svg/248/248092.svg" style="width:100px">
			<img src="https://image.flaticon.com/icons/svg/214/214326.svg" style="width:50px" onclick="Batden2();">
			<p id="demo2"></p>
		</div>	
		<div class ="thietbi" >		 
			<img src="https://image.flaticon.com/icons/svg/214/214326.svg" style="width:50px" onclick="getnhietdo();">
			<p id="demo3"></p>			
			<?php
				$dbhost = 'localhost:3306';
				$dbuser = 'root';
				$dbpass = 'nightsky';
				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if(! $conn )
				{
					die('Khong the ket noi: ' . mysql_error());
				}
				$sql = 'SELECT TRANGTHAI
						FROM DEVICE
						WHERE THIETBI="NHIETDO"';

				mysql_select_db('sinhvien');
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Khong the lay du lieu: ' . mysql_error());
				}
				while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					echo "Nhiet do:{$row['TRANGTHAI']}  <br> ";
				} 
				$sql = 'SELECT TRANGTHAI
						FROM DEVICE
						WHERE THIETBI="DOAM"';
				mysql_select_db('sinhvien');
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Khong the lay du lieu: ' . mysql_error());
				}
				while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					echo "Do am: {$row['TRANGTHAI']} <br> ";
				} 
				echo "Lay du lieu thanh cong\n";
				mysql_close($conn);
			?>
		</div>
	</body>
</html>
