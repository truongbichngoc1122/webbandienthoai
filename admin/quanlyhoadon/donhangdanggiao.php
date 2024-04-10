<!DOCTYPE html>
<html>
	<head>
		<title>Quản lý hoá đơn</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../style/styleAdmin.css">
		<meta charset="utf-8">
			
	</head>
	<body>
		<div class="header">
				<h1>ADMIN</h1>
		</div>
		<div class="wrap">
			<div class="navbar">
				<div class="navbar-wrap">
					<div class="navbar-user">
						<img src="" alt="">
						<span>Quản Trị</span>
					</div>
					<div>
						<ul class="navbar-item">
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlydanhmuc/quanlydanhmuc.php">Quản Lý Danh Mục</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlysanpham/quanlysanpham.php" >Quản Lý Sản Phẩm</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlytaikhoan/quanlytaikhoan.php" >Quản Lý Tài Khoản</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlyhoadon/quanlyhoadon.php" >Quản Lý Hoá Đơn</a>
							</li>
							<!-- <li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlydanhgia/quanlydanhgia.php" >Quản Lý Đánh Giá</a>
							</li> -->
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlykhuyenmai/quanlykhuyenmai.php" >Quản Lý Khuyến Mãi</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../thongke/thongkedoanhthu.php" >Thống Kê</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="container-wrap">
					<?php
						include'../connect.php';
						$sql_xemhd="SELECT *FROM hoa_don where TrangThai='Đang giao hàng'" ;
						$result_hd=mysqli_query($conn,$sql_xemhd);
					?>
					<h1 class="container-header">
						Quản Lý Hoá Đơn
					</h1>	
					<div>
						<ul class="list-item-wrap">
							<li>
								<a class="btn btn-primary" href="#" role="button">Xem Đơn Hàng Đang Giao</a>
							</li>
							<li>
								<a class="btn btn-primary" href="donhangdagiao.php" role="button">Xem Đơn Hàng Đã Giao</a>
							</li>
							<li>
								<a class="btn btn-primary" href="donhangdabihuy.php" role="button">Xem Đơn Hàng Bị Huỷ</a>
							</li>
							<li>
								<a class="btn btn-primary" href="xemdonhangmoi.php" role="button">Xem Đơn Hàng Mới</a>
							</li>
						</ul>
					</div>
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Mã Hoá Đơn</th>
					      <th scope="col">Ngày Lập Hoá Đơn</th>
					      <th scope="col">Mã Tài Khoản</th>
					      <th scope="col">Trạng Thái</th>
					      <th scope="col">Họ Tên Người Nhận</th>
					      <th scope="col">Địa Chỉ Người Nhận</th>
					      <th scope="col">Số Điện Thoại Người Nhận</th>
					      <th scope="col">Tổng Số Mặt Hàng</th>
					      <th scope="col"></th>
					    </tr>
					  </thead>
					<?php
					while ($data=mysqli_fetch_array($result_hd)) {
					?>
					  <tbody>
					    <tr>
					      <th scope="row"><?php echo $data['MaHD'];?></th>
					      <td><?php echo $data['NgayLapHD'];?></td>
					      <td><?php echo $data['MaTK'];?></td>	
					      <td><?php echo $data['TrangThai'];?></td>
					      <td><?php echo $data['HoTenNguoiNhan'];?></td>	
					      <td><?php echo $data['DiaChiNguoiNhan'];?></td>
					      <td><?php echo $data['SoDienThoaiNguoiNhan'];?></td>
					      <td><?php echo $data['TongSoMatHang'];?></td>			     
					     						      <td>
					      	<a class="btn btn-primary" href="huyhoadon.php?id=<?php echo $data['MaHD']?>" role="button" " onclick="return confirm('Bạn có muốn hủy hóa đơn này không?')">Xoá</a>
					      	<a class="btn btn-primary" href="dathanhtoan.php?id=<?php echo $data['MaHD']?>" role="button">Đã Thanh Toán</a>
					      </td>		     	     
					    </tr>				    
					  </tbody>
					  	<?php
						}
						?>
					</table>
				</div>	
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>