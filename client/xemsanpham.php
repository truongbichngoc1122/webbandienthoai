<!DOCTYPE html>
<html>
	<head>
		<title>Details Product</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../style/styleClient.css">
	</head>
	<body>
		<div class="header">
			<div class="navbar">
				<div class="navbar_left">
					<ul class="navbar_item">
						<li class="navbar_item-li">
							<a class="navbar_item-link" href=""><i class="fa-solid fa-phone"></i> 1900 9198</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href=""><i class="fa-solid fa-envelope"></i> Client@gmail.com</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href=""><i class="fa-solid fa-location-dot"></i> Hệ Thống Cửa Hàng</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href=""><i class="fa-solid fa-bell"></i> Thông Báo</a>
						</li>
					</ul>
				</div>

				<div class="navbar_right">
<?php 
						session_start();
						if(isset($_SESSION['user'])==null){
					?>
					<ul class="navbar_item">
						<li class="navbar_item-li">
							<a class="navbar_item-link" href="login/register.php"> Đăng Ký</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href="login/login.php"> Đăng Nhập</a>
						</li>
					</ul>
					<?php 
						} else {
							$data = $_SESSION['user'];
					?>
					<ul class="navbar_item">
						<li class="navbar_item-li">
							<p>Xin Chào <?php echo $data['TenDN']; ?>!</p>
						</li>
						<li>
							<a class="navbar_item-link" href="cart/cart.php">Giỏ hàng</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href="login/login.php"> Đăng xuất</a>
						</li>
					</ul>
					<?php 
						}
					?>
				</div>
			</div>
			<div class="header_container">
				<a href="homePage.php" >
					<div class="header_container-logo">
					<img src="../images/logo.png" alt="logo">
					M.I.P
				</div>
				</a>
				<form action="" method="post">
  					<input style="width: 600px; border: 1px solid #ccc; padding: 10px; font-size: 18px; border-radius: 10px;" type="text" name="searchKeyword" placeholder="Tìm Kiếm Sản Phẩm...">
  					<button style="width: 70px; background-color: #000; color: #fff; border: none; padding: 10px; font-size: 18px; border-radius: 10px;" type="submit" name="searchSubmit">
    				<i class="fa-solid fa-magnifying-glass"></i>
  					</button>
				</form>
				<a href="cart/cart.php" class="header_container-cart">			
					<i class="fa-solid fa-cart-shopping"></i>
				</a>
			</div>
		</div>
		<div class="main">
				<?php
					include'../admin/connect.php';
					$sql_xemdm="SELECT *FROM danh_muc" ;
					$result_dm=mysqli_query($conn,$sql_xemdm);
				?>
			<div class="main-left">
			<div class="left-category">
					<i class="fa-solid fa-bars"></i>
					<a href="homePage.php" style ="color: #a6a830;"><h1>Danh Mục Sản Phẩm</h1></a>
				</div>
				<?php
					while ($data=mysqli_fetch_array($result_dm)) {
				?>
				<div class="left_list">
					<ul class="left_list-item">
						<li class="left_list-li">
							<a class="left_list-link" href="xemsanpham.php?id=<?php echo $data['MaDM']?>"><?php echo $data['TenDM'];?></a>
						</li>
					</ul>
				</div>
				<?php
				}
				?>
			</div>
			<div class="main-right">
				<?php
					include'../admin/connect.php';
					$iddm=filter_input(INPUT_GET,'id');
					$sql_xemsp="SELECT *FROM san_pham where MaDM=$iddm";
					$result_sp=mysqli_query($conn,$sql_xemsp);
					if(isset($_POST['searchSubmit'])) {
        				$searchKeyword = $_POST['searchKeyword'];


        				$sql_search = "SELECT * FROM san_pham WHERE TenSP LIKE '%$searchKeyword%'";
        				$result_search = mysqli_query($conn, $sql_search);
					
					if($searchKeyword != "") {
						$result_sp = $result_search;
					}}
					while ($data=mysqli_fetch_array($result_sp)) {
				?>
				
				<div class="product-wrap">
					<a href="detailProduct.php?id=<?php echo $data['MaSP']?>" class="product-item">
						<div class="product-item-img">
							<?php $img = $data['HinhAnh'];?>
							<img src="../images/<?php echo $data['HinhAnh']?>" alt="">
						</div>
						<div class="product-content">
							<h1><?php echo $data['TenSP'];?></h1>
							<span><?php echo number_format($data['DonGia']); ?> đ</span>
							<p><?php echo mb_substr($data['MoTa'], 0, 20, 'UTF-8'); ?>...</p>
							<button class="btn btn-primary" type="submit">Xem Chi Tiết</button>
						</div>
					</a>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="footer">
			<ul>
				<li class="">
					<h6>CHĂM SÓC KHÁCH HÀNG</h6>
				</li>
				<li>
					<a href="" title="">Trung Tâm Trợ Giúp</a>
				</li>
				<li>
					<a href="" title="">Hướng Dẫn Mua Hàng</a>
				</li>
				<li>
					<a href="" title="">Hướng Dẫn Bán Hàng</a>
				</li>
				<li>
					<a href="" title="">Thanh Toán</a>
				</li>
				<li>
					<a href="" title="">Chính Sách Bảo Hành</a>
				</li>
				<li>
					<a href="" title="">Vận Chuyển</a>
				</li>
				<li>
					<a href="" title="">Trả Hàng và Hoàn Tiền</a>
				</li>
				<li>
					<a href="" title="">Chăm Sóc Khách Hàng</a>
				</li>
			</ul>
			<ul>
				<li>
					<h6>VỀ MIP</h6>
				</li>
				<li>
					<a href="" title="">Giới Thiệu Về MIP Việt Nam</a>
				</li>
				<li>
					<a href="" title="">Tuyển Dụng</a>
				</li>
				<li>
					<a href="" title="">Điều Khoản MIP</a>
				</li>
				<li>
					<a href="" title="">Chính Sách Bảo Mật</a>
				</li>
				<li>
					<a href="" title="">Chính Hãng</a>
				</li>
				<li>
					<a href="" title="">Kênh Người Bán</a>
				</li>
			</ul>
			<ul>
				<li>
					<h6>THANH TOÁN</h6>
				</li>
				<li>
					<i class="fa-brands fa-cc-visa"></i>
					<a href="" title="">cc-Visa</a>
				</li>
				<li>
					<i class="fa-solid fa-money-check-dollar"></i>
					<a href="" title="">Cod</a>
				</li>
			</ul>
			<ul>
				<li>
					<h6>THEO DÕI CHÚNG TÔI TRÊN</h6>
				</li>
				<li>
					<i class="fa-brands fa-facebook"></i>
					<a href="" title="">Facebook</a>
				</li>
				<li>
					<i class="fa-brands fa-instagram"></i>
					<a href="" title="">instagram</a>
				</li>
				<li>
					<i class="fa-brands fa-line"></i>
					<a href="" title="">Line</a>
				</li>
			</ul>
			<ul>
				<li>
					<h6>TẢI ỨNG DỤNG MIP NGAY THÔI</h6>
				</li>
				<li>
					<i class="fa-brands fa-apple"></i>
					<a href="" title="">App Store</a>
				</li>
				<li>
					<i class="fa-brands fa-google-play"></i>
					<a href="" title="">Google Play</a>
				</li>
			</ul>
		</div>





		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>