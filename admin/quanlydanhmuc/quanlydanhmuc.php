<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Quản lý danh mục</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../style/styleAdmin.css">
			
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
								<a class="navbar-item-link" href="#">Quản Lý Danh Mục</a>
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
					<?php
						include'../connect.php';
						$sql_xemdm="SELECT *FROM danh_muc" ;
						$result_dm=mysqli_query($conn,$sql_xemdm);
					?>
				<div class="container-wrap">
					<h1 class="container-header">
						Quản Lý Danh Mục
					</h1>
					<a href="themmoidanhmuc.php" class="btn btn-primary btn-lg active mb-16" role="button" aria-pressed="true">Thêm Mới</a>
					<table class="table table-bordered">
					
					  <thead>
					    <tr>
					      <th scope="col">Mã Danh Mục</th>
					      <th scope="col">Tên Danh Mục</th>
					      <th scope="col">Trạng Thái</th>
					      <th scope="col"></th>
					    </tr>
					  </thead>
					<?php
					while ($data=mysqli_fetch_array($result_dm)) {
					?>
					  <tbody>
					    <tr>
					      <th scope="row"><?php echo $data['MaDM'];?></th>
					      <td><?php echo $data['TenDM'];?></td>
					      <td><?php echo $data['TrangThai'];?></td>			     
					      <td>
					      	<a class="btn btn-primary" href="suadanhmuc.php?id=<?php echo $data['MaDM']?>" role="button">Sửa</a>
					      	<a class="btn btn-primary" href="xoadanhmuc.php?id=<?php echo $data['MaDM']?>" role="button">Xoá</a>
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
	</body>
</html>