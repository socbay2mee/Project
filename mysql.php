<html>
<head>
<title>Tao MySQL Database</title>
</head>
<body>
<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '123456';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Khong the ket noi: ' . mysql_error());
}
echo 'Ket noi thanh cong<br />';
$sql = 'CREATE DATABASE sinhvien';
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Khong the tao co so du lieu: ' . mysql_error());
}
echo "Co so du lieu sinhvien duoc tao thanh cong\n";
mysql_close($conn);
?>
</body>
</html>