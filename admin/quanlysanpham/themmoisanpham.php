<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Quản lý sản phẩm</title>
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
								<a class="navbar-item-link" href="../quanlydanhmuc/quanlydanhmuc.php">Quản Lý Danh Mục</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="#" >Quản Lý Sản Phẩm</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlytaikhoan/quanlytaikhoan.php" >Quản Lý Tài Khoản</a>
							</li>
							<li class="navbar-item-li">
								<a class="navbar-item-link" href="../quanlyhoadon/xemdonhangdagiao.php" >Quản Lý Hoá Đơn</a>
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
				$result = mysqli_query($conn,"SELECT MAX(MaSP) AS max FROM san_pham");
				$id = mysqli_fetch_array($result);
				?>
				<div class="container-wrap">
					<h1 class="container-header">
						Quản Lý Sản Phẩm
					</h1>
					<div>
						<form>
						  <div class="form-group row">
						    <label for="inputEmail3" class="col-sm-2 col-form-label fs-16 ">Mã Sản Phẩm</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputEmail3 " placeholder="Nhập mã sản phẩm..." name="txtmasp" value="<?php echo ($id["max"]+1)?>" readonly>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 ">Tên Sản Phẩm</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập tên sản phẩm..." name="txttensp">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Đơn Giá</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập đơn Giá.." name="txtdongia">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Hình Ảnh</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập Hình Ảnh.." name="txthinhanh">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Tỷ Lệ KM</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập Tỷ Lệ KM.." name="txttylekm">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Mã Danh Mục</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập Mã Danh Mục.." name="txtmadanhmuc">
						    </div>
						  </div>
						  </div>
						   <div class="form-group row">
						    <label for="inputPassword3" class="col-sm-2 col-form-label fs-16 " >Mô Tả</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3 " placeholder="Nhập Mô Tả.." name="txtmota">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-12">
						      <button type="submit"  class="btn btn-primary" name="btnThem">Thêm</button>
						    </div>
						  </div>
						</form>
						<?php
					      $a=filter_input(INPUT_GET,'btnThem');
					      if(isset($a))
					      {
					        $masp=filter_input(INPUT_GET,'txtmasp');
					        $tensp=filter_input(INPUT_GET,'txttensp');
					        $dongia=filter_input(INPUT_GET,'txtdongia');
					        $hinhanh=filter_input(INPUT_GET,'txthinhanh');
					        $tylekm=filter_input(INPUT_GET,'txttylekm');
					        $madanhmuc=filter_input(INPUT_GET,'txtmadanhmuc');
					        $mota=filter_input(INPUT_GET,'txtmota');
					        $sql_insert="INSERT INTO san_pham(MaSP,TenSP,DonGia,HinhAnh,TyLeKM,MaDM,MoTa) values('$masp','$tensp','$dongia','$hinhanh','$tylekm','$madanhmuc','$mota')";
					        $result_insert=mysqli_query($conn,$sql_insert);
					        if($result_insert)
					        {
					          echo"<<script>window.location.href='../quanlysanpham/quanlysanpham.php'</script>";
					        }
					        else
					        {
					          echo "Thêm mới không thành công";
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