<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
   <head>
		<title>Control device</title>
		<link rel="shortcut icon" href="icon/favicon.ico" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href ="css/style.css"/> 
		<!-- Reponsive-->
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- JS -->
		<script type="text/javascript">
			function Batden1() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo1").innerHTML = xhttp.responseText;
						document.getElementById('myImage1').src='icon/on.png';
					}
					};
				xhttp.open("GET", "php/batden1.php", true);
				xhttp.send();
			}
			function Tatden1(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo1").innerHTML = xhttp.responseText;
						document.getElementById('myImage1').src='icon/off.png';
					}
					};
				xhttp.open("GET", "php/tatden1.php", true);
				xhttp.send();
			}
			function Batden2() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo2").innerHTML = xhttp.responseText;
						document.getElementById('myImage2').src='icon/on.png';
					}
					};
				xhttp.open("GET", "php/batden2.php", true);
				xhttp.send();
			}
			function Tatden2(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo2").innerHTML = xhttp.responseText;
						document.getElementById('myImage2').src='icon/off.png';
					}
					};
				xhttp.open("GET", "php/tatden2.php", true);
				xhttp.send();
			}
			function getnhietdo(){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("demo3").innerHTML = xhttp.responseText;
						
					}
					};
				xhttp.open("GET", "sql/get_data_from_pi.php", true);
				xhttp.send();
			}
			var reload_every_5s;
			var reload_every_5p;
			function reload_5s(){
				reload_every_5s= setInterval(getnhietdo, 5000);
				clearInterval(reload_every_5p);
				document.getElementById("demo4").innerHTML = "Update every 5 seconds";
			}
			function reload_5p(){
				reload_every_5p= setInterval(getnhietdo, 300000);
				clearInterval(reload_every_5s);
				document.getElementById("demo4").innerHTML = "Update every 5 munites";
			}
			setTimeout(getnhietdo,1);
			reload_5p();
		</script>
   </head>
   <body >
		<div>
			<img id ="logospkt" src="icon/spkt.png" alt="hcmute.edu.vn" width="590" height="135">
		</div>  <br/>	
		<div class="thietbi">
			<img src="icon/switch_off.png" style="width:50px" onclick="Tatden1();">
			<img id="myImage1" src="icon/off.png" style="width:100px">
			<img src="icon/switch_on.png" style="width:50px" onclick="Batden1();">
			<p id="demo1"></p>
		</div>
		
		<div class="thietbi">
			<img src="icon/switch_off.png" style="width:50px" onclick="Tatden2();">
			<img id="myImage2" src="https://image.flaticon.com/icons/svg/248/248092.svg" style="width:100px">
			<img src="icon/switch_on.png" style="width:50px" onclick="Batden2();">
			<p id="demo2"></p>
		</div>	
		<div class ="thietbi" > 		 
			<img src="icon/switch_on.png" style="width:50px"  onclick= "reload_5s();"> 
			<img src="icon/switch_off.png" style="width:50px" onclick= "reload_5p();">
			<p id="demo3"></p>	
			<p id="demo4">Update every 5 munites</p>
		</div>
	</body>
</html>
