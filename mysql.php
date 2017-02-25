<?php

$SERVER = "localhost";

$USERNAME = "root";

$PASSWORD = "nightsky";

$conn = mysql_connect($SERVER, $USERNAME, $PASSWORD);

if ( !$conn ) {

//Không kết nối được, thoát ra và báo lỗi

die("không nết nối được vào MySQL server");

} //end if



//đóng kết nối

mysql_close($conn);

?>