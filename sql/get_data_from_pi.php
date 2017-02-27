<?php
	echo "Nhiet do duoc cap nhat";
	exec('sudo python /var/www/html/Project/sql/post_data_to_pi.py');
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