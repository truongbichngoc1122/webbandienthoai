<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../style/styleClient.css">
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
							<a class="navbar_item-link" href="../login/register.php"> Đăng Ký</a>
						</li>
						<li class="navbar_item-li">
							<a class="navbar_item-link" href="../login/login.php"> Đăng Nhập</a>
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
						<li class="navbar_item-li">
							<a class="navbar_item-link" href="../login/login.php"> Đăng xuất</a>
						</li>
					</ul>
					<?php 
						}
					?>
				</div>
			</div>
			<div class="header_container">
				<a href="../homePage.php" >
					<div class="header_container-logo">
					<img src="../../images/logo.png" alt="logo">
					M.I.P
				</div>
				</a>
				
				
			</div>
		</div>
		<div class="main">
			<?php
				$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
			?>
			<div>
				
			</div>
			<table class="table table-bordered table-hover">
			  <thead>
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">Hình Ảnh</th>
			      <th scope="col">Tên Sản Phẩm</th>
			      <th scope="col">Số Lượng</th>
			      <th scope="col">Đơn Giá</th>
			      <th scope="col">Thành Tiền</th>
			      <th scope="col">Thao Tác</th>
			    </tr>
			  </thead>
			  <tbody>
			  	 <?php
			  		$total_price = 0; 
			  	?>
			  	<?php
			  		foreach ($cart as $key => $data): 
			  				$total_price += ($data['price'] * $data['quantity']);
			  			?>
				  		<tr>
					      <td><?php echo $key++ ?></td>
					      	<?php $img = $data['image'];?>
					      <td><img src="../../images/<?php echo $data['image']?>" alt="" width="100px"></td>
					      <td><?php echo $data['name'] ?></td>
					      <td>
					      	<form action="cart_handle.php">
					      		<input type="hidden" name="action" value="update">
					      		<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
						      	<input class="d-sm-inline" width="40px" type="text" name="quantity" value="<?php echo $data['quantity'] ?>">
						      	<button type="submit" class="btn btn-outline-success" type="">Cập nhật</button>	
					      	</form>
					      </td>
					      <td><?php echo number_format($data['price'])  ?> đ</td>
					      <td><?php echo number_format(($data['price'] * $data['quantity'])) ?> đ</td>
					      <td> <a class="btn btn-danger" href="cart_handle.php?id=<?php echo $data['id'] ?>&action=delete " title="">Xoá</a> </td>
					    </tr>
			  	<?php  endforeach ?>
			  	<tr>
			  		<td>Tổng Tiền</td>
			  		<td colspan="6" class="text-center "> <?php echo number_format(($total_price) ) ?> đ</td>
			  	</tr>
			  	<tr>
			  		<td colspan="7" class="text-center ">
			  			<a class="btn btn-success" href="../pay/pay.php" title="">Thanh Toán</a>
			  		</td>
			  	</tr>
			  </tbody>
			</table>
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