<?php 
header("content-type: text/html; charset=utf_8");
$conn=mysqli_connect('localhost','root','','web_sell_phone');
mysqli_set_charset($conn,'UTF8');
if (mysqli_connect_errno()) {
	echo "Kết nối không thành công ";
}
?>