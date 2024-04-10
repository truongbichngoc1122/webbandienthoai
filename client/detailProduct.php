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
		$idsp=filter_input(INPUT_GET,'id');
		$sql_detailsp="SELECT *FROM san_pham where MaSP='$idsp'"; 
		$result_sp=mysqli_query($conn,$sql_detailsp);
		if($result_sp){
		while ($data=mysqli_fetch_array($result_sp)) 
		{
			?>
			<div class="main_detail-left">
				<?php $img = $data['HinhAnh'];?>
				<img src="../images/<?php echo $data['HinhAnh']?>" alt="">
			</div>
			<div class="main_detail-right">
				<form method="GET" action="cart/cart_handle.php">
					<h1 class="detail-name"><?php echo $data['TenSP'];?></h1>
					<input type="number" name="quantity" value="1" step = 'any'>
					<input type="hidden" name="id" value="<?php echo $data['MaSP'];?>">
					<p class="detail-price">Giá : <?php echo number_format($data['DonGia']);?> đ</p>
					<p class="detail-price">
					<?php
						$moTa = $data['MoTa'];
						$words = explode(' ', $moTa);
						$count = 0;

						foreach ($words as $word) {
						echo $word;
						$count++;

						if ($count % 20 === 0) {
							echo '<br>';
						} else {
							echo ' ';
						}
						}
					?>
					</p>
					<div class="wrap_btn">
						
						<a class="btn btn-primary" href="cart/cart_handle.php?id=<?php echo $data['MaSP']?>" title="">Thêm Vào Giỏ Hàng</a> 
					<button type="submit" class="btn btn-success" >Mua Ngay</button>
					</div>
				</form>
			</div>
			<?php
		}
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