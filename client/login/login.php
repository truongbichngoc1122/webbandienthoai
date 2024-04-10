<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>	
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../style/styleClientLogin.css">
	</head>
	<body>
		<img class="backgroud_images" src="../../images/background.png" alt="">
			<div class="main" >
				<form method="post">
					<div class="wrap_login">
					<?php
						if(isset($_SESSION['error'])){
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
					?>
						<h1>Đăng Nhập</h1>
						<span>Tài Khoản</span>
						<div class="wrap_login-input">
							<input type="text" name="tendn" placeholder="Nhập Tài Khoản...">
						</div>
						<span>Password</span>
						<div class="wrap_login-input">
							<input type="password" name="password" placeholder="Nhập Mật Khẩu...">
						</div>
						<span></span>
						
						<a href="register.php" >Đăng kí tài khoản</a>

						<button type="submit" name="submit">Đăng Nhập</button>
					</div>
					
				</form>
				<br>
				<br>
				<?php
					session_start();
					include'../../admin/connect.php';
					if( isset($_POST['submit'])==true && $_POST['tendn'] != '' && $_POST['password'] !='' ){
						$tendn = $_POST['tendn'];
						$password = $_POST['password'];
						
						if($tendn=='admin'){
							$sql = "SELECT * FROM tai_khoan WHERE TenDN ='$tendn' AND MatKhau = '$password' ";
							$old = mysqli_query($conn,$sql);
							$data = mysqli_fetch_assoc($old);
							if (mysqli_num_rows($old) > 0) {
								$_SESSION['user'] = $data;
								if(isset($_GET['action'])){
									$action = $_GET['action'];
									header("location: ".$action.".php");
								} else {
									header("location:/webphone/admin/admin.php");
								}
							} else {

									echo '<script>alert("Sai Thông Tin Tài Khoản Hoặc Mật Khẩu.");</script>';	
							}

						}else{
							$sql = "SELECT * FROM tai_khoan WHERE TenDN ='$tendn' AND MatKhau = '$password' ";
							$old = mysqli_query($conn,$sql);
							$data = mysqli_fetch_assoc($old);
							if (mysqli_num_rows($old) > 0) {
								$_SESSION['user'] = $data;
								if(isset($_GET['action'])){
									$action = $_GET['action'];
									header("location: ".$action.".php");
								} else {
									header("location: ../homePage.php");
								}
							} else {
									echo '<script> alert("Sai Thông Tin Tài Khoản Hoặc Mật Khẩu.");</script>';

							}
						}
					}else if(isset($_POST['submit'])==true ){
						echo '<script>alert(" Vui lòng điền đầy đủ thông tin.");</script>';
					
					}
				?>
			</div>
			
		</img>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>