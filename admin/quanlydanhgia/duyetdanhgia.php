<?php
	include '../connect.php';
	$iddg=filter_input(INPUT_GET,'id');
	if(isset($iddg))
	{	
		$sql_update = " UPDATE danh_gia set TrangThai='Đã Duyệt' where MaDG=$iddg";
		$result_update=mysqli_query($conn,$sql_update);
		if($result_update)
		{header("Location: quanlydanhgia.php");
		}
		else
		{
			echo " Duyệt Đánh Giá không thành công";
		}

	}
?>