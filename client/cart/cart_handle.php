<?php
	include'../../admin/connect.php';
	session_start();
	if(isset($_GET['id'])){
		$idsp = $_GET['id'];
	}
	$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
	$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
	
	if($quantity <= 0){
		$quantity = 1;
	}

	$sql_sp="SELECT *FROM san_pham where MaSP='$idsp'";
	$query = mysqli_query($conn,$sql_sp);

	$product = mysqli_fetch_assoc($query);

	$item = [
		'id' =>$product['MaSP'],
		'name' =>$product['TenSP'],
		'image' =>$product['HinhAnh'],
		'price' =>$product['DonGia'],
		'quantity' =>$quantity
	];

	if($action == 'add'){
		if(isset($_SESSION['cart'][$idsp])){
			$_SESSION['cart'][$idsp]['quantity'] +=$quantity;
		}else {
			$_SESSION['cart'][$idsp] = $item;
		}
	}
	if($action == 'update'){
		$_SESSION['cart'][$idsp]['quantity'] = $quantity;
	}

	if($action == 'delete'){
		unset($_SESSION['cart'][$idsp]);
	}

	header('location:cart.php');
	echo "<pre>";
	print_r($_SESSION['cart']);

?>