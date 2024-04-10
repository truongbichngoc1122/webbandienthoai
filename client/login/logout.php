
<?php
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
	if (isset($_SESSION['user_id'])) {
		// Xóa thông tin người dùng đã đăng nhập khỏi session
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		// Chuyển hướng người dùng đến trang chủ
		header('Location: client/homePage.php');
	} else {
		// Người dùng chưa đăng nhập
		echo "Bạn chưa đăng nhập";
	}
?>