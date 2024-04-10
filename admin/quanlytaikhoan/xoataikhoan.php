<?php
	include'../connect.php';
	$idtk=filter_input(INPUT_GET,'id');
	$sql_xoatk="DELETE FROM tai_khoan where MaTK=$idtk";
	$result_xoatk=mysqli_query($conn,$sql_xoatk);
	if (($result_xoatk)) {
		header("Location:quanlytaikhoan.php");
	}	else 
	{
		echo 'Xóa không thành công';
	}
?>