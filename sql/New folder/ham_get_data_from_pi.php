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
    echo "nhietdo :{$row['TRANGTHAI']}  <br> ".
        //"doam: {$row['TRANGTHAI']} <br> ".
         "--------------------------------<br>";
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
    echo //"nhietdo :{$row['TRANGTHAI']}  <br> ".
         "doam: {$row['TRANGTHAI']} <br> ".
         "--------------------------------<br>";
} 
echo "Lay du lieu thanh cong\n";
mysql_close($conn);
?>