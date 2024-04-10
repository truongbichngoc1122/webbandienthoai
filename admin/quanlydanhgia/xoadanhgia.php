<?php
	include'../connect.php';
	$iddg=filter_input(INPUT_GET,'id');
	$sql_xoadg="DELETE FROM danh_gia where MaDG=$iddg";
	$result_xoadg=mysqli_query($conn,$sql_xoadg);
	if (($result_xoadg)) {
		header("Location:quanlydanhgia.php");
	}else 
	{
		echo 'Xóa không thành công';
	}
?>