<!DOCTYPE html>
<html>
	<head>
		<title>Register </title>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../style/styleClientLogin.css">
	</head>
	<body>
		<?php
		include'../../admin/connect.php';
		if( isset($_POST['submit']) && $_POST['tendn'] != '' && $_POST['email'] !='' && $_POST['password'] != '' && $_POST['repassword'] != ''){
			$tendn = $_POST['tendn'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			$TrangThai = 1;
			$maloaitk = 1;
			if ($password != $repassword ) {
				header("location:javascript://history.go(-1)");
			} else {
				$sql = "SELECT * FROM tai_khoan WHERE TenDN ='$tendn'";
				$old = mysqli_query($conn,$sql);
				if(mysqli_num_rows($old) > 0) {
					echo 'Tên Đăng Nhập Đã Tồn Tại!';
				} else {
					$sql = "INSERT INTO tai_khoan (TenDN,email,MatKhau,TrangThai,MaLoaiTK) VALUES ('$tendn','$email','$password','$TrangThai','$maloaitk')";
					mysqli_query($conn,$sql);
					echo "Đăng Ký Thành Công";
				}
			}
		} else {
			header("location:register.php");
		}
		?>
		<a class="again" href="login.php">Về Trang Đăng Nhập</a>
	</body>
</html>
