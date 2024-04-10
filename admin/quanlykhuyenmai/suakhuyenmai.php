<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Quản lý khuyến mãi</title>
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
					$idkm=filter_input(INPUT_GET,'id');
					$sql_suakm="SELECT *FROM Khuyen_mai where MaKM='$idkm'";
					$result_suakm=mysqli_query($conn,$sql_suakm);
					?>
				<div class="container-wrap">
					<h1 class="container-header">
						Quản Lý Danh Mục
					</h1>
					<div>
						<form>
							<?php
							if($result_suakm){
							while ($data=mysqli_fetch_array($result_suakm)) 
							{
							?>
						  <div class="form-group row">
						    <label for="inputEmail3" class="col-sm-2 col-form-label fs-16 ">Mã Khuyến Mãi</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputEmail3 " placeholder="Nhập mã khuyến mãi..."  value="<?php echo $data['MaKM'];?>" name="txtmakm" readonly>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 ">Tên Khuyến mãi</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập tên khuyến mãi..." value="<?php echo $data['TenKM'];?>" name="txttenkm">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 ">Từ Ngày</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập ngày khuyến mãi..." value="<?php echo $data['TuNgay'];?>" name="txttungaykm">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 ">Đến Ngày</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập ngày khuyến mãi..." value="<?php echo $data['DenNgay'];?>" name="txtdenngaykm">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Trạng Thái</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập trạng thái.." value="<?php echo $data['TrangThai'];?>" name="txttrangthai">
						    </div>
						  </div>
 
						  <div class="form-group">
						    <div class="col-sm-12">
						      <button type="submit"  class="btn btn-primary" name="btnSua">Sửa</button>
						    </div>
						  </div>

						  <?php
							}
							}
							?>
						</form>
						<?php
						$a=filter_input(INPUT_GET,'btnSua');
						if(isset($a)){
						$makm=filter_input(INPUT_GET,'txtmakm');
						$tenkm=filter_input(INPUT_GET,'txttenkm');
						$tungay=filter_input(INPUT_GET,'txttungaykm');
						$denngay=filter_input(INPUT_GET,'txtdenngaykm');
						$trangthai=filter_input(INPUT_GET,'txttrangthai');
						$sql_update="UPDATE khuyen_mai set TenKM='$tenkm',TuNgay='$tungay',
						DenNgay='$denngay', TrangThai='$trangthai' where MaKM=$makm";
						$result_update=mysqli_query($conn,$sql_update);
						if($result_update){
						header("Location: quanlykhuyenmai.php");
						}
						else{
						echo"Sửa không thành công";
						}
						}
						?>
					</div>

					
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>