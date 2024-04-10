<?php
	include '../connect.php';
	$idhd=filter_input(INPUT_GET,'id');
	if(isset($idhd))
	{	
		$sql_update = " UPDATE hoa_don set TrangThai='Đang giao hàng' where MaHD=$idhd";
		$result_update=mysqli_query($conn,$sql_update);
		if($result_update)
		{header("Location: quanlyhoadon.php");
		}
		else
		{
			echo " Chuyển trạng thái đơn không thành công";
		}

	}
?>