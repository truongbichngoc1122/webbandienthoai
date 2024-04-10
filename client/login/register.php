<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../style/styleClientLogin.css">
</head>
<body>
    <img class="backgroud_images" src="../../images/background.png" alt="">
    <div class="main">
        <form action="" method="POST">
            <div class="wrap_login">
                <h1>Đăng Ký</h1>
                <span>Tên Đăng Nhập</span>
                <div class="wrap_login-input">
                    <input type="text" name="tendn" placeholder="Nhập Tên Đăng Nhập..." required>
                </div>
                <span>Email</span>
                <div class="wrap_login-input">
                    <input type="text" name="email" placeholder="Nhập Email..." required>
                </div>
                <span>Password</span>
                <div class="wrap_login-input">
                    <input type="password" name="password" placeholder="Nhập Mật Khẩu..." required>
                </div>
                <span>Nhập Lại Password</span>
                <div class="wrap_login-input">
                    <input type="password" name="repassword" placeholder="Nhập Lại Mật Khẩu..." required>
                </div>
                <a class="again" href="login.php">Về Trang Đăng Nhập</a>

                <button type="submit" name="submit">Đăng Ký</button>
            </div>
        </form>
	</div>
	<div>
		<?php
            include '../../admin/connect.php';
			function isValidTendn($tendn) { 
				// Kiểm tra độ dài của tendn
				$tendnLength = strlen($tendn);
				if ($tendnLength < 4 || $tendnLength > 12) {
					return false;
				}
			
				// Kiểm tra không chứa ký tự đặc biệt
				if (!preg_match('/^[A-Za-z0-9_]+$/', $tendn)) {
					return false;
				}
			
				return true;
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (isset($_POST['submit']) && $_POST['tendn'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['repassword'] != '') {
					$tendn = $_POST['tendn'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$repassword = $_POST['repassword'];
					$TrangThai = 1;
					$maloaitk = 1;
			
					if (isValidTendn($tendn)) {
						// Kiểm tra email hợp lệ
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							//echo '<script>alert("Địa chỉ email không hợp lệ.");</script>';
							?>
								<div class="alert alert-danger text-center mx-auto" style="width: 460px;"> 
								<strong>Địa chỉ email không hợp lệ.</strong> 
								</div>
							<?php
						} else {
							if ($password != $repassword) {
								//echo '<script>alert("Mật khẩu không trùng nhau.");</script>';
								?>
									<div class="alert alert-danger text-center mx-auto" style="width: 460px;">
									<strong>Mật khẩu không trùng nhau.</strong> 
									</div>
								<?php
							} else {
								$sql = "SELECT * FROM tai_khoan WHERE TenDN ='$tendn'";
								$old = mysqli_query($conn, $sql);
								if (mysqli_num_rows($old) > 0) {
									//echo '<script>alert("Tên Đăng Nhập Đã Tồn Tại!");</script>';
									?>
										<div class="alert alert-danger text-center mx-auto" style="width: 460px;">

										<strong>Tên Đăng Nhập Đã Tồn Tại!</strong> 
										</div>
									<?php
								} else {
									$sql = "INSERT INTO tai_khoan (TenDN,email,MatKhau,TrangThai,MaLoaiTK) VALUES ('$tendn','$email','$password','$TrangThai','$maloaitk')";
									mysqli_query($conn, $sql);
									//echo '<script>alert("Đăng Ký Thành Công.");</script>';
									?>
										<div class=" alert-danger text-center mx-auto" style="width: 460px;">
										<strong>Đăng Ký Thành Công.</strong> 
										</div>
									<?php
									
								}
							}
						}
					} else {
						//echo '<script>alert("Tên đăng nhập không được chứa ký tự đặc biệt và có độ dài từ 4 - 12 ký tự .");</script>';
						?>
						<div class="alert alert-danger text-center mx-auto" style="width: 460px;">
							<strong>Tên đăng nhập không được chứa ký tự đặc biệt và có độ dài từ 4 - 12 ký tự </strong> 
						</div>
						<?php
					}
				} else {
					//echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
					?>
					<div class="alert alert-danger text-center mx-auto" style="width: 460px;">
							<span aria-hidden="true">&times;</span>
						</button> 
						<strong>Vui lòng điền đầy đủ thông tin.</strong> 
					</div>
					<?php
				}
			}

        ?>
		</div>

</body>
</html>