<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		session_start();
		include'../../admin/connect.php';
		if( isset($_POST['submit']) && $_POST['tendn'] != '' && $_POST['password'] !='' ){
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
					//echo 'Sai Thông Tin Tài Khoản Hoặc Mật Khẩu';
					?>
						<div class=" alert-danger text-center mx-auto" style="width: 460px;">
						<strong>Sai Thông Tin Tài Khoản Hoặc Mật Khẩu.</strong> 
						</div>
					<?php
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
					//echo 'Sai Thông Tin Tài Khoản Hoặc Mật Khẩu';
					?>
						<div class=" alert-danger text-center mx-auto" style="width: 460px;">
						<strong>Sai Thông Tin Tài Khoản Hoặc Mật Khẩu.</strong> 
						</div>
					<?php
				}
			} 
		}else {
				header("location: login.php");
		}
	?>
	<a href="register.php">Đến Trang Đăng Ký</a>

	</body>
</html>