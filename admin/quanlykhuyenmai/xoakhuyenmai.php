<?php
	include'../connect.php';
	$idkm=filter_input(INPUT_GET,'id');
	$sql_xoakm="DELETE FROM khuyen_mai where MaKM=$idkm";
	$result_xoakm=mysqli_query($conn,$sql_xoakm);
	if (($result_xoakm)) {
		header("Location:quanlykhuyenmai.php");
	}	else 
	{
		echo 'Xóa không thành công';
	}
?>