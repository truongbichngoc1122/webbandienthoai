<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Thống kê</title>
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
								<a class="navbar-item-link" href="#" >Thống Kê</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
					<?php
						include'../connect.php';
						$sql_xemhd="SELECT *FROM chi_tiet_hoa_don" ;
						$result_hd=mysqli_query($conn,$sql_xemhd);
					?>
				<div class="container-wrap">
					<h1 class="container-header">
						Thống Kê
					</h1>		
					<table class="table table-bordered">		
					  <thead>
					    <tr>
					      <th scope="col">Số Lượng</th>
					      <th scope="col">Đơn Giá</th>
					      <th scope="col">Thành Tiền</th>
					    </tr>
					  </thead>
					<?php
					$total_price = 0;
					while ($data=mysqli_fetch_array($result_hd)) {
						if(($data['SoLuong'] && $data['SoLuong'])==true){
							$total_price += ($data['SoLuong'] * $data['DonGia']);
						}
					?>

					  <tbody>
					    <tr>
					      <th scope="row"><?php echo $data['SoLuong'];?></th>
					      <td><?php echo number_format($data ['DonGia']);?> đ</td>
					      <td><?php echo number_format($data['SoLuong'] * $data['DonGia']);?> đ</td>	        	     
					    </tr>
					    <?php
						}
						?>
						 <tr>
					    	 <td colspan="3">Tổng Tiền</td>	  
					    </tr>
					    <tr>
					    	 <td style="color: red;" colspan="3"><?php echo number_format($total_price);?> đ</td>	  
					    </tr>				    
					  </tbody>
					</table>
				</div>
			</div>
		</div>	
	</body>
</html>